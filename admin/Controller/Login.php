<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/LoginModel.php');


class Login extends Controller
{
  private $loginModel;
  //NOTE
  //sensitive information will be encrypted in the future

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
  public function loginLog($ip, $time)
  {
    $this->loginModel->addLoginAttempt($ip, $time);
  }


  /**
   * @param array
   * @return array
   * ? Verifies and redirects a user by calling the login method on the LoginModel
   **/
  public function login(array $data)
  {

    $username = $this->desinfect($data['username-email']);
    $password = $this->desinfect($data['password']);

    $UsernameRecords = $this->loginModel->fetchUser($username);
    // $TotalCount = $this->loginModel->checkloginAttempts($ip, $time);

    if (!$UsernameRecords['status']) {
      if (password_verify($password, $UsernameRecords['data']['user_password'])) {
        $Response = array(
          'status' => true
        );

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


        // mysqli_query($con,"delete from loginlogs where IpAddress='$ip_address'");

        header('Location: dashboard/index');
      }
      // else {

      // $this->TotalCount++;
      // $time = $time - 30;

      // if ($TotalCount == 3) {
      //   $Response = 'To many failed login attempts. Please try again after 30 sec.';
      // }


    }
    header('Location: login?error');
    $Response = array(
      'status' => false,
    );
    return $Response;
  }
}
