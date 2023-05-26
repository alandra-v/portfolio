<?php

$titleArray = [
  '' => 'Title',
  'mr' => 'Mr.',
  'mrs' => 'Mrs.',
  'ms' => 'Ms.',
  'other' => 'Other'
];

$genderArray = [
  'woman' => 'Woman',
  'man' => 'Man',
  'transgender' => 'Transgender',
  'non-binary' => 'Non-binary',
  'no-response' => 'Prefer not to respond'
];

echo '<pre>';
echo 'POST Array:';
print_r($_POST);
echo '</pre>';

// Variables
$hasErrors = false; // Fehler-Status-Variable
$errorMessages = array();


// RegEx
$usernameRegEx = '/^[A-Za-z0-9_.-]{4,16}$/';

require("function.php");
require_once("../configuration.php");

// // PHPMAILER
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// require '../../phpmailer/vendor/autoload.php';
// require '../../phpmailer/config.php';
// echo 'SMTP Host: ' . SMTP_HOST;  // test, um zu sehen, ob die Konstanten aus Config.php zur Verfügung stehen


// form handling

if (
  isset(
    // $_POST['titles'],
    // $_POST['gender'],
    $_POST['given-name'],
    $_POST['family-name'],
    $_POST['username'],
    $_POST['email'],
    $_POST['email-confirmation'],
    $_POST['password'],
    $_POST['password-confirmation'],
    // $_POST['terms']
  )
) {


  $title = desinfect($_POST['titles']);
  $gender = desinfect($_POST['gender']);
  $givenName = desinfect($_POST['given-name']);
  $familyName = desinfect($_POST['family-name']);
  $username = desinfect($_POST['username']);
  $email = desinfect($_POST['email']);
  $emailConfirmation = desinfect($_POST['email-confirmation']);
  $password = desinfect($_POST['password']);
  $pwdHash = password_hash($password, PASSWORD_DEFAULT);
  $passwordConfirmation = desinfect($_POST['password-confirmation']);



  if (empty($title)) {
    $errorMessages['title'] = 'Please select your title';
    $hasErrors = true;
  } else if (!array_key_exists($title, $titleArray)) {
    $errorMessages['title'] = 'Something went wrong <br> Please select your title';
    $hasErrors = true;
  }

  if (empty($gender)) {
    $errorMessages['gender'] = 'Please select your gender';
    $hasErrors = true;
  } else if (!array_key_exists($gender, $genderArray)) {
    $hasErrors = true;
    $errorMessages['gender'] = 'Something went wrong <br> Please select your gender';
  }

  if (empty($givenName)) {
    $errorMessages['givenName'] = 'Please enter your first name';
    $hasErrors = true;
  } else if (strlen($givenName) > 255) {
    $errorMessages['givenName'] = 'Please enter less than 255 characters';
    $hasErrors = true;
  }

  if (empty($familyName)) {
    $errorMessages['familyName'] = 'Please enter your last name';
    $hasErrors = true;
  } else if (strlen($familyName) > 255) {
    $errorMessages['familyName'] = 'Please enter less than 255 characters';
    $hasErrors = true;
  }

  if (empty($username)) {
    $errorMessages['username'] = 'Please enter a username';
    $hasErrors = true;
  } else if (!preg_match($usernameRegEx, $username)) {
    $errorMessages['username'] = 'Invalid username';
    print_r($errorMessages['username']);
    $hasErrors = true;
  }

  if (empty($email)) {
    $errorMessages['email'] = 'Please enter your email address';
    $hasErrors = true;
  } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
    $errorMessages['email'] = 'Invalid email address';
    $hasErrors = true;
  } else if (strlen($email) > 255) {
    $errorMessages['email'] = 'Please enter less than 255 characters';
    $hasErrors = true;
  }

  if (empty($emailConfirmation)) {
    $errorMessages['emailConfirmation'] = 'Please confirm your email address';
    $hasErrors = true;
  } else if ($_POST['email'] !== $_POST['email-confirmation']) {
    $errorMessages['emailConfirmation'] = 'Email addresses don\'t match. Take another look.';
    $hasErrors = true;
  }

  $uppercase    = preg_match('@[A-Z]@', $password);
  $lowercase    = preg_match('@[a-z]@', $password);
  $number       = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
  $whiteSpace   = preg_match('@[\s]@', $password);

  if (empty($password)) {
    $errorMessages['password'] = 'Please enter a password';
    $hasErrors = true;
  } else if (!$uppercase || !$lowercase || !$number || !$specialChars || $whiteSpace || strlen($password) < 8) {
    $errorMessages['password'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    $hasErrors = true;
  } else if (strlen($password) > 255) {
    $errorMessages['password'] = 'Please enter less than 255 characters';
    $hasErrors = true;
  } else {
    echo 'strong password';
  }

  if (empty($passwordConfirmation)) {
    $errorMessages['passwordConfirmation'] = 'Please confirm your password';
    $hasErrors = true;
  } else if ($_POST['password'] !== $_POST['password-confirmation']) {
    $errorMessages['passwordConfirmation'] = 'Passwords don\'t match. Take another look.';
    $hasErrors = true;
  }

  if (!isset($_POST['terms'])) {
    $errorMessages['terms'] = 'Please accept Terms & Conditions';
    $termsChecked = '';
    $hasErrors = true;
  } else if (isset($_POST['terms']) && $_POST['terms'] == "agree") {
    $termsChecked = "checked";
  }

  // ready for processing
  if ($hasErrors == false) {

    // send data to db
    try {
      // Send data to backend
      require_once('includes/mysql_connect.php');
      $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "INSERT INTO `user` (`user_name`, `user_email`, `user_password`, `user_given_name`, `user_family_name`, `user_title`, `user_gender`) 
      VALUES (:username, :email, :pwdHash, :givenName, :familyName, :title, :gender)";

      $stmt = $dbo->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':pwdHash', $pwdHash);
      $stmt->bindParam(':givenName', $givenName);
      $stmt->bindParam(':familyName', $familyName);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':gender', $gender);
      $stmt->execute();

      // relocate to login
      header('location: login.php?status=registered');
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();

      if (str_contains($e, '1062')) {
        $dbErrorMessage = 'Username is already taken';
      } else {
        $dbErrorMessage = 'Something went wrong, please try again.';
      }
    }
  } else {
    $errorMessages['error'] = '❗️ Please fill out all required fields correctly';
  }
} else {

  echo 'form handling error';

  $title = '';
  $gender = '';
  $givenName = '';
  $familyName = '';
  $username = '';
  $email = '';
  $emailConfirmation = '';
  $password = '';
  $passwordConfirmation = '';
  $termsChecked = '';


  $hasErrors = true;
};
