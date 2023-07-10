<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/MediaModel.php');
require_once(dirname(__DIR__) . '/Model/ProjectModel.php');

class Media extends Controller
{
  private $mediaModel;
  private $projectModel;

  public $errorsArr = [];


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the MediaModel
   **/
  public function __construct()
  {
    $targetDir = TARGET_DIR;

    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
    $this->mediaModel = new MediaModel();
    $this->projectModel = new ProjectModel();

    // Checks if target directory exists, if not creates one
    if (!is_dir($targetDir)) {
      mkdir($targetDir);
    }
    // if (is_dir($targetDir)) {
    //   // echo 'The folder exists';
    // } else {
    //   mkdir($targetDir);
    //   // echo 'The folder does not exist';
    // }

  }


  /**
   * @param array
   * @return array
   * ? Validates, creates and returns an image by calling the uploadImage method on the MediaModel
   **/
  public function uploadImage(array $data, array $files): array
  {
    $altText = $this->desinfect($data['alt-text']);
    $projectID = $this->desinfect($data['projects']);

    $Error = array(
      'image' => '',
      'altText' => '',
      'projectID' => '',
      'status' => false
    );


    $image = '';
    if (isset($files['image']['name']) && $files['image']['size'] > 0) {
      // return header('Location: media_library?file=exist');
      $Return = $this->processUploadedFile($files);
      // echo '<pre>';
      // print_r($Return);
      // echo '</pre>';
      // exit;
      if ($Return['error']['status']) {
        $Error['image'] = $Return['error']['image'];
        $Error['status'] = true;
      } else {
        $image = $Return['filename'];
        // echo $image;
        // exit;
      }
    } else {
      $Error['image'] = 'Please choose an image.';
      $Error['status'] = true;
    }

    $projectsArray = $this->projectModel->fetchProjectIDs();
    $found = false;
    foreach ($projectsArray['data'] as $array) {
      if ($array['ID'] == $projectID) {
        $found = true;
        break;
      }
    }
    // echo '<pre>';
    // print_r($projectsArray);
    // echo '</pre>';
    // exit;

    if (empty($altText)) {
      $Error['altText'] = 'Please provide an alternative text.';
      $Error['status'] = true;
    }

    if (empty($projectID)) {
      $Error['projectID'] = 'Please select a project';
      $Error['status'] = true;
    } else if (!$found) {
      $Error['projectID'] = 'Something went wrong <br> Please select a project';
      $Error['status'] = true;
    }

    if ($Error['status']) {
      return $Error;
    }

    $Payload = array(
      'altText' => $altText,
      'projectID' => $projectID,
      'image' => $image
    );
    // echo '<pre>';
    // print_r($Payload);
    // echo '</pre>';
    // exit;

    $Response = $this->mediaModel->uploadImage($Payload);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    header('Location: media_library?created');
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of images by calling the fetchImages method on the MediaModel
   **/
  public function getImages(): array
  {
    return $this->mediaModel->fetchImages();
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of image information by calling the fetchImage method on the MediaModel
   **/
  public function getImage(int $id): array
  {
    return $this->mediaModel->fetchImage($id);
  }


  /**
   * @param array|int
   * @return array
   * ? Redirects user to the media library after updating the given image
   **/
  public function editImage(array $data, int $id, array $files): array
  {
    $altText = $this->desinfect($data['alt-text']);
    $projectID = $this->desinfect($data['projects']);
    $image = $data['original'];
    if ($data['original']) {
      $originalImgName = $data['original'];
      $imgPath = $this->targetDir . '/' . $originalImgName;
    }

    $Error = array(
      'image' => '',
      'altText' => '',
      'projectID' => '',
      'status' => false
    );

    if (isset($files['image']['name']) && 0 < $files['image']['size']) {
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

    if (empty($altText)) {
      $Error['altText'] = 'Please provide an alternative text.';
      $Error['status'] = true;
    }

    $projectsArray = $this->projectModel->fetchProjectIDs();
    $found = false;
    foreach ($projectsArray['data'] as $array) {
      if ($array['ID'] == $projectID) {
        $found = true;
        break;
      }
    }

    if (empty($projectID)) {
      $Error['projectID'] = 'Please select a project';
      $Error['status'] = true;
    } else if (!$found) {
      $Error['projectID'] = 'Something went wrong <br> Please select a project';
      $Error['status'] = true;
    }

    if ($Error['status']) {
      return $Error;
    }

    $Payload = array(
      'altText' => $altText,
      'projectID' => $projectID,
      'image' => $image
    );

    $Response = $this->mediaModel->editImage($Payload, $id);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    header('Location: media_library?updated');
  }



  /**
   * @param int
   * @return null|void
   * ? Redirects user to the media library after deleting the given image
   **/
  public function deleteImage(int $id)
  {
    $image = $this->mediaModel->fetchImage($id);

    $imgPath = $this->targetDir . '/' . $image['data']['img'];
    if (file_exists($imgPath)) {
      unlink($imgPath);
    }

    if ($this->mediaModel->deleteImage($id)) header('Location: media_library?deleted');
  }
}
