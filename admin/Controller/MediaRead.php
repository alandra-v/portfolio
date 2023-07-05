<?php
require_once(dirname(__DIR__) . '/Model/MediaModel.php');

class MediaRead
{
  private $mediaModel;


  /**
   * @param null|void
   * @return null|void
   * ? Checks if the user session is set and creates a new instance of the MediaModel
   **/
  public function __construct()
  {

    $this->mediaModel = new MediaModel();
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
}
