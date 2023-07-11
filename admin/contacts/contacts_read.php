<?php
require_once(dirname(__DIR__) . '/Controller/Contact.php');
$Data = new Contact();
$Response = [];
$Contacts = $Data->getContacts();
if (isset($_GET['delete'])) $Data->deleteContact($_GET['delete']);
// echo '<pre>';
// print_r($Contacts['data']);
// echo '</pre>';
// return;
// require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
// require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');

?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <!-- @TODO -->
    <!-- install search function -->
    <?php if (isset($_GET['contactStatus']) && $_GET['contactStatus'] == 'deleted') : ?>
      <div class="confirmation">
        <p><?= 'Contact has successfully been deleted.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php elseif (isset($_GET['contactStatus']) && $_GET['contactStatus'] == 'updated') : ?>
      <div class="confirmation">
        <p><?= 'Contact has successfully been updated.' ?></p>
        <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
      </div>
    <?php endif; ?>
    <?php include(dirname(__DIR__) . '/includes/cms/confirmation.php'); ?>
    <?php if (!$Contacts['data']) : ?>
      <div class="confirmation">
        <p><?= 'No contacts have been saved yet.' ?></p>
      </div>
    <?php endif; ?>
    <ul class="user-list">
      <?php foreach ($Contacts['data'] as $contact) : ?>
        <li>
          <div class="container">
            <div class="user">
              <div class="name">
                <p><?= $contact['contact_given_name'] . ' ' . $contact['contact_family_name'] ?></p>
                <p><?= $contact['contact_business'] ?? '' ?></p>
              </div>
              <div class="flex-container-operations-desktop">

                <!-- Edit btn -->
                <a href="contact_update?id=<?= $contact['ID'] ?>" class="update-btn">
                  <i class="fa-solid fa-pencil" aria-label="edit"></i>
                </a>
                <!-- Delete btn -->
                <button class="delete-btn" onclick="
                  showModal('Are you sure you want to delete <?= $contact['contact_given_name'] ?>\'s contact? All data associated with this contact will be irreversibly deleted!',
                  '?delete=<?= $contact['ID'] ?>' )">
                  <i class="fa-solid fa-trash" aria-label="delete"></i>
                </button>
                <button class="drop-down"><i class="fa-solid fa-chevron-down"></i></button>
              </div>
              <button class="drop-down mobile-drop-down"><i class="fa-solid fa-chevron-down"></i></button>
            </div>
            <div class="information hidden">
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

            <div class="flex-container-operations-mobile">
              <!-- Edit btn -->
              <a href="contact_update.php?id=<?= $contact['ID'] ?>">
                <i class="fa-solid fa-pencil" aria-label="edit"></i>
              </a>
              <!-- Delete btn -->
              <button class="delete-btn" onclick="
                  showModal('Are you sure you want to delete <?= $contact['contact_given_name'] ?>\'s contact? All data associated with this contact will be irreversibly deleted!',
                  '?delete=<?= $contact['ID'] ?>' )">
                <i class="fa-solid fa-trash" aria-label="delete"></i>
              </button>
            </div>

          </div>
          <hr class="parting-line">
        </li>
      <?php endforeach; ?>
    </ul>
  </main>

</body>

</html>