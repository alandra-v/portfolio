<?php
require_once(dirname(__DIR__) . '/Controller/Media.php');
// require_once(dirname(dirname(__DIR__)) . '/configuration.php');
$uploadValidation = new Media();
$Response = [];

if (isset($_POST) && count($_POST) > 0 && isset($_FILES)) {
  $Response = $uploadValidation->uploadImage($_POST, $_FILES);
}

foreach ($uploadValidation->errorsArr as $error) {
  $Response['error'] .= $error . "<br>";
}

require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <h2>Upload new image</h2>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $uploadValidation->maxFileSize ?>">
        <div class="input-container">
          <label for="image">Upload image:</label>
          <input type="file" accept="image/*" name="image" id="image" value="<?= (isset($_FILES['image'])) ? $_FILES['image'] : '' ?>">
          <!-- for testing -->
          <!-- <input type="file" name="image" id="image"> -->
          <?php if (isset($Response['error']) && !empty($Response['error'])) : ?>
            <span class="error-span"><?= $Response['error']; ?></span>
          <?php elseif (isset($Response['image']) && !empty($Response['image'])) : ?>
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
          <label for="project-id">Enter project id:</label>
          <input name="project-id" type="number" id="project-id" value="<?= (isset($_POST['project-id'])) ? $_POST['project-id'] : '' ?>">
          <?php if (isset($Response['projectID']) && !empty($Response['projectID'])) : ?>
            <span class="error-span"><?= $Response['projectID']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="upload" class="upload-btn">Upload</button>
        <?php //if (isset($Response['status'])) : 
        ?>
        <span class="error-span"><? ?></span>
        <? //endif; 
        ?>
      </form>
    </section>
</body>
</main>

</body>

</html>