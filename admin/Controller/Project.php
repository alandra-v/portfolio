<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/ProjectModel.php');

class Project extends Controller
{

  private $projectModel;


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the ProjectModel
   **/
  public function __construct()
  {

    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
    $this->projectModel = new ProjectModel();

    // if (!isset($_POST['token']) || !isset($_SESSION['token'])) {
    //   // token not set
    //   exit('Security alert!');
    // } else if (time() >= $_SESSION['token-expire']) {
    //   // token expired
    //   exit('Security alert! Please reload the form');
    // } else if ($_POST['token'] == $_SESSION['token']) {
    //   unset($_SESSION['token']);
    // } else {
    //   // invalid token
    //   exit('Security alert!');
    // }
  }


  /**
   * @param array
   * @return array
   * ? Redirects user to the project read page after creating the given project
   **/
  public function createProject(array $data): array
  {

    $title = $this->desinfect($data['title']);
    $year = $this->desinfect($data['year']);
    $url = $this->desinfect($data['website-url']);


    $Error = array(
      'title' => '',
      'year' => '',
      'url' => '',
      'status' => '',
      'errorStatus' => false
    );

    if (empty($title)) {
      $Error['title'] = 'Please provide a project title.';
      $Error['errorStatus'] = true;
    }

    if (empty($year)) {
      $Error['year'] = 'Please enter the year of completion.';
      $Error['errorStatus'] = true;
    }

    if (empty($url)) {
      $Error['url'] = 'Please enter the website\'s URL.';
      $Error['errorStatus'] = true;
    }

    if (isset($data['status'])) {
      $status = 1;
    } else {
      $status = 0;
    }

    if ($Error['errorStatus']) {
      return $Error;
    }

    $Payload = array(
      'title' => $title,
      'year' => $year,
      'url' => $url,
      'status' => $status
    );

    $Response = $this->projectModel->createProject($Payload);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }


    header('Location: projects_read?created');
    return true;
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of projects by calling the fetchProjects method on the ProjectModel
   **/
  public function getProjects(): array
  {
    return $this->projectModel->fetchProjects();
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of projects with their associated images by calling the fetchJoinedProjects method on the ProjectModel
   **/
  public function getJoinedProjects(): array
  {
    return $this->projectModel->fetchJoinedProjects();
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of project information by calling the fetchProject method on the ProjectModel
   **/
  public function getProject(int $id): array
  {
    return $this->projectModel->fetchProject($id);
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of project information which its associated images by calling the fetchJoinedProject method on the ProjectModel
   **/
  public function getJoinedProject(int $id): array
  {
    return $this->projectModel->fetchJoinedProject($id);
  }


  /**
   * @param array|int
   * @return array
   * ? Redirects user to project read page after updating 
   **/
  public function editProject(array $data, int $id): array
  {


    $title = $this->desinfect($data['title']);
    $year = $this->desinfect($data['year']);
    $url = $this->desinfect($data['website-url']);


    $Error = array(
      'title' => '',
      'year' => '',
      'url' => '',
      'status' => '',
      'errorStatus' => false
    );

    if (empty($title)) {
      $Error['title'] = 'Please provide a project title.';
      $Error['errorStatus'] = true;
    }

    if (empty($year)) {
      $Error['year'] = 'Please enter the year of completion.';
      $Error['errorStatus'] = true;
    }

    if (empty($url)) {
      $Error['url'] = 'Please enter the website\'s URL.';
      $Error['errorStatus'] = true;
    }

    if (isset($data['status'])) {
      $status = 1;
    } else {
      $status = 0;
    }

    if ($Error['errorStatus']) {
      return $Error;
    }

    $Payload = array(
      'title' => $title,
      'year' => $year,
      'url' => $url,
      'status' => $status
    );

    $Response = $this->projectModel->editProject($Payload, $id);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }


    header('Location: projects_read?updated');
    return true;
  }


  /**
   * @param int
   * @return null|void
   * ? Redirects user to the projects read page after deleting the given project and all associated images
   **/
  public function deleteProject(int $id)
  {
    if ($this->projectModel->deleteProject($id)) header("Location: projects_read?deleted");
  }
}
