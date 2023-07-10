<?php
require_once(dirname(__DIR__) . '/Controller/Media.php');
$Data = new Media();
$Response = [];
$Images = $Data->getImages();
if (isset($_GET['delete'])) $Data->deleteImage($_GET['delete']);

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <!-- @TODO -->
    <!-- filter images by project -->
    <a href="media_upload" class="add-new">
      <i class="fa-solid fa-plus"></i>
      <span>Upload a new image</span>
    </a>
    <?php if (isset($_GET['created'])) : ?>
      <div class="confirmation">
        <p><?= 'Your media upload was successful.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (isset($_GET['updated'])) : ?>
      <div class="confirmation">
        <p><?= 'Your media has successfully been updated.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (isset($_GET['deleted'])) : ?>
      <div class="confirmation">
        <p><?= 'Your media has successfully been deleted.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (!$Images['data']) : ?>
      <div class="confirmation">
        <p><?= 'No media has been uploaded yet.' ?></p>
      </div>
    <?php endif; ?>
    <?php include(dirname(__DIR__) . '/includes/cms/confirmation.php'); ?>
    <ul class="media">
      <?php foreach ($Images['data'] as $image) : ?>
        <li>
          <div class="container">
            <div class="img-container"><img src="<?= BASE_URL . '/assets/images/uploads/' . $image['img'] ?>" alt="<?= $image['img_alt_text'] ?>" class="thumbnail"></div>
            <div class="flex-container">
              <p class="label">ID: <?= $image['ID'] ?></p>
              <p class="label">Project ID: <?= $image['img_project_id'] ?></p>
            </div>
            <div>
              <p class="label">Alternative text: </p>
              <p><?= $image['img_alt_text'] ?></p>
            </div>
            <div>
              <p class="label">Uploaded on:</p>
              <p class="date"><?= date("d.M.Y", strtotime($image['created'])); ?> at <?= date("H:m:s", strtotime($image['created'])); ?></p>
            </div>
            <div>
              <p class="label">Small WEBP:</p>
              <p class="img-path"><?= $image['img_small_webp'] ?></p>
            </div>
            <div>
              <p class="label">Small IMG:</p>
              <p class="img-path"><?= $image['img_small'] ?></p>
            </div>
            <div>
              <p class="label">WEBP:</p>
              <p class="img-path"><?= $image['img_webp'] ?></p>
            </div>
            <div>
              <p class="label">IMG:</p>
              <p class="img-path"><?= $image['img'] ?></p>
            </div>

            <div class="flex-container-operations">
              <!-- Edit btn -->
              <a href="media_update?id=<?= $image['ID'] ?>" class="update-btn">
                <i class="fa-solid fa-pencil" aria-label="edit"></i>
              </a>
              <!-- Delete btn -->
              <button class="delete-btn" onclick="
                  showModal('Are you sure you want to delete the image <?= $image['img'] ?>? The image will be irreversibly deleted!',
                  '?delete=<?= $image['ID'] ?>' )">
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