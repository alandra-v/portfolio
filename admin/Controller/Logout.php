<?php

require_once(__DIR__ . '/Controller.php');

class Logout extends Controller
{
  /**
   * @param null|void
   * @return null|void
   * ? Destroys the application session and redirects the user to the login page
   **/
  public function __construct()
  {

    unset($_SESSION['data']);
    unset($_SESSION['auth_status']);
    unset($_SESSION['userip']);
    unset($_SESSION['useragent']);
    unset($_SESSION['timestamp']);

    session_destroy();

    if (isset($_GET['userStatus']) && $_GET['userStatus'] == 'removed') {
      header('Location: login?userStatus=removed');
    } else {
      header('Location: login?userStatus=loggedout');
    }

    exit();
  }
}
