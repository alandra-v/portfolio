<?php
require_once(dirname(__DIR__) . '/Controller/User.php');
$Data = new User();
$Response = [];
$User = $Data->getUsers();
if (isset($_GET['delete'])) $Data->deleteUser($_GET['delete']);

require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');


?>

<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <ul class="user-list">
      <a href="user_registration" class="add-new">
        <i class="fa-solid fa-plus"></i>
        <span>Register a new user</span>
      </a>
      <?php if (isset($_GET['userStatus']) && $_GET['userStatus'] == 'registered') : ?>
        <div class="confirmation">
          <p><?= 'Thank you for your registration.' ?></p>
          <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
        </div>
      <?php elseif (isset($_GET['userStatus']) && $_GET['userStatus'] == 'updated') : ?>
        <div class="confirmation">
          <p><?= 'Your account information has been updated.' ?></p>
          <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
        </div>
      <?php elseif (isset($_GET['userStatus']) && $_GET['userStatus'] == 'deleted') : ?>
        <div class="confirmation">
          <p><?= 'Account has successfully been deleted.' ?></p>
          <button class="close-confirmation"><i class="fa-solid fa-xmark"></i></button>
        </div>
      <?php endif; ?>
      <?php foreach ($User['data'] as $user) : ?>
        <li>
          <div class="container">
            <div class="user">
              <div class="name">
                <p><?= $user['user_name'] ?></p>
                <p><?= $user['user_given_name'] . ' ' . $user['user_family_name'] ?></p>
              </div>
              <div class="flex-container-operations-desktop">
                <?php if ($_SESSION['data']['ID'] == $user['ID'] || $_SESSION['data']['user_group'] == 0) : ?>
                  <!-- Edit btn -->
                  <a href="account_settings?id=<?= $user['ID'] ?>">
                    <i class="fa-solid fa-pencil" aria-label="edit"></i>
                  </a>
                  <!-- Delete btn -->
                  <a href="?delete=<?= $user['ID']; ?>" class="delete-btn" data-confirm="<?= $user['user_name'] ?>">
                    <i class="fa-solid fa-trash" aria-label="delete"></i>
                  </a>
                <?php endif; ?>
                <button class="drop-down"><i class="fa-solid fa-chevron-down"></i></button>
              </div>
              <button class="drop-down mobile-drop-down"><i class="fa-solid fa-chevron-down"></i></button>
            </div>
            <div class="user-information hidden">
              <div class="flex-container">
                <p class="label">Title:</p>
                <p><?= $user['user_title'] ?></p>
              </div>
              <div class="flex-container">
                <p class="label">Gender: </p>
                <p><?= $user['user_gender'] ?></p>
              </div>
              <div class="flex-container">
                <i class="fa-solid fa-envelope label"></i>
                <p><?= $user['user_email'] ?></p>
              </div>
              <div class="flex-container">
                <p class="label">User group:</p>
                <p><?= $user['user_group'] ?></p>
              </div>
              <div class="flex-container">
                <p class="label">Created on:</p>
                <p class="date"><?= date("d.M.Y", strtotime($user['created'])); ?> at <?= date("H:m:s", strtotime($user['created'])); ?></p>
              </div>
            </div>
          </div>
          <?php if ($_SESSION['data']['ID'] == $user['ID'] || $_SESSION['data']['user_group'] == 0) : ?>
            <div class="flex-container-operations-mobile">
              <!-- Edit btn -->
              <a href="account_settings?id=<?= $user['ID'] ?>">
                <i class="fa-solid fa-pencil" aria-label="edit"></i>
              </a>
              <!-- Delete btn -->
              <a href="?delete=<?= $user['ID']; ?>" class="delete-btn" data-confirm="<?= $user['user_name'] ?>">
                <i class="fa-solid fa-trash" aria-label="delete"></i>
              </a>
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