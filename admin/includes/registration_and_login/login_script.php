<?php

require_once("../configuration.php");
// require_once("../../../configuration.php");

session_name(CONFIG_SESSION_NAME);
session_start();

require_once('includes/mysql_connect.php');
// require_once('../mysql_connect.php');

$isLoggedIn = false;

// if (isset($_POST['login'])) {

if (isset($_POST['username-email']) && isset($_POST['password'])) {


  $query = "SELECT * FROM `user` WHERE `user_name` = ?"; // OR `email` = ?

  $statement = $dbo->prepare($query);
  $statement->execute([$_POST['username-email']]);
  $record = $statement->fetch();


  if (empty($record)) {
    $errorMessage = 'No username or password provided.';
  } else {

    // echo '<pre>';
    // print_r($record);
    // echo '</pre>';

    if (password_verify($_POST['password'], $record['user_password'])) {

      $_SESSION['isloggedin'] = true;
      $_SESSION['username'] = $record['user_name'];
      $_SESSION['userID'] = $record['ID'];

      $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
      $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
      $_SESSION['timestamp'] = time();

      // echo 'du bist eingeloggt';
      header("Location: index.php");
    } else {

      $errorMessage = 'Username or password incorrect';
    }
  }
}
// };
