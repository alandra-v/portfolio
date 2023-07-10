<?php
require_once(__DIR__ . '/Db.php');

class ContactModel extends Db
{

  /**
   * @param null|void
   * @return array
   * ? Returns an array of contacts
   **/
  public function fetchContacts(): array
  {
    $this->query("SELECT * FROM `contact` ORDER BY created DESC");
    // $this->execute();
    $Contact = $this->fetchAll();

    if (count($Contact) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Contact
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
      'data' => []
    );
    return $Response;
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of contact information
   **/
  public function fetchContact(int $id): array
  {
    $this->query("SELECT * FROM `contact` WHERE `ID` = :id");
    $this->bind('id', $id);
    // $this->execute();
    $Contact = $this->fetch();

    if (is_bool($Contact)) {
      header('Location:' . BASE_URL . '404_error');
      return false;
    } else if (!empty($Contact)) {
      $Response = array(
        'status' => true,
        'data' => $Contact
      );
    } else {
      $Response = array(
        'status' => false,
        'data' => []
      );
    }
    return $Response;
  }


  /**
   * @param array|int
   * @return array
   * ? Updates a contact record
   **/
  public function updateContact(array $contact, int $id): array
  {
    // title
    $this->query("UPDATE `contact` SET contact_title=:title, contact_given_name=:givenName, contact_family_name=:familyName, contact_business=:business, contact_address=:address, contact_zip=:zip, contact_town=:town, contact_tel=:tel, contact_email=:email WHERE ID=:id");
    $this->bind('title', $contact['title']);
    $this->bind('givenName', $contact['givenName']);
    $this->bind('familyName', $contact['familyName']);
    $this->bind('business', $contact['business']);
    $this->bind('address', $contact['address']);
    $this->bind('zip', $contact['zip']);
    $this->bind('town', $contact['town']);
    $this->bind('tel', $contact['tel']);
    $this->bind('email', $contact['email']);
    $this->bind('id', $id);

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

  /**
   * @param int
   * @return bool
   * ? Deletes given contact from database
   **/
  public function deleteContact(int $id): bool
  {
    $this->query("DELETE FROM `contact` WHERE `ID` = :id");
    $this->bind('id', $id);
    $deleted = $this->execute();

    return $deleted;
  }
}
