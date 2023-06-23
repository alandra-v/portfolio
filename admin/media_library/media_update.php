<?php
require_once(dirname(__DIR__) . '/Controller/Media.php');
$Data = new Media();
$Response = [];
$Image = $Data->getImage($_GET['id']);
if (isset($_POST) && count($_POST) > 0) $Response = $Data->editImage($_POST, $_GET['id'], $_FILES);

require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');



?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <h2>Edit image</h2>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $uploadValidation->maxFileSize ?>">
        <input type="text" name="original" class="visually-hidden" value="<?= $Image['data']['img']; ?>">
        <div class="input-container">
          <label for="image">Upload image:</label>
          <input type="file" accept="image/*" name="image" id="image">
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
          <input name="alt-text" type="text" id="alt-text" value="<?= $Image['data']['img_alt_text'] ?>">
          <?php if (isset($Response['altText']) && !empty($Response['altText'])) : ?>
            <span class="error-span"><?= $Response['altText']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="project-id">Enter project id:</label>
          <input name="project-id" type="number" id="project-id" value="<?= $Image['data']['img_project_id'] ?>">
          <?php if (isset($Response['projectID']) && !empty($Response['projectID'])) : ?>
            <span class="error-span"><?= $Response['projectID']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="edit" class="edit-btn">Save changes</button>
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