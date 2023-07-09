<?php
require_once(dirname(__DIR__) . '/Controller/Project.php');
$uploadValidation = new Project();
$Response = [];

if (isset($_POST) && count($_POST) > 0) {
  $Response = $uploadValidation->createProject($_POST, $_FILES);
}
foreach ($uploadValidation->errorsArr as $error) {
  $Response['error'] .= $error . "<br>";
}
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <div class="flex-container-title">
        <h2>Add new project:</h2>
        <a href="projects_read.php" class="go-back">Back to overview &#11152;</a>
      </div>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-container">
          <label for="title">Project title:</label>
          <input type="text" name="title" id="title" value="<?= (isset($_POST['title'])) ? $_POST['title'] : '' ?>">
          <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
            <span class="error-span"><?= $Response['title']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="year">Project year:</label>
          <input name="year" type="number" id="year" placeholder="YYYY" value="<?= (isset($_POST['year'])) ? $_POST['year'] : '' ?>">
          <?php if (isset($Response['year']) && !empty($Response['year'])) : ?>
            <span class="error-span"><?= $Response['year']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="website-url">Enter project website URL:</label>
          <input name="website-url" type="text" id="website-url" value="<?= (isset($_POST['website-url'])) ? $_POST['website-url'] : '' ?>">
          <?php if (isset($Response['url']) && !empty($Response['url'])) : ?>
            <span class="error-span"><?= $Response['url']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="image">Upload logo:<br><i class="fa-solid fa-circle-exclamation"></i>
            Make sure, to include "logo" in the filename!</label>
          <input type="file" accept="image/*" name="image" id="image">
          <?php if (isset($Response['image']) && !empty($Response['image'])) : ?>
            <span class="error-span"><?= $Response['image']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="alt-text">Enter logo alternative text:</label>
          <input name="alt-text" type="text" id="alt-text" value="<?= (isset($_POST['alt-text'])) ? $_POST['alt-text'] : '' ?>">
          <?php if (isset($Response['alt-text']) && !empty($Response['alt-text'])) : ?>
            <span class="error-span"><?= $Response['alt-text']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container status-container">
          <label for="status">Status project completed:</label>
          <input type="checkbox" id="status" name="status" aria-label="project completed" value="completed" <?= (isset($_POST['status']) && $_POST['status'] == "completed") ? "checked" : '' ?>>
          <?php if (isset($Response['']) && !empty($Response[''])) : ?>
            <span class="error-span"><?= $Response['']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="create" class="create-btn">Create</button>
        <?php if (isset($Response['status']) && !$Response['status']) :  ?>
          <span class="error-span"><?= $Response['status'] ?></span>
        <?php endif; ?>
      </form>
    </section>
</body>
</main>

</body>

</html>