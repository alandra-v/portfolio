<?php
require_once(__DIR__ . '/Db.php');
class LoginModel extends Db
{

  /**
   * @param string
   * @return array
   * ? Returns a user record based on the method parameter
   **/
  public function fetchUser(string $usernameOrEmail): array
  {
    $this->query("SELECT * FROM `user` WHERE `user_name` = :username OR `user_email` = :email");

    $this->bind('username', $usernameOrEmail);
    $this->bind('email', $usernameOrEmail);
    $this->execute(array($usernameOrEmail, $usernameOrEmail));
    // $this->execute();

    $User = $this->fetch();

    if (empty($User)) {
      $Response = array(
        'status' => true,
        'data' => $User
      );
      return $Response;
    }
    if (!empty($User)) {
      $Response = array(
        'status' => false,
        'data' => $User
      );
      return $Response;
    }
  }


  /**
   * @param 
   * @return 
   * ? Adds a login attempt to the database based on the method parameters
   **/
  public function addLoginAttempt($ip, $time)
  {
    $this->query("INSERT INTO `login_attempt_count` (ip_address, time_count) VALUES (:ip, :time)");
    $this->bind('ip', $ip);
    $this->bind('time', $time);
    $this->execute();
    // missing return statement?
  }


  /**
   * @param 
   * @return 
   * ? Counts login attempts in the database based on the method parameters
   **/
  public function checkloginAttempts($ip, $time)
  {
    $this->query("SELECT COUNT(*) AS total_attempts FROM `user` where time_count>:time AND ip_address = :ip");
    $this->bind('ip', $ip);
    $this->bind('time', $time);
    $result = $this->fetch();
    $total_count = $result['total_attempts'];
    return $total_count;
  }
}
