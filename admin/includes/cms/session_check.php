<?php

$sessioncheck = true;

if (!isset($_SESSION['isloggedin'])) {
  $sessioncheck = false;
}

$currentUseragent = $_SERVER['HTTP_USER_AGENT'];
if (!isset($_SESSION['useragent']) || $_SESSION['useragent'] !== $currentUseragent) {
  $sessioncheck = false;
}

$currentIP = $_SERVER['REMOTE_ADDR'];
if (!isset($_SESSION['userip']) || $_SESSION['userip'] !== $currentIP) {
  $sessioncheck = false;
}

if (!isset($_SESSION['timestamp']) || $_SESSION['timestamp'] < time() - CONFIG_SESSION_LIFETIME) {
  $sessioncheck = false;
}


if ($sessioncheck == false) {

  session_regenerate_id();

  unset($_SESSION['isloggedin']);
  unset($_SESSION['username']);
  unset($_SESSION['userID']);
  unset($_SESSION['useragent']);
  unset($_SESSION['userip']);
  unset($_SESSION['timestamp']);

  header("Location: login.php");
  exit();
  $isLoggedIn = false;
} else {

  $isLoggedIn = true;
}

$_SESSION['timestamp'] = time();
session_regenerate_id();
