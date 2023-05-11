<?php
require_once("../configuration.php");
session_name(CONFIG_SESSION_NAME);
session_start();

session_regenerate_id();

unset($_SESSION['isloggedin']);
unset($_SESSION['username']);
unset($_SESSION['userID']);
unset($_SESSION['useragent']);
unset($_SESSION['userip']);
unset($_SESSION['timestamp']);

header("Location: login.php?status=loggedout");
exit();
