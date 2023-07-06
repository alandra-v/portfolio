<?php
require_once(dirname(__DIR__) . '/Model/ProjectModel.php');
require_once(dirname(__DIR__) . '/Model/MediaModel.php');

class ProjectRead
{
  private $projectModel;
  private $mediaModel;
  private $Projects;
  private $Project;
  private $Images;


  /**
   * @param null|void
   * @return null|void
   * ? Creates a new instance of the ProjectModel and MediaModel and fetches Projects and Images 
   **/
  public function __construct()
  {
    $this->projectModel = new ProjectModel();
    $this->mediaModel = new MediaModel();

    $this->Projects = $this->projectModel->fetchCompletedProjects();
    $this->Images = $this->mediaModel->fetchImages();
  }


  /**
   * @param int|bool
   * @return array
   * ? Returns an array of processed Projects with associated Images based on method parameters
   **/
  private function processProjects($maxImageCount, $imageCondition): array
  {
    $data = [];

    foreach ($this->Projects['data'] as $project) {
      $images = [];
      $imageCount = 0;
      foreach ($this->Images['data'] as $image) {
        if ($image['img_project_id'] == $project['ID'] && $imageCount < $maxImageCount && $imageCondition($image)) {
          $imageCount++;
          $images[] = [
            'img_webp' => $image['img_webp'],
            'img' => $image['img'],
            'img_small_webp' => $image['img_small_webp'],
            'img_small' => $image['img_small'],
            'img_alt_text' => $image['img_alt_text']
          ];
        }
      }

      $data[] = [
        'project_title' => $project['project_title'],
        'images' => $images,
        'project_id' => $project['ID']
      ];
    }

    return $data;
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of processed Project information with associated Images based on method parameters
   **/
  private function processProject($id, $maxImageCount): array
  {
    $this->Project = $this->projectModel->fetchCompletedProject($id);

    $images = [];
    $imageCount = 0;
    foreach ($this->Images['data'] as $image) {
      if ($image['img_project_id'] == $this->Project['data']['ID'] && $imageCount < $maxImageCount) {
        $imageCount++;
        $images[] = [
          'img_webp' => $image['img_webp'],
          'img' => $image['img'],
          'img_small_webp' => $image['img_small_webp'],
          'img_small' => $image['img_small'],
          'img_alt_text' => $image['img_alt_text']
        ];
      }
    }

    $this->Project['data']['images'] = $images;
    return $this->Project['data'];
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of completed projects for the portfolio langing page by calling the processProjects method with parameters
   **/
  public function getCompletedProjectsHome(): array
  {
    return $this->processProjects(3, fn ($image) => true);
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of completed project information by calling the processProject method with parameters
   **/
  public function getCompletedProject($id): array
  {
    return $this->processProject($id, 2);
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of completed projects for the portfolio work page by calling the processProjects method with parameters
   **/
  public function getCompletedProjectsWork(): array
  {
    return $this->processProjects(1, function ($image) {
      return strpos($image['img'], 'home') !== false;
    });
  }
}
