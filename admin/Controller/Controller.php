<?php

require_once(dirname(__DIR__, 2) . '/configuration.php');
session_name(CONFIG_SESSION_NAME);
session_set_cookie_params(CONFIG_SESSION_LIFETIME);
session_start();
// stores security token that needs to persist across multiple requests within a user session
// can protect against CSRF attacks
// $_SESSION['token'] = bin2hex(random_bytes(32));
// $_SESSION['token-expire'] = time() + 1800;
session_regenerate_id();


class Controller
{

  public $targetDir = TARGET_DIR;
  public $allowedMimeTypes = ALLOWED_MIME_TYPES;
  public $allowedExtensions = ALLOWED_EXTENSIONS;
  public $maxFileSize = MAX_FILE_SIZE ?? 300000;
  // ?? default value

  /**
   * @param string
   * @return string
   * ? Cleans user input data step by step
   **/

  protected function desinfect($str): string
  {
    $str1 = strip_tags($str);
    $str2 = preg_replace('/\x00|<[^>]*>?/', '', $str1);
    $str3 = str_replace(["'", '"'], ['&#39;', '&#34;'], $str2);
    $str4 = htmlspecialchars($str3);
    $str5 = trim($str4);
    return $str5;
  }


  /**
   * @param string
   * @return string
   * ? Replaces or removes unwanted characters from filename step by step
   **/
  protected function sanitize($fname): string
  {
    $fname1 = str_replace(array(
      '\'', '/', "'", '"', '*', ';', '?', '[', ']', '(', ')', '{', '}', '~', '!', '$', '&lt',
      '#', '<', '>', '#', '@', '&', '+'
    ), '_', $fname);
    $fname2 = preg_replace('/-/', '_', $fname1);
    $fname3 = preg_replace('/_+/', '_', $fname2);
    $fname4 = trim($fname3);
    $fname5 = preg_replace('/\s+/', '_', $fname4);
    $fname6 = htmlspecialchars($fname5);
    return $fname6;
  }


  /**
   * @param array
   * @return array
   * ? Validates the image upload and sets error messages
   **/
  protected function processUploadedFile(array $files)
  {
    $response = [
      'filename' => '',
      'error' => [
        'image' => '',
        'status' => false
      ]
    ];

    $file = $files['image'];
    $fileSize = $file['size'];

    if ($fileSize <= $this->maxFileSize) {
      $fileName = basename($file['name']);
      $sanitizedFilename = strtolower($this->sanitize($fileName));
      $fileTmp = $file['tmp_name'];
      $fileError = $file['error'];

      $response['error']['image'] = $this->checkFileError($fileError);

      if ($fileError === UPLOAD_ERR_OK) {
        $mimeSecure = $this->getMimeType($fileTmp);

        if ($this->isAllowedMimeType($mimeSecure)) {
          $ext = $this->getFileExtension($sanitizedFilename);

          if ($this->isAllowedExtension($ext)) {
            $uniqueName = $this->generateUniqueFileName($sanitizedFilename);
            $this->moveUploadedFile($fileTmp, $uniqueName);

            $response['filename'] = $uniqueName;
          } else {
            $this->setErrorMessages($response, 'Image does not have an allowed file extension. Only JPG, PNG, and SVG files are allowed.', true);
          }
        } else {
          $this->setErrorMessages($response, 'File does not have an allowed media type. Please choose a different file.', true);
        }
      } else {
        $this->setErrorMessages($response, 'Sorry, there was an error uploading your image. Please try again.', true);
      }
    } else {
      $this->setErrorMessages($response, 'The image must be less than 3 MB.', true);
    }

    return $response;
  }


  /**
   * @param int
   * @return string
   * ? Checks file errors before moving file into temporary directory
   **/
  protected function checkFileError($fileError): string
  {
    // Mapping array associating file error codes with user-friendly error messages
    $errorMessages = [
      // file array error code msg
      // There is no error, the file uploaded with success. (to temporary directory)
      0 => '',
      // file array error code msg
      // The uploaded file exceeds the upload_max_filesize directive in php.ini.
      1 => 'The server does not allow such heavy files. Please contact the webmaster because something went wrong.',
      // file array error code msg
      // The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.
      2 => 'The file is too big, please choose another image.',
      // file array error code msg
      // The uploaded file was only partially uploaded.
      3 => 'Please check your internet connection and try again.',
      // file array error code msg
      // No file was uploaded
      4 => 'Please select a file.',
      // file array error code msg
      // Missing a temporary folder
      6 => 'Currently no upload is possible. Please contact the webmaster if this problem persists.',
      // file array error code msg
      // Failed to write file to disk.
      7 => 'Failed to save file to disk.',
      // file array error code msg
      // A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.
      8 => 'A PHP extension stopped uploading the file. Please contact the webmaster.'
    ];

    if ($fileError === UPLOAD_ERR_OK) {
      return '';
    }

    return $errorMessages[$fileError] ?? 'Sorry, there was an error uploading your image. Please try again.';
  }


  /**
   * @param string
   * @return string
   * ? Retrieves the MIME type of the file
   **/
  protected function getMimeType($fileTmp): string
  {
    $filepath = str_replace(' ', '\\ ', $fileTmp);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeSecure = finfo_file($finfo, $filepath);
    finfo_close($finfo);

    return $mimeSecure;
  }


  /**
   * @param string
   * @return bool
   * ? 
   **/
  protected function isAllowedMimeType($mimeSecure): bool
  {
    return in_array($mimeSecure, $this->allowedMimeTypes);
  }


  /**
   * @param string
   * @return string
   * ? Retrieves the file extension from the filename
   **/
  protected function getFileExtension($filename): string
  {
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  }


  /**
   * @param string
   * @return bool
   * ? Checks if the file extension is allowed based on the predefined list of allowed extensions
   **/
  protected function isAllowedExtension($ext): bool
  {
    return in_array($ext, $this->allowedExtensions);
  }


  /**
   * @param string
   * @return string
   * ? Generates a unique filename by appending a timestamp to the sanitized filename
   **/
  protected function generateUniqueFileName($filename): string
  {
    $uniqueName = uniqid($filename . '__' . time());
    $ext = $this->getFileExtension($filename);
    $uniqueName .= '.' . $ext;

    return $uniqueName;
  }


  /**
   * @param string
   * @return string
   * ? Moves the uploaded file to the target directory with the generated unique filename
   **/
  protected function moveUploadedFile($fileTmp, $uniqueName): string
  {
    $uploadPath = $this->targetDir . '/' . $uniqueName;
    move_uploaded_file($fileTmp, $uploadPath);

    return $uploadPath;
  }


  /**
   * @param array|string|bool
   * @return null|void
   * ? Sets the error message and status in the response array
   **/
  protected function setErrorMessages(&$response, $errorMessage, $status)
  {
    $response['error']['image'] = $errorMessage;
    $response['error']['status'] = $status;
  }
}
