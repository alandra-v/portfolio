<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/MediaModel.php');
require_once(dirname(__DIR__) . '/Model/ProjectModel.php');
// require_once(dirname(dirname(__DIR__)) . '/configuration.php');

class Media extends Controller
{
  private $mediaModel;
  private $projectModel;

  public $targetDir = TARGET_DIR;
  public $allowedMimeTypes = ALLOWED_MIME_TYPES;
  public $allowedExtensions = ALLOWED_EXTENSIONS;
  public $maxFileSize = MAX_FILE_SIZE;

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

    $file = $files['image'];

    $fileName = basename($file['name']);
    $sanitizedFilename = strtolower($this->sanitize($fileName));
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    $Error = array(
      'image' => '',
      'altText' => '',
      'projectID' => '',
      'status' => false
    );

    $Response = $this->ckeckFileError($fileError);


    if ($fileError === UPLOAD_ERR_OK) {

      if ($fileSize <= $this->maxFileSize) {

        // check MIME-type
        $filepath = str_replace(' ', '\\ ', $fileTmp);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeSecure = finfo_file($finfo, $filepath);
        finfo_close($finfo);
        if (in_array($mimeSecure, $this->allowedMimeTypes)) {

          // check file extension
          $ext = strtolower(pathinfo($sanitizedFilename, PATHINFO_EXTENSION));
          if (in_array($ext, $this->allowedExtensions)) {
            // generate a unique name for the image
            // $uniqueName = uniqid(('image_') . '_' . time());
            $uniqueName = uniqid(($sanitizedFilename) . '__' . time());

            // Append the file extension to the unique name
            $uniqueName .= '.' . $ext;
            // Move the uploaded file to a directory
            $uploadPath = $this->targetDir . '/' . $uniqueName;
            move_uploaded_file($fileTmp, $uploadPath);
            // $Error['image'] = 'The image has been uploaded successfully to &quot;' . $targetDir . '&quot;.';
            $image = $uniqueName;
          } else {
            $Error['image'] = 'Image does not have an allowed file extension. Only JPG, PNG and SVG files are allowed.';
            $Error['status'] = true;
          }
        } else {
          $Error['image'] = 'File does not have an allowed media type. Please choose a different file.';
          $Error['status'] = true;
        }
      } else {
        $Error['image'] = 'The image must be less than 3 MB.';
        $Error['status'] = true;
      }
    } else {
      $Error['image'] = 'Sorry, there was an error uploading your image. Please try again.';
      $Error['status'] = true;
    }

    if (empty($altText)) {
      $Error['altText'] = 'Please provide an alternative text.';
      $Error['status'] = true;
    }

    $projectsArray = $this->projectModel->fetchProjectIDs();
    // echo '<pre>';
    // print_r($projectsArray['data']);
    // // print_r($projectsArray);
    // echo '</pre>';

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

    $Payload['altText'] = ucfirst($Payload['altText']);

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
   * @return 
   * ? Redirects user to the media library after updating the given image
   **/
  public function editImage(array $data, int $id, $files)
  {

    $altText = $this->desinfect($data['alt-text']);
    $projectID = $this->desinfect($data['projects']);
    $image = $data['original'];

    $Error = array(
      'image' => '',
      'altText' => '',
      'projectID' => '',
      'status' => false
    );


    if (isset($files['image']['name']) && 0 < $files['image']['size']) {
      if ($files['image']['size'] <= $this->maxFileSize) {

        $originalImgName = $data['original'];
        $imgPath = $this->targetDir . '/' . $originalImgName;

        $file = $files['image'];
        // $file = $this->desinfect($files['image']);

        $fileName = basename($file['name']);
        $sanitizedFilename = strtolower($this->sanitize($fileName));
        $fileTmp = $file['tmp_name'];
        // $fileSize = $file['size']; 
        $fileError = $file['error'];

        $Response = $this->ckeckFileError($fileError);

        if ($fileError === UPLOAD_ERR_OK) {
          // Delete the original image
          if (file_exists($imgPath)) {
            unlink($imgPath);
          }

          // check MIME-type
          $filepath = str_replace(' ', '\\ ', $fileTmp);
          $finfo = finfo_open(FILEINFO_MIME_TYPE);
          $mimeSecure = finfo_file($finfo, $filepath);
          finfo_close($finfo);
          if (in_array($mimeSecure, $this->allowedMimeTypes)) {

            // check file extension
            $ext = strtolower(pathinfo($sanitizedFilename, PATHINFO_EXTENSION));
            if (in_array($ext, $this->allowedExtensions)) {
              // generate a unique name for the image
              $uniqueName = uniqid(($sanitizedFilename) . '__' . time());
              // Append the file extension to the unique name
              $uniqueName .= '.' . $ext;
              // Move the uploaded file to a directory
              $uploadPath = $this->targetDir . '/' . $uniqueName;
              move_uploaded_file($fileTmp, $uploadPath);
              // $Error['image'] = 'The image has been uploaded successfully to &quot;' . $targetDir . '&quot;.';
              $image = $uniqueName;
            } else {
              $Error['image'] = 'Image does not have an allowed file extension. Only JPG, PNG and SVG files are allowed.';
              $Error['status'] = true;
            }
          } else {
            $Error['image'] = 'File does not have an allowed media type. Please choose a different file.';
            $Error['status'] = true;
          }
        } else {
          $Error['image'] = 'Sorry, there was an error uploading your image. Please try again.';
          $Error['status'] = true;
        }
      } else {
        $Error['image'] = 'The image must be less than 3 MB.';
        $Error['status'] = true;
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

    $Payload['altText'] = ucfirst($Payload['altText']);

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

    if ($this->mediaModel->deleteImage($id)) header("Location: media_library?deleted");
  }
}
