<?php
require_once(__DIR__ . '/Db.php');

class ProjectModel extends Db
{
  /**
   * @param array
   * @return array
   * ? Creates and returns a project record
   **/
  public function createProject(array $project): array
  {
    $this->query("INSERT INTO `project` (project_title, project_year, project_link, project_status ) 
    VALUES (:title, :year, :link, :status)");
    $this->bind('title', $project['title']);
    $this->bind('year', $project['year']);
    $this->bind('link', $project['url']);
    $this->bind('status', $project['status']);

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
   * ? Returns an array of projects
   **/
  public function fetchProjects(): array
  {
    $this->query("SELECT * FROM `project` ORDER BY created DESC");
    // $this->execute();
    $Project = $this->fetchAll();

    if (count($Project) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Project
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
   * @param null|void
   * @return array
   * ? Returns an array of projects with their associated images
   **/
  public function fetchJoinedProjects(): array
  {
    $this->query("SELECT * FROM project ORDER BY created DESC
    INNER JOIN project_img ON project.ID = project_img.img_project_id");
    $Project = $this->fetchAll();

    if (count($Project) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Project
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
   * ? Returns an array of project information based on the method parameter
   **/
  public function fetchProject(int $id): array
  {
    $this->query("SELECT * FROM `project` WHERE `ID` = :id");
    $this->bind('id', $id);
    // $this->execute();
    $Project = $this->fetch();

    if (count($Project) > 0) {
      $Response = array(
        'status' => true,
        'data' => $Project
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
   * ? Returns an array of project information with its associated images based on the method parameter
   **/
  public function fetchJoinedProject(): array
  {
  }


  /**
   * @param array|int
   * @return array
   * ? Updates a project record
   **/
  public function editProject(array $project, int $id): array
  {
    $this->query("UPDATE `project` SET project_title=:title, project_year=:year, project_link=:link, project_status=:status WHERE ID=:id");

    $this->bind('title', $project['title']);
    $this->bind('year', $project['year']);
    $this->bind('link', $project['url']);
    $this->bind('status', $project['status']);
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
   * ? Deletes the given project from database
   **/
  public function deleteProject(int $id): bool
  {
    $this->query("DELETE FROM `project` WHERE `ID` = :id");
    $this->bind('id', $id);
    $deleted = $this->execute();

    return $deleted;
  }
}
