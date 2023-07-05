<?php

require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/RegisterModel.php');


class Register extends Controller
{
  private $registerModel;
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


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the RegisterModel
   **/
  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
    $this->registerModel = new RegisterModel();
  }


  /**
   * @param array
   * @return array|boolean
   * ? Verifies, creates, and returns a user by calling the register method on the RegisterModel
   **/
  public function register(array $data)
  {

    $title = $this->desinfect($data['titles']);
    $gender = $this->desinfect($data['gender']);
    $givenName = $this->desinfect($data['given-name']);
    $familyName = $this->desinfect($data['family-name']);
    $username = $this->desinfect($data['username']);
    $email = $this->desinfect($data['email']);
    $emailConfirmation = $this->desinfect($data['email-confirmation']);
    $password = $this->desinfect($data['password']);
    $pwdHash = password_hash($password, PASSWORD_DEFAULT);
    $passwordConfirmation = $this->desinfect($data['password-confirmation']);

    $UsernameStatus = $this->registerModel->fetchUser($username)['status'];
    $EmailStatus = $this->registerModel->fetchEmail($email)['status'];

    $errorMessages = array(
      'titles' => '',
      'gender' => '',
      'given-name' => '',
      'family-name' => '',
      'username' => '',
      'email' => '',
      'email-confirmation' => '',
      'password' => '',
      'password-confirmation' => '',
      'terms' => '',
      'status' => false
    );


    if (empty($title)) {
      $errorMessages['title'] = 'Please select your title';
    } else if (!array_key_exists($title, $this->titleArray)) {
      $errorMessages['title'] = 'Something went wrong <br> Please select your title';
    }

    if (empty($gender)) {
      $errorMessages['gender'] = 'Please select your gender';
    } else if (!array_key_exists($gender, $this->genderArray)) {
      $errorMessages['gender'] = 'Something went wrong <br> Please select your gender';
    }

    if (empty($givenName)) {
      $errorMessages['givenName'] = 'Please enter your first name';
    } else if (strlen($givenName) > 255) {
      $errorMessages['givenName'] = 'Please enter less than 255 characters';
    }

    if (empty($familyName)) {
      $errorMessages['familyName'] = 'Please enter your last name';
    } else if (strlen($familyName) > 255) {
      $errorMessages['familyName'] = 'Please enter less than 255 characters';
    }

    if (empty($username)) {
      $errorMessages['username'] = 'Please enter a username';
    } else if (!preg_match('/^[A-Za-z0-9_.-]{4,16}$/', $username)) {
      $errorMessages['username'] = 'Invalid username';
      // print_r($errorMessages['username']);
    } else if (!empty($UsernameStatus)) {
      $errorMessages['username'] = 'This username is already taken';
    }

    if (empty($email)) {
      $errorMessages['email'] = 'Please enter your email address';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorMessages['email'] = 'Invalid email address';
    } else if (strlen($email) > 255) {
      $errorMessages['email'] = 'Please enter less than 255 characters';
    } else if (!empty($EmailStatus)) {
      $errorMessages['email'] = 'This email is already taken';
    }

    if (empty($emailConfirmation)) {
      $errorMessages['emailConfirmation'] = 'Please confirm your email address';
    } else if ($_POST['email'] !== $_POST['email-confirmation']) {
      $errorMessages['emailConfirmation'] = 'Email addresses don\'t match. Take another look.';
    }

    $uppercase    = preg_match('@[A-Z]@', $password);
    $lowercase    = preg_match('@[a-z]@', $password);
    $number       = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $whiteSpace   = preg_match('@[\s]@', $password);

    if (empty($password)) {
      $errorMessages['password'] = 'Please enter a password';
    } else if (!$uppercase || !$lowercase || !$number || !$specialChars || $whiteSpace || strlen($password) < 8) {
      $errorMessages['password'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    } else if (strlen($password) > 255) {
      $errorMessages['password'] = 'Please enter less than 255 characters';
    }

    if (empty($passwordConfirmation)) {
      $errorMessages['passwordConfirmation'] = 'Please confirm your password';
    } else if ($password !== $passwordConfirmation) {
      $errorMessages['passwordConfirmation'] = 'Passwords don\'t match. Take another look.';
    }

    if (!isset($_POST['terms'])) {
      $errorMessages['terms'] = 'Please accept Terms & Conditions';
    }

    $hasErrors = array_filter($errorMessages);
    if (!empty($hasErrors)) {
      return $errorMessages;
    }



    $Payload = array(
      'title' => $title,
      'gender' => $gender,
      'givenName' => $givenName,
      'familyName' => $familyName,
      'username' => $username,
      'email' => $email,
      'password' => $pwdHash,
      'userGroup' => 1
    );

    $keys = array_keys($Payload);
    $keysToModify = array_slice($keys, 0, 4);
    foreach ($keysToModify as $key) {
      $Payload[$key] = ucwords($Payload[$key]);
    }

    // if no errors send data
    $Response = $this->registerModel->createUser($Payload);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }



    header('Location: user_read?userStatus=registered');
    return true;
  }
}
