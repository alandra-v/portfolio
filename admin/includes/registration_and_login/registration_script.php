<?php

echo '<pre>';
echo 'POST Array:';
print_r($_POST);
echo '</pre>';

// variables

$hasErrors = false; // Fehler-Status-Variable
$errorMessages = array();

$title = '';
$gender = '';
$givenName = '';
$familyName = '';
$username = '';
$email = '';
$password = '';

// RegEx
$usernamerRegEx = "#^[A-Za-z0-9_.-]{4,16}$#";


require("function.php");
require_once("../configuration.php");
// require_once("../../../configuration.php");
require_once('includes/mysql_connect.php');
// require_once('../mysql_connect.php');

// // PHPMAILER
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// require '../../phpmailer/vendor/autoload.php';
// require '../../phpmailer/config.php';
// echo 'SMTP Host: ' . SMTP_HOST;  // test, um zu sehen, ob die Konstanten aus Config.php zur Verfügung stehen


// form handling
// if (isset($_POST['register'])) {
if (
  isset(
    $_POST['titles'],
    $_POST['gender'],
    $_POST['given-name'],
    $_POST['family-name'],
    $_POST['username'],
    $_POST['email'],
    $_POST['email-confirmation'],
    $_POST['password'],
    $_POST['password-confirmation']
  )
) {


  $title = $_POST['titles'];
  $gender = $_POST['gender'];
  $givenName = desinfect($_POST['given-name']);
  $familyName = desinfect($_POST['family-name']);
  $username = desinfect($_POST['username']);
  $email = desinfect($_POST['email']);
  $emailConfirmation = desinfect($_POST['email-confirmation']);
  $password = $_POST['password'];
  $passwordConfirmation = $_POST['password-confirmation'];



  // radio button validation??

  if (empty($title)) {
    $errorMessages['title'] = 'Please select your title';
    // echo '<span style="color:red;">' . $errorMessages['title'] . '</span>';
    $hasErrors = true;
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
  } else if (!preg_match($usernamerRegEx, $username)) {
    $errorMessages['username'] = 'Invalid username';
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

  if (!isset($_POST['agree'])) {
    $errorMessages['termsAndConditions'] = 'Please accept Terms & Conditions';
    $hasErrors = true;
  } else {
    $termsAndConditions = $_POST['agree'];
  }

  // if (count($errorMessages) > 0) {
  //   echo '<span style="color:red;" font-family="sans-serif";>';
  //   echo implode('<br>', $errorMessages);
  //   echo '</span>';
  // }

  // ready for processing
  if ($hasErrors == false) {

    $token = md5(uniqid());
    echo 'das ist mein token: ' . $token;

    // send email to verify email address
    // $recipient = $email;
    // $reference = 'Confirm your email address';
    // $headers = "From: alandra.villalaz@gmail.com" . "\r\n";
    // $headers .= "Content-type: text/plain; charset=iso-8859-1" . "\r\n";

    // $mailbody = 'Hello ' . $username . ' Let us know if this is really your email address, to help us keep your account secure.' . "\n";
    // $mailbody .= 'To confirm your email address please click here: http://localhost:8888/WDD322-PHP/week_03/aktivieren.php?activate=' . $token;

    // $mailSent = mail($recipient, $reference, $mailbody, $headers);

    // if ($mailSent == true) {
    //   // PUT ON LOGIN PAGE BZW DA USE NEH
    //   echo 'Thank you for your registration, you will receive an email shortly to confirm your email address and complete your registration';
    // }

    //PHPMAILER "
    // // Jetzt instanzieren wir einen PHPMailer (wir erwecken ihn so zum leben)
    // $mailer = new PHPMailer();  // unsere PHPMailer Instanz in diesem Script 
    // $mailer->SMTPDebug = 2;     // Serverkommunikation anzeigen lassen - dies ist wichtig während dem Entwickeln, um zu sehen, wo ein Fehler geschieht beim versenden
    // $mailer->isSMTP();          // einen SMTP Server zum Versand benutzen

    // // dem PHPMailer die SMTP-Infos mitteilen
    // $mailer->Host = SMTP_HOST;
    // $mailer->Port = SMTP_PORT;
    // $mailer->Username = SMTP_USER;
    // $mailer->Password = SMTP_PASSWORD;
    // $mailer->SMTPSecure = SMTP_SECURE;
    // $mailer->SMTPAuth = SMTP_AUTH;


    // // Mail header vorbereiten
    // $mailer->setFrom('alandra.villalaz@gmail.com', 'AVD Team'); // Absender definieren
    // $mailer->addAddress($email);   // Empfänger definieren


    // // Mail vorbereiten
    // $mailer->Subject = 'Confirm your email address'; // Betreff definieren
    // $mailer->Body = 'Hello ' . $username . ' Let us know if this is really your email address, to help us keep your account secure.
    //  To confirm your email address please click here: http://localhost:8888/WDD322-PHP/week_03/aktivieren.php?activate=' . $token;

    // // mail senden
    // $mailer->send();

    // // Möglichkeit, einen Fehler zu erkennen und auszugeben:
    // if (strlen($mailer->ErrorInfo) > 0) {
    //   echo 'Fehler: ' . $mailer->ErrorInfo;
    // } else {
    //   echo "email sent";
    // }


    // send data to db
    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // $query = "INSERT INTO `user` 
    // (`user_name`, `user_email`, `user_password`, `user_given_name`, `user_family_name`, `user_title`, `user_gender`);
    // VALUES ('$username', '$email', '$password', '$givenName', '$familyName', '$title', '$gender')";

    // $statement = $dbo->prepare($query);

    // $statement->execute();


    // relocate to login
    header('location: ../../login.php?status=registered');
  }
} else {
  echo 'form handling error';
  // $errorMessages['form'] = 'Please fill out all required fields correctly';
  // $hasErrors = true;
};
// };
