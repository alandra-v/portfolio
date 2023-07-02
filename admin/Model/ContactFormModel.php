<?php
require_once(__DIR__ . '/Db.php');

class ContactFormModel extends Db
{
  /**
   * @param array
   * @return array
   * ? Creates and returns a contact record
   **/
  public function createContact(array $contact): array
  {
    $this->query("INSERT INTO `contact` (contact_title, contact_given_name, contact_family_name, contact_business, contact_address, contact_zip, contact_town, contact_tel, contact_email) 
    VALUES (:title, :givenName, :familyName, :business, :address, :zip, :town, :tel, :email)");
    $this->bind('title', $contact['title']);
    $this->bind('givenName', $contact['givenName']);
    $this->bind('familyName', $contact['familyName']);
    $this->bind('business', $contact['business']);
    $this->bind('address', $contact['address']);
    $this->bind('zip', $contact['zip']);
    $this->bind('town', $contact['town']);
    $this->bind('tel', $contact['tel']);
    $this->bind('email', $contact['email']);


    if ($this->execute()) {
      $Response = array(
        'status' => true,
      );
      return $Response;
    } else {
      $Response = array(
        'status' => false
      );
      return $Response;
    }
  }
}
