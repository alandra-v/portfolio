<?php
require_once(dirname(__DIR__) . '/Controller/Project.php');
$Data = new Project();
$Response = [];
$Projects = $Data->getProjects();
if (isset($_GET['delete'])) $Data->deleteProject($_GET['delete']);

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');


?>


<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <!-- @TODO -->
    <!-- install search function -->
    <a href="project_create.php" class="add-new">
      <i class="fa-solid fa-plus"></i>
      <span>Add a new project</span>
    </a>
    <?php if (isset($_GET['created'])) : ?>
      <div class="confirmation">
        <p><?= 'Your new project entry was successful.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (isset($_GET['updated'])) : ?>
      <div class="confirmation">
        <p><?= 'Your project has successfully been updated.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (isset($_GET['deleted'])) : ?>
      <div class="confirmation">
        <p><?= 'Your project and all associated images have successfully been deleted.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (!$Projects['data']) : ?>
      <div class="confirmation">
        <p><?= 'No projects have been added yet.' ?></p>
      </div>
    <?php endif; ?>
    <?php include(dirname(__DIR__) . '/includes/cms/confirmation.php'); ?>
    <ul class="project-list">
      <?php foreach ($Projects['data'] as $project) : ?>
        <li>
          <div class="container">
            <div class="img-container">
              <?php if ($project['project_logo']) : ?>
                <img src="<?= BASE_URL . '/assets/images/uploads/' . $project['project_logo'] ?>" alt="<?= $project['project_logo_alt_text'] ?>" class="logo">
              <?php else : ?>
                <i class="fa-solid fa-folder-open"></i>
              <?php endif; ?>
            </div>
            <h2><?= $project['project_title'] ?></h2>
            <div class="flex-container">
              <p><?= date("Y", strtotime($project['project_year'])) ?></p>
              <div class="flex-container-status">
                <p class="label">Status:</p>
                <?php if ($project['project_status'] === 1) : ?>
                  <i class="fa-regular fa-circle-check" aria-label="status is active"></i>
                <?php else : ?>
                  <i class="fa-solid fa-circle-exclamation first" aria-label="status is inactive"></i>
                <?php endif; ?>
              </div>
            </div>
            <a href="<?= $project['project_link'] ?>" class="website-url"><?= $project['project_link'] ?></a>
            <div>
              <p class="label">ID:</p>
              <p class="project-id"><?= $project['ID'] ?></p>
            </div>
            <div>
              <p class="label">Created on:</p>
              <p class="date"><?= date("d.M.Y", strtotime($project['created'])); ?> at <?= date("H:m:s", strtotime($project['created'])); ?></p>
            </div>

            <div class="flex-container-operations">
              <!-- Edit btn -->
              <a href="project_update?id= <?= $project['ID'] ?>" class="update-btn">
                <i class="fa-solid fa-pencil" aria-label="edit"></i>
              </a>
              <!-- Delete btn -->
              <button class="delete-btn" onclick="
                  showModal('Are you sure you want to delete the <?= $project['project_title'] ?> project and all associated images? The project and images will be irreversibly deleted!',
                  '?delete=<?= $project['ID'] ?>' )">
                <i class="fa-solid fa-trash" aria-label="delete"></i>
              </button>
            </div>

          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>




</body>

</html>