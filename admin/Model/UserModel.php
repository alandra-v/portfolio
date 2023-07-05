<?php
require_once(__DIR__ . '/Db.php');

class UserModel extends Db
{

  /**
   * @param null|void
   * @return array
   * ? Returns an array of users
   **/
  public function fetchUsers(): array
  {
    $this->query("SELECT * FROM `user` ORDER BY created DESC");
    $this->execute();
    $User = $this->fetchAll();

    if (count($User) > 0) {
      $Response = array(
        'status' => true,
        'data' => $User
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
      'data' => []
    );
    return $Response;
  }


  /**
   * @param int
   * @return array
   * ? Returns a user record based on the method parameter
   **/
  public function fetchUser(int $id): array
  {
    $this->query("SELECT * FROM `user` WHERE `ID` = :id");
    $this->bind('id', $id);
    $this->execute();
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
    $this->execute();
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


  /**
   * @param array|int
   * @return array
   * ? Updates user profile information
   **/
  public function updateUserProfileInfo(array $user, int $id): array
  {
    $this->query("UPDATE `user` SET user_title=:title, user_gender=:gender, user_given_name=:givenName, user_family_name=:familyName WHERE ID=:id");
    $this->bind('title', $user['title']);
    $this->bind('gender', $user['gender']);
    $this->bind('givenName', $user['givenName']);
    $this->bind('familyName', $user['familyName']);
    $this->bind('id', $id);

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
   * @param array|int
   * @return array
   * ? Updates user login information
   **/
  public function updateUserLoginInfo(array $user, int $id): array
  {
    $this->query("UPDATE `user` SET user_name=:username, user_email=:email WHERE ID=:id");
    $this->bind('username', $user['username']);
    $this->bind('email', $user['email']);
    $this->bind('id', $id);

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
   * @param array|int
   * @return array
   * ? Updates user password
   **/
  public function updatePassword(array $user, int $id): array
  {
    $this->query("UPDATE `user` SET user_password=:password WHERE ID=:id");
    $this->bind('password', $user['password']);
    $this->bind('id', $id);

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
   * @param int
   * @return bool
   * ? Deletes the given user account from database
   **/
  public function deleteUser(int $id): bool
  {
    $this->query("DELETE FROM `user` WHERE `ID` = :id");
    $this->bind('id', $id);
    $deleted = $this->execute();

    return $deleted;
  }
}
