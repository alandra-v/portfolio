<?php
require_once(dirname(__DIR__) . '/Model/ProjectModel.php');

class ProjectRead
{

  private $projectModel;

  /**
   * @param null|void
   * @return null|void
   * ? Creates a new instance of the ProjectModel
   **/
  public function __construct()
  {
    $this->projectModel = new ProjectModel();
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of projects with their associated images by calling the fetchJoinedProjects method on the ProjectModel
   **/
  public function getJoinedProjects()
  {
    return $this->projectModel->fetchJoinedProjects();
  }


  /**
   * @param null|void
   * @return array
   * ? Returns an array of projects by calling the fetchProjects method on the ProjectModel
   **/
  public function getProjects(): array
  {
    return $this->projectModel->fetchProjects();
  }


  /**
   * @param int
   * @return array
   * ? Returns an array of project information which its associated images by calling the fetchJoinedProject method on the ProjectModel
   **/
  public function getJoinedProject(int $id): array
  {
    return $this->projectModel->fetchJoinedProject($id);
  }
}
