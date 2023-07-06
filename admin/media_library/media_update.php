<?php
require_once(dirname(__DIR__) . '/Controller/Media.php');
require_once(dirname(__DIR__) . '/Controller/Project.php');
$Data = new Media();
$Response = [];
$Image = $Data->getImage($_GET['id']);

if (isset($_POST) && count($_POST) > 0) $Response = $Data->editImage($_POST, $_GET['id'], $_FILES);

$DataProjects = new Project();
$Projects = $DataProjects->getProjects();

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');

// echo '<pre>';
// print_r($Projects['data']);
// echo '</pre>';
?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section>
      <div class="flex-container-title">
        <h2>Edit image:</h2>
        <a href="media_library.php" class="go-back">Back to overview &#11152;</a>
      </div>
      <hr class="title-separator">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="thumbnail">
          <img class="img-thumbnail" src="<?= BASE_URL . '/assets/images/uploads/' . $Image['data']['img'] ?>" alt="<?= $Image['data']['img_alt_text'] ?>">
        </div>
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="<?= $uploadValidation->maxFileSize ?>"> -->
        <input type="text" name="original" class="visually-hidden" value="<?= $Image['data']['img'] ?>">
        <div class="input-container">
          <label for="image">Upload image:</label>
          <input type="file" accept="image/jpg, image/jpeg, image/png, image/svg" name="image" id="image">
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
          <input name="alt-text" type="text" id="alt-text" value="<?= (isset($_POST['alt-text'])) ? $_POST['alt-text'] : $Image['data']['img_alt_text'] ?>">
          <?php if (isset($Response['altText']) && !empty($Response['altText'])) : ?>
            <span class="error-span"><?= $Response['altText']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-container">
          <label for="project-id" aria-label="project-id">Choose the corresponding project:</label>
          <select class="projects" name="projects" id="project-id">
            <option value="">Choose project</option>
            <?php
            foreach ($Projects['data'] as $value) {
              echo "<option value=\"" . $value['ID'] . "\"";
              if (isset($_POST['projects']) && $_POST['projects'] == $value['ID']) {
                echo " selected";
              } else if (isset($Image['data']['img_project_id']) && $Image['data']['img_project_id'] == $value['ID']) {
                echo " selected";
              }
              echo ">" . $value['project_title'] . "</option>";
            }
            ?>
          </select>
          <?php if (isset($Response['projectID']) && !empty($Response['projectID'])) : ?>
            <span class="error-span"><?= $Response['projectID']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" name="edit" class="edit-btn">Save changes</button>
        <?php if (isset($Response['status']) && !$Response['status']) :  ?>
          <span class="error-span"><?= $Response['status'] ?></span>
        <?php endif; ?>
      </form>
    </section>
</body>
</main>

</body>

</html>