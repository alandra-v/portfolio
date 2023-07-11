<?php
require_once(dirname(__DIR__) . '/Model/ContactFormModel.php');


class ContactForm
{
  private $contactFormModel;

  public $titleArray = [
    '' => 'Title',
    'mr' => 'Mr.',
    'mrs' => 'Mrs.',
    'ms' => 'Ms.',
    'other' => 'Other'
  ];


  /**
   * @param null|void
   * @return null|void
   * ? Creates a new instance of the ContactFormModel
   **/
  public function __construct()
  {
    $this->contactFormModel = new ContactFormModel();
  }


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
   * @param array
   * @return array|boolean
   * ? Verifies, creates, and returns a contact by calling the register method on the RegisterModel
   **/
  public function addContact(array $data)
  {

    $title = $this->desinfect($data['titles']);
    $givenName = $this->desinfect($data['given-name']);
    $familyName = $this->desinfect($data['family-name']);
    $business = $this->desinfect($data['business']);
    $address = $this->desinfect($data['address']);
    $zip = $this->desinfect($data['zip']);
    $town = $this->desinfect($data['town']);
    $tel = $this->desinfect($data['tel']);
    $email = $this->desinfect($data['email']);
    $message = $this->desinfect($data['message']);


    $errorMessages = array(
      'titles' => '',
      'given-name' => '',
      'family-name' => '',
      'address' => '',
      'zip' => '',
      'town' => '',
      'tel' => '',
      'email' => '',
      'message' => '',
      'terms' => ''
    );


    if (empty($title)) {
      $errorMessages['title'] = 'Please select your title';
      return $errorMessages;
    } else if (!array_key_exists($title, $this->titleArray)) {
      $errorMessages['title'] = 'Something went wrong <br> Please select your title';
      return $errorMessages;
    }

    if (empty($givenName)) {
      $errorMessages['given-name'] = 'Please enter your first name';
      return $errorMessages;
    } else if (strlen($givenName) > 255) {
      $errorMessages['given-name'] = 'Please enter less than 255 characters';
      return $errorMessages;
    }

    if (empty($familyName)) {
      $errorMessages['family-name'] = 'Please enter your last name';
      return $errorMessages;
    } else if (strlen($familyName) > 255) {
      $errorMessages['family-name'] = 'Please enter less than 255 characters';
      return $errorMessages;
    }


    if (empty($address)) {
      $errorMessages['address'] = 'Please enter your address';
      return $errorMessages;
    }


    if (empty($zip)) {
      $errorMessages['zip'] = 'Please enter your postal code';
      return $errorMessages;
    } else if (!preg_match('/^[a-z0-9][a-z0-9\- ]{0,10}[a-z0-9]$/', $zip)) {
      $errorMessages['zip'] = 'Invalid postal code';
      return $errorMessages;
    }

    if (empty($town)) {
      $errorMessages['town'] = 'Please enter your town';
      return $errorMessages;
    }

    if (empty($tel)) {
      $errorMessages['tel'] = 'Please enter your phone number';
      return $errorMessages;
    } else if (!preg_match('/^(\+|00)(?:[0-9] ?){6,14}[0-9]$/', $tel)) {
      $errorMessages['tel'] = 'Invalid format, please use 00 or + followed by country code';
      return $errorMessages;
    }


    if (empty($email)) {
      $errorMessages['email'] = 'Please enter your email address';
      return $errorMessages;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorMessages['email'] = 'Invalid email address';
      return $errorMessages;
    } else if (strlen($email) > 255) {
      $errorMessages['email'] = 'Please enter less than 255 characters';
      return $errorMessages;
    } else if (!empty($EmailStatus)) {
      $errorMessages['email'] = 'This email is already taken';
      return $errorMessages;
    }

    if (empty($message)) {
      $errorMessages['message'] = 'Please enter your message here.';
      return $errorMessages;
    } else if (strlen($message) < 30) {
      $errorMessages['message'] = 'Your message has to be at least 30 characters long.';
      return $errorMessages;
    }

    if (!isset($_POST['terms'])) {
      $errorMessages['terms'] = 'Please accept the Privacy Policy.';
      return $errorMessages;
    }

    // NOTE
    // In the future data will be encoded before it is sent to the backend

    $Payload = array(
      'title' => $title,
      'givenName' => $givenName,
      'familyName' => $familyName,
      'business' => $business,
      'address' => $address,
      'zip' => $zip,
      'town' => $town,
      'tel' => $tel,
      'email' => $email,
      'message' => $message
    );

    foreach ($Payload as $key => &$value) {
      $value = ucwords($value);
    }


    // if no errors send data
    $Response = $this->contactFormModel->createContact($Payload);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    // @TODO 
    // send message with PHPMailer

    // Delay redirecting 2 seconds for animation to finish
    $delay = 2;
    sleep($delay);

    // Redirect the user to the contact reaction page
    $name = $Payload['givenName'];
    $redirectURL = 'contact_reaction?id=' . urlencode($name);
    header('Location:' . $redirectURL);

    return true;
  }
}
