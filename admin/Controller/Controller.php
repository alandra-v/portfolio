<?php

// @TODO
require_once(dirname(__DIR__, 2) . '/configuration.php');
session_name(CONFIG_SESSION_NAME);
session_set_cookie_params(CONFIG_SESSION_LIFETIME);
session_start();
// $_SESSION['token'] = bin2hex(random_bytes(32));
// $_SESSION['token-expire'] = time() + 1800;
session_regenerate_id();


class Controller
{

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
   * @param mixed
   * @return array|bool
   * ? Checks file errors before moving file into temporary directory
   **/
  protected function ckeckFileError($fileError)
  {

    switch ($fileError) {
      case 0:
        // file array error code msg
        // There is no error, the file uploaded with success. (to temporary directory)
        // user-friendly error msg
        $errorsArr[] = '';
        break;
      case 1:
        // file array error code msg
        // The uploaded file exceeds the upload_max_filesize directive in php.ini.
        // user-friendly error msg
        $errorsArr[] = 'The server does not allow such heavy files. Please contact the webmaster because something went wrong.';
        break;
      case 2:
        // file array error code msg
        // The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.
        // user-friendly error msg
        $errorsArr[] = 'The file is too big please choose another image.';
        break;
      case 3:
        // file array error code msg
        // The uploaded file was only partially uploaded.
        // user-friendly error msg
        $errorsArr[] = 'Please check your internet connection and try again.';
        break;
      case 4:
        // file array error code msg
        // No file was uploaded
        // user-friendly error msg
        $errorsArr[] = 'Please select a file.';
        break;
      case 6:
        // file array error code msg
        // Missing a temporary folder
        // user-friendly error msg
        $errorsArr[] = 'Currently no upload is possible. Please contact the webmaster if this problem persists.';
        break;
      case 7:
        // file array error code msg
        // Failed to write file to disk.
        // user-friendly error msg
        $errorsArr[] = 'Failed to save file to disk.';
        break;
      case 8:
        // file array error code msg
        // A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.
        // user-friendly error msg
        $errorsArr[] = 'A PHP extension stopped uploading the file.  Please contact the webmaster.';
        break;
    }

    if ($fileError == 0) {
      return true;
    } else {
      return $errorsArr;
    }
  }
}
