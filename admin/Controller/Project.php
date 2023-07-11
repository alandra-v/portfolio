<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/ProjectModel.php');

class Project extends Controller
{

  private $projectModel;

  // public $targetDir = TARGET_DIR;
  // public $allowedMimeTypes = ALLOWED_MIME_TYPES;
  // public $allowedExtensions = ALLOWED_EXTENSIONS;
  // public $maxFileSize = MAX_FILE_SIZE;

  public $errorsArr = [];


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the ProjectModel
   **/
  public function __construct()
  {
    $targetDir = TARGET_DIR;

    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
    $this->projectModel = new ProjectModel();

    // Checks if target directory exists, if not creates one
    if (!is_dir($targetDir)) {
      mkdir($targetDir);
    }
  }


  /**
   * @param array
   * @return array
   * ? Redirects user to the project read page after creating the given project
   **/
  public function createProject(array $data, array $files): array
  {
    $title = $this->desinfect($data['title']);
    $year = $this->desinfect($data['year']);
    $url = $this->desinfect($data['website-url']);
    $alt = $this->desinfect($data['alt-text']);


    $Error = array(
      'title' => '',
      'year' => '',
      'url' => '',
      'image' => '',
      'alt-text' => '',
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

    $image = '';
    if (isset($files['image']['name']) && $files['image']['size'] > 0) {
      $Return = $this->processUploadedFile($files);
      if ($Return['error']['status']) {
        $Error['image'] = $Return['error']['image'];
        $Error['status'] = true;
      } else {
        $image = $Return['filename'];
        // echo $image;
        // exit;
      }
    }

    if (isset($files['image']['name']) && $files['image']['size'] > 0) {
      if (empty($alt)) {
        $Error['alt-text'] = 'Please provide an alternative text for the logo.';
        $Error['errorStatus'] = true;
      }
    }

    if (isset($data['status'])) {
      $status = 1;
    } else {
      $status = 0;
    }

    if ($Error['errorStatus']) {
      return $Error;
    }

    // NOTE
    // In the future data will be encoded before it is sent to the backend

    $Payload = array(
      'title' => $title,
      'year' => $year,
      'url' => $url,
      'logo' => $image,
      'altText' => $alt,
      'status' => $status
    );
    // echo '<pre>';
    // print_r($Payload);
    // echo '</pre>';
    // exit;

    $Payload['title'] = ucwords($Payload['title']);
    $Payload['altText'] = ucwords($Payload['altText']);

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
    // NOTE
    // In the future data will be decoded before it is sent to the view
    return $this->projectModel->fetchProjects();
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of project information by calling the fetchProject method on the ProjectModel
   **/
  public function getProject(int $id): array
  {
    // NOTE
    // In the future data will be decoded before it is sent to the view
    return $this->projectModel->fetchProject($id);
  }


  /**
   * @param array|int
   * @return array
   * ? Redirects user to project read page after updating 
   **/
  public function editProject(array $data, int $id, array $files): array
  {

    $title = $this->desinfect($data['title']);
    $year = $this->desinfect($data['year']);
    $url = $this->desinfect($data['website-url']);
    $alt = $this->desinfect($data['alt-text']);
    $image = '';
    if ($data['original']) {
      $originalImgName = $data['original'];
      $imgPath = $this->targetDir . '/' . $originalImgName;
      $image = $data['original'];
    }

    $Error = array(
      'title' => '',
      'year' => '',
      'url' => '',
      'image' => '',
      'alt-text' => '',
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

    if (isset($files['image']['name']) && $files['image']['size'] > 0) {
      $Return = $this->processUploadedFile($files);
      if ($Return['error']['status']) {
        $Error['image'] = $Return['error']['image'];
        $Error['status'] = true;
      } else {
        $image = $Return['filename'];
        if ($data['original']) {
          // Delete the original image
          if (file_exists($imgPath)) {
            unlink($imgPath);
          }
        }
      }
    }

    if (isset($files['image']['name']) && $files['image']['size'] > 0 || $data['original']) {
      if (empty($alt)) {
        $Error['alt-text'] = 'Please provide an alternative text for the logo.';
        $Error['errorStatus'] = true;
      }
    }

    if (isset($data['status'])) {
      $status = 1;
    } else {
      $status = 0;
    }

    if ($Error['errorStatus']) {
      return $Error;
    }

    // NOTE
    // In the future data will be encoded before it is sent to the backend

    $Payload = array(
      'title' => $title,
      'year' => $year,
      'url' => $url,
      'logo' => $image,
      'altText' => $alt,
      'status' => $status
    );
    // echo '<pre>';
    // print_r($Payload);
    // echo '</pre>';
    // exit;

    $Payload['title'] = ucwords($Payload['title']);
    $Payload['altText'] = ucwords($Payload['altText']);

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
    $project = $this->projectModel->fetchProject($id);

    $imgPath = $this->targetDir . '/' . $project['data']['project_logo'];
    if (file_exists($imgPath)) {
      unlink($imgPath);
    }

    if ($this->projectModel->deleteProject($id)) header('Location: projects_read?deleted');
  }
}
