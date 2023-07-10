<?php
require_once(__DIR__ . '/Db.php');

class MediaModel extends Db
{

  /**
   * @param array
   * @return array
   * ? Creates and returns an image record
   **/
  public function uploadImage(array $imgInfo): array
  {
    $this->query("INSERT INTO `project_img` (img, img_alt_text, img_project_id) VALUES (:image, :altText, :projectID)");
    $this->bind('image', $imgInfo['image']);
    $this->bind('altText', $imgInfo['altText']);
    $this->bind('projectID', $imgInfo['projectID']);

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
   * @param null|void
   * @return array
   * ? Returns an array of images
   **/
  public function fetchImages(): array
  {
    $this->query("SELECT * FROM `project_img` ORDER BY created DESC");
    // $this->execute();
    $Img = $this->fetchAll();

    if (count($Img) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Img
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
   * ? Returns an array of image information based on the method parameter
   **/
  public function fetchImage(int $id): array
  {
    $this->query("SELECT * FROM `project_img` WHERE `ID` = :id");
    $this->bind('id', $id);
    // $this->execute();
    $Img = $this->fetch();

    if (is_bool($Img)) {
      header('Location:' . BASE_URL . '404_error');
      return false;
    } else if (count($Img) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Img
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
   * @param array|int
   * @return array
   * ? Updated an image record
   **/
  public function editImage(array $img, int $id): array
  {
    $this->query("UPDATE `project_img` SET img=:image, img_alt_text=:altText, img_project_id=:projectID WHERE ID=:id");
    $this->bind('image', $img['image']);
    $this->bind('altText', $img['altText']);
    $this->bind('projectID', $img['projectID']);
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
   * ? Deletes the given image from database
   **/
  public function deleteImage(int $id): bool
  {
    $this->query("DELETE FROM `project_img` WHERE `ID` = :id");
    $this->bind('id', $id);
    $deleted = $this->execute();

    return $deleted;
  }
}
