<?php
require_once(dirname(__DIR__) . '/Controller/Contact.php');
$Data = new Contact();
$Response = [];
$Contact = $Data->getContacts();
if (isset($_GET['delete'])) $Data->deleteContact($_GET['delete']);

require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <ul class="user-list">
      <?php foreach ($Contact['data'] as $contact) : ?>
        <li>
          <div class="container">
            <div class="user">
              <p><?= $contact['contact_given_name'] . ' ' . $contact['contact_family_name'] ?></p>
              <div class="flex-container-operations-desktop">
                <?php if ($_SESSION['data']['user_group'] == 0) : ?>
                  <!-- Edit btn -->
                  <a href="contacts_update?id= <?= $contact['ID'] ?>">
                    <i class="fa-solid fa-pencil" aria-label="edit"></i>
                  </a>
                  <!-- Delete btn -->
                  <button type="submit" name="delete" data-confirm="<?= $contact['ID'] ?>" value="<?= $contact['ID'] ?>">
                    <i class="fa-solid fa-trash" aria-label="delete"></i>
                  </button>
                <?php endif; ?>
                <button class="drop-down"><i class="fa-solid fa-chevron-down"></i></button>
              </div>
              <button class="drop-down mobile-drop-down"><i class="fa-solid fa-chevron-down"></i></button>
            </div>
            <div class="user-information hidden">
              <div class="flex-container">
                <p class="label">Title:</p>
                <p><?= $contact['contact_title'] ?></p>
              </div>
              <div class="flex-container">
                <p class="label">Address:</p>
                <div class="address">
                  <p><?= $contact['contact_address'] ?></p>
                  <p><?= $contact['contact_zip'] ?></p>
                  <p><?= $contact['contact_town'] ?></p>
                </div>
              </div>
              <div class="flex-container">
                <i class="fa-solid fa-phone label"></i>
                <p><?= $contact['contact_tel'] ?></p>
              </div>
              <div class="flex-container">
                <i class="fa-solid fa-envelope label"></i>
                <p><?= $contact['contact_email'] ?></p>
              </div>
              <div class="flex-container">
                <p class="label">Created at:</p>
                <p class="date"><?= date("d.M.Y", strtotime($contact['created'])); ?> at <?= date("H:m:s", strtotime($contact['created'])); ?></p>
              </div>
            </div>
            <?php if ($_SESSION['data']['user_group'] == 0) : ?>
              <div class="flex-container-operations-mobile">
                <!-- Edit btn -->
                <a href="contacts_update.php?id= <?= $contact['ID'] ?>">
                  <i class="fa-solid fa-pencil" aria-label="edit"></i>
                </a>
                <!-- Delete btn -->
                <button type="submit" name="delete" data-confirm="<?= $contact['ID'] ?>" value="<?= $contact['ID'] ?>">
                  <i class="fa-solid fa-trash" aria-label="delete"></i>
                </button>
              </div>
            <?php endif; ?>
          </div>
        </li>
        <hr class="parting-line">
      <?php endforeach; ?>
    </ul>
  </main>

</body>

</html>