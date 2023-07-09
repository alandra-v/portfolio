<?php
require_once(dirname(__DIR__) . '/Controller/Media.php');
require_once(dirname(__DIR__) . '/Controller/Project.php');

$uploadValidation = new Media();
$Response = [];

if (isset($_POST['upload']) && count($_POST) > 0 && isset($_FILES)) {
  $Response = $uploadValidation->uploadImage($_POST, $_FILES);
}

foreach ($uploadValidation->errorsArr as $error) {
  $Response['error'] .= $error . "<br>";
}

$Data = new Project();
$Projects = $Data->getProjects();

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');


?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <div class="flex-container-title">
        <h2>Upload new image:</h2>
        <a href="media_library.php" class="go-back">Back to overview &#11152;</a>
      </div>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $uploadValidation->maxFileSize ?>">
        <div class="input-container">
          <label for="image">Upload image:<br><i class="fa-solid fa-circle-exclamation"></i>
            Make sure, that if you upload a landing page image you include "home" in the filename!</label>
          <input type="file" accept="image/*" name="image" id="image">
          <!-- for testing -->
          <!-- <input type="file" name="image" id="image"> -->
          <?php if (isset($Response['image']) && !empty($Response['image'])) : ?>
            <span class="error-span"><?= $Response['image']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="alt-text">Enter alternative text:</label>
          <input name="alt-text" type="text" id="alt-text" value="<?= (isset($_POST['alt-text'])) ? $_POST['alt-text'] : '' ?>">
          <?php if (isset($Response['altText']) && !empty($Response['altText'])) : ?>
            <span class="error-span"><?= $Response['altText']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="project-id" aria-label="project-id">Choose the corresponding project:</label>
          <select class="projects" name="projects" id="project-id">
            <option value="">Choose project</option>
            <?php foreach ($Projects['data'] as $value) : ?>
              <option value="<?= $value['ID']; ?>" <?= (isset($_POST['projects']) && $_POST['projects'] == $value['ID']) ? " selected" : ""; ?>>
                <?= $value['project_title']; ?>
              </option>
            <?php endforeach; ?>
          </select>
          <?php if (isset($Response['projectID']) && !empty($Response['projectID'])) : ?>
            <span class="error-span"><?= $Response['projectID']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="upload" class="upload-btn">Upload</button>
        <?php if (isset($Response['status']) && !$Response['status']) :  ?>
          <span class="error-span"><?= $Response['status'] ?></span>
        <?php endif; ?>
      </form>
    </section>
  </main>
</body>

</html>