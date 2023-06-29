<?php
require_once(__DIR__ . '/Db.php');

class RegisterModel extends Db
{

  /**
   * @param array
   * @return array
   * ? Creates and returns a user record
   **/
  public function createUser(array $user): array
  {
    $this->query("INSERT INTO `user` (user_title, user_gender, user_given_name, user_family_name, user_name, user_email, user_password, user_group) 
      VALUES (:title, :gender, :givenName, :familyName, :username, :email, :password, :userGroup)");
    $this->bind('title', $user['title']);
    $this->bind('gender', $user['gender']);
    $this->bind('givenName', $user['givenName']);
    $this->bind('familyName', $user['familyName']);
    $this->bind('username', $user['username']);
    $this->bind('email', $user['email']);
    $this->bind('password', $user['password']);
    $this->bind('userGroup', $user['userGroup']);


    if ($this->execute()) {
      $Response = array(
        'status' => true,
      );
      return $Response;
    } else {
      $Response = array(
        'status' => false
      );
      return $Response;
    }
  }


  /**
   * @param string
   * @return array
   * ? Updates and returns a user record
   **/
  public function fetchUser(string $username): array
  {
    $this->query("SELECT * FROM `user` WHERE `user_name` = :username");

    $this->bind('username', $username);
    $User = $this->fetch();

    if (!empty($User)) {
      $Response = array(
        'status' => true,
        'data' => $User
      );
    } else {
      $Response = array(
        'status' => false,
        'data' => []
      );
    }
    return $Response;
  }


  /**
   * @param string
   * @return array
   * ? Returns a user record based on the method parameter
   **/
  public function fetchEmail(string $email): array
  {
    $this->query("SELECT * FROM `user` WHERE `user_email` = :email");

    $this->bind('email', $email);
    $Email = $this->fetch();

    if (!empty($Email)) {
      $Response = array(
        'status' => true,
        'data' => $Email
      );
    } else {
      $Response = array(
        'status' => false,
        'data' => []
      );
    }
    return $Response;
  }
}
