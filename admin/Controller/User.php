<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/UserModel.php');

class User extends Controller
{
  //NOTE
  //sensitive information will be encrypted in the future

  public $titleArray = [
    '' => 'Title',
    'mr' => 'Mr.',
    'mrs' => 'Mrs.',
    'ms' => 'Ms.',
    'other' => 'Other'
  ];

  public $genderArray = [
    'woman' => 'Woman',
    'man' => 'Man',
    'transgender' => 'Transgender',
    'non-binary' => 'Non-binary',
    'no-response' => 'Prefer not to respond'
  ];

  private $userModel;

  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the UserModel
   **/
  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
    $this->userModel = new UserModel();
  }

  /**
   * @param null|void
   * @return array
   * ? Returns an array of users by calling the fetchUsers method on the UserModel
   **/
  public function getUsers(): array
  {
    return $this->userModel->fetchUsers();
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of user information by calling the fetchUser method on the UserModel
   **/
  public function getUser(int $id): array
  {
    return $this->userModel->fetchUser($id);
  }


  /**
   * @param array|int
   * @return array
   * ?  Redirects user to the user read page after updating the given user profile information
   **/
  public function editProfileInfo(array $data, int $id): array
  {
    if ($_SESSION['data']['user_group'] == 0 || $_SESSION['data']['ID'] == $id) {

      $title = $this->desinfect($data['titles']);
      $gender = $this->desinfect($data['gender']);
      $givenName = $this->desinfect($data['given-name']);
      $familyName = $this->desinfect($data['family-name']);

      $errorMessages = array(
        'titles' => '',
        'gender' => '',
        'given-name' => '',
        'family-name' => '',
        'status' => false
      );


      if (empty($title)) {
        $errorMessages['title'] = 'Please select your title';
        $errorMessages['status'] = true;
      } else if (!array_key_exists($title, $this->titleArray)) {
        $errorMessages['title'] = 'Something went wrong <br> Please select your title';
        $errorMessages['status'] = true;
      }

      if (empty($gender)) {
        $errorMessages['gender'] = 'Please select your gender';
        $errorMessages['status'] = true;
      } else if (!array_key_exists($gender, $this->genderArray)) {
        $errorMessages['status'] = true;
        $errorMessages['gender'] = 'Something went wrong <br> Please select your gender';
      }

      if (empty($givenName)) {
        $errorMessages['givenName'] = 'Please enter your first name';
        $errorMessages['status'] = true;
      } else if (strlen($givenName) > 255) {
        $errorMessages['givenName'] = 'Please enter less than 255 characters';
        $errorMessages['status'] = true;
      }

      if (empty($familyName)) {
        $errorMessages['familyName'] = 'Please enter your last name';
        $errorMessages['status'] = true;
      } else if (strlen($familyName) > 255) {
        $errorMessages['familyName'] = 'Please enter less than 255 characters';
        $errorMessages['status'] = true;
      }


      if ($errorMessages['status']) {
        return $errorMessages;
      }


      $Payload = array(
        'title' => $title,
        'gender' => $gender,
        'givenName' => $givenName,
        'familyName' => $familyName
      );


      // if no errors send data
      $Response = $this->userModel->updateUserProfileInfo($Payload, $id);

      if (!$Response['status']) {
        $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
        return $Response;
      }

      header('Location: user_read?userStatus=updated');
      return true;
    } else {
      header('Location: user_read?userStatus=violation');
    }
  }


  /**
   * @param array|int
   * @return array
   * ? Redirects user to the user read page after updating the given user login information
   **/
  public function editLoginInfo(array $data, int $id): array
  {
    if ($_SESSION['data']['user_group'] == 0 || $_SESSION['data']['ID'] == $id) {

      $username = $this->desinfect($data['username']);
      $email = $this->desinfect($data['email']);
      $emailConfirmation = $this->desinfect($data['email-confirmation']);

      $UsernameStatus = $this->userModel->fetchUsername($username)['status'];
      $EmailStatus = $this->userModel->fetchEmail($email)['status'];
      $Data = $this->userModel->fetchUser($_GET['id'])['data'];

      $errorMessages = array(
        'username' => '',
        'email' => '',
        'email-confirmation' => '',
        'status' => false
      );

      if ($Data['user_name'] !== $_POST['username']) {
        if (empty($username)) {
          $errorMessages['username'] = 'Please enter a username';
          $errorMessages['status'] = true;
        } else if (!preg_match('/^[A-Za-z0-9_.-]{4,16}$/', $username)) {
          $errorMessages['username'] = 'Invalid username';
          // print_r($errorMessages['username']);
          $errorMessages['status'] = true;
        } else if (!empty($UsernameStatus)) {
          $errorMessages['username'] = 'This username is already taken';
          $errorMessages['status'] = true;
        }
      }

      if ($Data['user_email'] !== $_POST['email']) {
        if (empty($email)) {
          $errorMessages['email'] = 'Please enter your email address';
          $errorMessages['status'] = true;
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $errorMessages['email'] = 'Invalid email address';
          $errorMessages['status'] = true;
        } else if (strlen($email) > 255) {
          $errorMessages['email'] = 'Please enter less than 255 characters';
          $errorMessages['status'] = true;
        } else if (!empty($EmailStatus)) {
          $errorMessages['email'] = 'This email is already taken';
          $errorMessages['status'] = true;
        }

        if (empty($emailConfirmation)) {
          $errorMessages['email-confirmation'] = 'Please confirm your email address';
          $errorMessages['status'] = true;
        } else if ($_POST['email'] !== $_POST['email-confirmation']) {
          $errorMessages['email-confirmation'] = 'Email addresses don\'t match. Take another look.';
          $errorMessages['status'] = true;
        }
      }

      if ($errorMessages['status']) {
        return $errorMessages;
      }


      $Payload = array(
        'username' => $username,
        'email' => $email
      );


      // if no errors send data
      $Response = $this->userModel->updateUserLoginInfo($Payload, $id);

      if (!$Response['status']) {
        $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
        return $Response;
      }


      header('Location: user_read?userStatus=updated');
      return true;
    } else {
      header('Location: user_read?userStatus=violation');
    }
  }


  /**
   * @param array|int
   * @return array
   * ? Redirects user to the user read page after updating the given user password
   **/
  public function editPassword(array $data, int $id): array
  {
    if ($_SESSION['data']['user_group'] == 0 || $_SESSION['data']['ID'] == $id) {

      $passwordOriginal = $this->desinfect($data['password-original']);
      $passwordNew = $this->desinfect($data['password-new']);
      $pwdHash = password_hash($passwordNew, PASSWORD_DEFAULT);
      $passwordConfirmation = $this->desinfect($data['password-confirmation']);


      $errorMessages = array(
        'passwordOriginal' => '',
        'passwordNew' => '',
        'passwordConfirmation' => '',
        'status' => false
      );

      $UsernameRecords = $this->userModel->fetchUser($id);

      $uppercase    = preg_match('@[A-Z]@', $passwordNew);
      $lowercase    = preg_match('@[a-z]@', $passwordNew);
      $number       = preg_match('@[0-9]@', $passwordNew);
      $specialChars = preg_match('@[^\w]@', $passwordNew);
      $whiteSpace   = preg_match('@[\s]@', $passwordNew);

      if (empty($passwordOriginal)) {
        $errorMessages['password-original'] = 'Please enter your current password';
        $errorMessages['status'] = true;
      } else if (!password_verify($passwordOriginal, $UsernameRecords['data']['user_password'])) {
        $errorMessages['password-original'] = 'Please enter your current password';
        $errorMessages['status'] = true;
      }

      if (empty($passwordNew)) {
        $errorMessages['password-new'] = 'Please enter a password';
        $errorMessages['status'] = true;
      } else if (!$uppercase || !$lowercase || !$number || !$specialChars || $whiteSpace || strlen($passwordNew) < 8) {
        $errorMessages['password-new'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        $errorMessages['status'] = true;
      } else if (strlen($passwordNew) > 255) {
        $errorMessages['password-new'] = 'Please enter less than 255 characters';
        $errorMessages['status'] = true;
      }

      if (empty($passwordConfirmation)) {
        $errorMessages['password-confirmation'] = 'Please confirm your new password';
        $errorMessages['status'] = true;
      } else if ($passwordNew !== $passwordConfirmation) {
        $errorMessages['password-confirmation'] = 'Passwords don\'t match. Take another look.';
        $errorMessages['status'] = true;
      }

      if ($errorMessages['status']) {
        return $errorMessages;
      }

      $Payload = array(
        'password' => $pwdHash
      );

      // if no errors send data
      $Response = $this->userModel->updatePassword($Payload, $id);

      if (!$Response['status']) {
        $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
        return $Response;
      }


      header('Location: user_read?userStatus=updated');
      return true;
    } else {
      header('Location: user_read?userStatus=violation');
    }
  }


  /**
   * @param array
   * @return null|void
   * ? Redirects user to the user read page after deleting the given user account
   * ? OR logs out and redirects user to the login page after deleting the given user account
   **/
  public function deleteUser(array $user)
  {

    $usergroup = $user['user_group'];

    if ($user['ID'] == $_SESSION['data']['ID'] && $usergroup != 0) {

      if ($usergroup == 0) {
        header('Location: user_read?userStatus=violation');
      } else if ($_SESSION['data']['ID'] = $user['ID']) {
        if ($this->userModel->deleteUser($user['ID'])) header('Location: ' . BASE_URL . 'admin/logout?userStatus=removed');
      } else {
        header('Location: user_read?userStatus=violation');
      }
    } else {

      if ($usergroup == 0) {
        header('Location: user_read?userStatus=violation');
        return;
      } else if ($_SESSION['data']['user_group'] == 0 || $_SESSION['data']['ID'] == $user['ID']) {
        if ($this->userModel->deleteUser($user['ID'])) header('Location: user_read?userStatus=deleted');
      } else {
        header('Location: user_read?userStatus=violation');
        return;
      }
    }
  }
}
