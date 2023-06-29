<?php
require_once(__DIR__ . '/Controller.php');
// require_once(dirname(__DIR__) . '/Model/DashboardModel.php');

class Dashboard extends Controller
{
  // private $dashboardModel;


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set 
   **/
  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
  }
}
