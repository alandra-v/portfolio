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
    // $this->execute(array($usernameOrEmail, $usernameOrEmail));
    // $this->fetch();

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
   * @param string
   * @return null|void
   * ? Adds a login attempt to the database based on the method parameters
   **/
  public function addLoginAttempt($ip, $username)
  {
    $this->query("INSERT INTO `login_log` (ip_address, username) VALUES (:ip, :username)");
    $this->bind('ip', $ip);
    $this->bind('username', $username);
    $this->execute();
  }


  /**
   * @param string
   * @return int
   * ? Counts login attempts based on ip address
   **/
  public function checkIPAttempts($ip): int
  {
    $this->query("SELECT COUNT(*) AS total_count FROM login_log WHERE ip_address=:ip");
    $this->bind('ip', $ip);
    $Count = $this->fetch();
    return $Count['total_count'];
  }


  /**
   * @param string
   * @return int
   * ? Counts login attempts based on username
   **/
  public function checkUsernameAttempts($username): int
  {
    $this->query("SELECT COUNT(*) AS total_count FROM login_log WHERE username=:username");
    $this->bind('username', $username);
    $Count = $this->fetch();
    return $Count['total_count'];
  }


  /**
   * @param string
   * @return null|void
   * ? Blocks given ip address from logging in
   **/
  public function blockIP($ip)
  {
    $this->query("UPDATE `login_log` SET blocked_ip=:ip");
    $this->bind('ip', $ip);
    $this->execute();
  }


  /**
   * @param string
   * @return null|void
   * ? Deactivates user account base on given username
   **/
  public function deactivateAcc($username)
  {
    $this->query("UPDATE `user` SET user_acc_status=:false WHERE user_name=:username");
    $this->bind('username', $username);
    $this->bind('false', 0);
    $this->execute();
  }


  /**
   * @param string
   * @return null|void
   * ? Deletes login attempts for specified ip address
   **/
  public function deleteLoginAttempt($ip)
  {
    $this->query("DELETE FROM `login_log` WHERE ip_address=:ip");
    $this->bind('ip', $ip);
    $this->execute();
  }
}
