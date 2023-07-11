<?php
require_once(__DIR__ . '/Controller.php');
require_once(dirname(__DIR__) . '/Model/ContactModel.php');

class Contact extends Controller
{
  private $contactModel;

  public $titleArray = [
    '' => 'Title',
    'Mr' => 'Mr.',
    'Mrs' => 'Mrs.',
    'Ms' => 'Ms.',
    'Other' => 'Other'
  ];

  //NOTE
  //sensitive information will be encrypted in the future


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the ContactModel
   */
  public function __construct()
  {
    if (!isset($_SESSION['auth_status'])) header('Location: ../login');
    $this->contactModel = new ContactModel();
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of contacts by calling the fetchContacts method on the ContactModel
   */
  public function getContacts(): array
  {
    // NOTE
    // In the future data will be decoded before it is sent to the view
    return $this->contactModel->fetchContacts();
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of contact information by calling the fetchContact method on theContactModel
   */
  public function getContact(int $id): array
  {
    // NOTE
    // In the future data will be decoded before it is sent to the view
    return $this->contactModel->fetchContact($id);
  }


  /**
   * @param array|int
   * @return array|bool
   * ? Redirects user to contacts read page after updating 
   */
  public function editContact(array $data, int $id)
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


    $errorMessages = array(
      'titles' => '',
      'given-name' => '',
      'family-name' => '',
      'address' => '',
      'zip' => '',
      'town' => '',
      'tel' => '',
      'email' => '',
      'errorStatus' => false
    );


    if (empty($title)) {
      $errorMessages['title'] = 'Please select a title';
      $errorMessages['errorStatus'] = true;
    } else if (!array_key_exists($title, $this->titleArray)) {
      $errorMessages['title'] = 'Something went wrong <br> Please select a title';
      $errorMessages['errorStatus'] = true;
    }

    if (empty($givenName)) {
      $errorMessages['given-name'] = 'Please enter a first name';
      $errorMessages['errorStatus'] = true;
    } else if (strlen($givenName) > 255) {
      $errorMessages['given-name'] = 'Please enter less than 255 characters';
      $errorMessages['errorStatus'] = true;
    }

    if (empty($familyName)) {
      $errorMessages['family-name'] = 'Please enter a last name';
      $errorMessages['errorStatus'] = true;
    } else if (strlen($familyName) > 255) {
      $errorMessages['family-name'] = 'Please enter less than 255 characters';
      $errorMessages['errorStatus'] = true;
    }


    if (empty($address)) {
      $errorMessages['address'] = 'Please enter an address';
      $errorMessages['errorStatus'] = true;
    }


    if (empty($zip)) {
      $errorMessages['zip'] = 'Please enter a postal code';
      $errorMessages['errorStatus'] = true;
    } else if (!preg_match('/^[a-z0-9][a-z0-9\- ]{0,10}[a-z0-9]$/', $zip)) {
      $errorMessages['zip'] = 'Invalid postal code';
      $errorMessages['errorStatus'] = true;
    }

    if (empty($town)) {
      $errorMessages['town'] = 'Please enter a town';
      $errorMessages['errorStatus'] = true;
    }

    if (empty($tel)) {
      $errorMessages['tel'] = 'Please enter a phone number';
      $errorMessages['errorStatus'] = true;
    } else if (!preg_match('/^(\+|00)(?:[0-9] ?){6,14}[0-9]$/', $tel)) {
      $errorMessages['tel'] = 'Invalid format, please use 00 or + followed by country code';
      $errorMessages['errorStatus'] = true;
    }


    if (empty($email)) {
      $errorMessages['email'] = 'Please enter an email address';
      $errorMessages['errorStatus'] = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorMessages['email'] = 'Invalid email address';
      $errorMessages['errorStatus'] = true;
    } else if (strlen($email) > 255) {
      $errorMessages['email'] = 'Please enter less than 255 characters';
      $errorMessages['errorStatus'] = true;
    } else if (!empty($EmailStatus)) {
      $errorMessages['email'] = 'This email is already registered';
      $errorMessages['errorStatus'] = true;
    }

    if ($errorMessages['errorStatus']) {
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
      'email' => $email
    );

    foreach ($Payload as $key => &$value) {
      $value = ucwords($value);
    }


    // if no errors send data
    $Response = $this->contactModel->updateContact($Payload, $id);

    if (!$Response['status']) {
      $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
      return $Response;
    }

    header('Location: contacts_read?contactStatus=updated');
    return true;
  }


  /**
   * @param int
   * @return null|void
   * ? Redirects user to contacts read page after deleting the given contact
   */
  public function deleteContact(int $id)
  {
    if ($this->contactModel->deleteContact($id)) header('Location: contacts_read?contactStatus=deleted');
  }
}
