<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/LoginModel.php');


class Login extends Controller
{
  private $loginModel;
  //NOTE
  //sensitive information will be encrypted in the future
  // NOTE
  // A firewall can help mitigate Brute Force Attack risks in the future

  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the LoginModel
   **/
  public function __construct()
  {
    if (isset($_SESSION['auth_status'])) header('Location: dashboard/index');
    $this->loginModel = new LoginModel();
  }


  /**
   * @param null|int
   * @return null|void
   * ? Logs login attempts by calling the addLoginAttempt method on the LoginModel
   **/
  public function loginLog($ip, $username)
  {
    $this->loginModel->addLoginAttempt($ip, $username);
  }


  /**
   * @param array
   * @return array
   * ? Verifies and redirects a user by calling the login method on the LoginModel
   **/
  public function login(array $data): array
  {

    $username = $this->desinfect($data['username-email']);
    $password = $this->desinfect($data['password']);

    $UsernameRecords = $this->loginModel->fetchUser($username);

    $errorMsg = array(
      'status' => false,
      'error' => ''
    );

    $ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }

    $totalIPCount = $this->loginModel->checkIPAttempts($ip);
    $totalUsernameCount = $this->loginModel->checkUsernameAttempts($username);

    if ($totalIPCount == 5) {
      $errorMsg['error'] = 'Account locked for security reasons.';
      $this->loginModel->blockIP($ip);
      if ($totalUsernameCount == 5) {
        $this->loginModel->deactivateAcc($username);
      }
    } else if ($totalUsernameCount == 5) {
      $errorMsg['error'] = 'Account locked for security reasons.';
      $this->loginModel->deactivateAcc($username);
    } else if (!$UsernameRecords['status']) {
      if ($UsernameRecords['data']['user_acc_status'] == 1) {

        if (password_verify($password, $UsernameRecords['data']['user_password'])) {

          $errorMsg['status'] = true;

          $_SESSION['data'] = $UsernameRecords['data'];
          $_SESSION['auth_status'] = true;
          $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
          $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
          $_SESSION['timestamp'] = $_SERVER['REQUEST_TIME'];

          unset($_SESSION['data']['user_title']);
          unset($_SESSION['data']['user_gender']);
          unset($_SESSION['data']['user_given_name']);
          unset($_SESSION['data']['user_family_name']);
          unset($_SESSION['data']['user_email']);
          unset($_SESSION['data']['user_password']);
          unset($_SESSION['data']['created']);

          //delete login log data after successful user login  
          $this->loginModel->deleteLoginAttempt($ip);

          header('Location: dashboard/index');
        } else {
          $totalIPCount++;
          $remainedAttmp = 5 - $totalIPCount;

          if ($remainedAttmp == 0) {
            $errorMsg['error'] = 'Account locked for security reasons.';
          }
          $errorMsg['error'] = 'Username or password incorrect';
          $this->loginModel->addLoginAttempt($ip, $username);
        }
      } else {
        $errorMsg['error'] = 'Account locked for security reasons.';
      }
    } else {
      $errorMsg['error'] = 'Username or password incorrect';
    }
    return $errorMsg;
  }
}
