<?php
require_once(dirname(__DIR__) . '/Controller/Project.php');
// require_once(dirname(dirname(__DIR__)) . '/configuration.php');
$uploadValidation = new Project();
$Response = [];

if (isset($_POST) && count($_POST) > 0 && isset($_FILES)) {
  $Response = $uploadValidation->createProject($_POST, $_FILES);
}

// foreach ($uploadValidation->errorsArr as $error) {
//   $Response['error'] .= $error . "<br>";
// }

require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <h2>Add new project:</h2>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $uploadValidation->maxFileSize ?>">
        <div class="input-container">
          <label for="title">Project title:</label>
          <input type="text" name="title" id="title" value="<?= (isset($_POST['title'])) ? $_POST['title'] : '' ?>">
          <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
            <span class="error-span"><?= $Response['title']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="year">Project year:</label>
          <input name="year" type="number" id="year" value="<?= (isset($_POST['year'])) ? $_POST['year'] : '' ?>">
          <?php if (isset($Response['year']) && !empty($Response['year'])) : ?>
            <span class="error-span"><?= $Response['year']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="website-url">Enter project website URL:</label>
          <input name="website-url" type="text" id="website-url" value="<?= (isset($_POST['url'])) ? $_POST['url'] : '' ?>">
          <?php if (isset($Response['url']) && !empty($Response['url'])) : ?>
            <span class="error-span"><?= $Response['url']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="image">Upload company logo:</label>
          <!-- <input type="file" accept="image/*" name="image" id="image"> -->
          <!-- for testing -->
          <input type="file" name="image" id="image">
          <?php if (isset($Response['error']) && !empty($Response['error'])) : ?>
            <span class="error-span"><?= $Response['error']; ?></span>
          <?php endif; ?>
          <?php if (isset($Response['image']) && !empty($Response['image'])) : ?>
            <span class="error-span"><?= $Response['image']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container status-container">
          <label for="status">Status project completed:</label>
          <input type="checkbox" id="status" name="status" aria-label="project completed" value="completed">
          <?php if (isset($Response['']) && !empty($Response[''])) : ?>
            <span class="error-span"><?= $Response['']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="create" class="create-btn">Create</button>
        <?php //if (isset($Response['status'])) : 
        ?>
        <span class="error-span" class="error-span"><? ?></span>
        <? //endif; 
        ?>
      </form>
    </section>
</body>
</main>

</body>

</html>