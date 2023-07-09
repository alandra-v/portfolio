<?php
require_once(dirname(__DIR__) . '/Controller/Project.php');

$projectData = new Project();
$Response = [];
$Project = $projectData->getProject($_GET['id']);

if (isset($_POST) && count($_POST) > 0) {
  $Response = $projectData->editProject($_POST, $_GET['id'], $_FILES);
}

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <div class="flex-container-title">
        <h2>Update project:</h2>
        <a href="projects_read.php" class="go-back">Back to overview &#11152;</a>
      </div>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-container">
          <label for="title">Project title:</label>
          <input type="text" name="title" id="title" value="<?= (isset($_POST['title'])) ? $_POST['title'] : $Project['data']['project_title'] ?>">
          <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
            <span class="error-span"><?= $Response['title']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="year">Project year:</label>
          <input name="year" type="number" id="year" placeholder="YYYY" value="<?= (isset($_POST['year'])) ? $_POST['year'] : $Project['data']['project_year'] ?>">
          <?php if (isset($Response['year']) && !empty($Response['year'])) : ?>
            <span class="error-span"><?= $Response['year']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="website-url">Enter project website URL:</label>
          <input name="website-url" type="text" id="website-url" value="<?= (isset($_POST['website-url'])) ? $_POST['website-url'] : $Project['data']['project_link'] ?>">
          <?php if (isset($Response['url']) && !empty($Response['url'])) : ?>
            <span class="error-span"><?= $Response['url']; ?></span>
          <?php endif; ?>
        </div>
        <div class="thumbnail">
          <img class="img-thumbnail" src="<?= BASE_URL . '/assets/images/uploads/' . $Project['data']['project_logo'] ?>" alt="<?= $Project['data']['project_logo_alt_text'] ?>">
        </div>
        <input type="text" name="original" class="visually-hidden" value="<?= $Project['data']['project_logo'] ?>">
        <div class="input-container">
          <label for="image">Upload logo:</label>
          <input type="file" accept="image/jpg, image/jpeg, image/png, image/svg" name="image" id="image">
          <!-- for testing -->
          <!-- <input type="file" name="image" id="image"> -->
          <?php if (isset($Response['image']) && !empty($Response['image'])) : ?>
            <span class="error-span"><?= $Response['image']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="alt-text">Enter alternative text:</label>
          <input name="alt-text" type="text" id="alt-text" value="<?= (isset($_POST['alt-text'])) ? $_POST['alt-text'] : $Project['data']['project_logo_alt_text'] ?>">
          <?php if (isset($Response['alt-text']) && !empty($Response['alt-text'])) : ?>
            <span class="error-span"><?= $Response['alt-text']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container status-container">
          <label for="status">Status project completed:</label>
          <input type="checkbox" id="status" name="status" aria-label="project completed" value="completed" <?= (isset($_POST['status']) || $Project['data']['project_status'] == 1) ? 'checked="checked"' : '' ?>>
          <?php if (isset($Response['']) && !empty($Response[''])) : ?>
            <span class="error-span"><?= $Response['']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="create" class="update-btn">Update</button>
        <?php if (isset($Response['status']) && !$Response['status']) :  ?>
          <span class="error-span"><?= $Response['status'] ?></span>
        <?php endif; ?>
      </form>
    </section>
</body>
</main>

</body>

</html>