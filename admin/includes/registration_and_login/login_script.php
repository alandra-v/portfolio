<?php

// require_once("../configuration.php");
require_once("../../../configuration.php");
require("function.php");

session_name(CONFIG_SESSION_NAME);
session_start();

// require_once('includes/mysql_connect.php');
require_once('../mysql_connect.php');

$isLoggedIn = false;

$errorMessage = '❗️ Username or password incorrect';

$usernameOrEmail = desinfect($_POST['username-email']);
$password = desinfect($_POST['password']);

if (isset($usernameOrEmail) && isset($password)) {

  $query = "SELECT * FROM `user` WHERE `user_name` = ? OR `user_email`= ?";

  $stmt = $dbo->prepare($query);
  $stmt->execute(array($usernameOrEmail, $usernameOrEmail));
  $record = $stmt->fetch();


  if (empty($record)) {
    header("Location: ../../login.php?error=" . $errorMessage);
    return;
  }


  if (password_verify($password, $record['user_password'])) {

    $_SESSION['isloggedin'] = true;
    $_SESSION['username'] = $record['user_name'];
    $_SESSION['userID'] = $record['ID'];

    $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['timestamp'] = time();

    header("Location: ../../index.php");
  } else {
    header("Location: ../../login.php?error=" . $errorMessage);
  }
}
