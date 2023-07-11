<?php
require_once(dirname(__DIR__) . '/Controller/User.php');


$Settings = new User();
$Response = [];

// get parameter?
$defaultGenderValue = 'woman';
$titles = $Settings->titleArray;
$genders = $Settings->genderArray;

if (isset($_GET['id'])) {
  $User = $Settings->getUser($_GET['id']);
} else {
  $User = $Settings->getUser($_SESSION['data']['ID']);
}


if (isset($_POST['profile-info']) && count($_POST) > 0) {
  if (isset($_GET['id'])) {
    $Response = $Settings->editProfileInfo($_POST, $_GET['id']);
  } else {
    $Response = $Settings->editProfileInfo($_POST, $_SESSION['data']['ID']);
  }
} else if (isset($_POST['update-password']) && count($_POST) > 0) {
  if (isset($_GET['id'])) {
    $Response = $Settings->editPassword($_POST, $_GET['id']);
  } else {
    $Response = $Settings->editPassword($_POST, $_SESSION['data']['ID']);
  }
} else if (isset($_POST['login-info']) && count($_POST) > 0) {
  if (isset($_GET['id'])) {
    $Response = $Settings->editLoginInfo($_POST, $_GET['id']);
  } else {
    $Response = $Settings->editLoginInfo($_POST, $_SESSION['data']['ID']);
  }
} else if (isset($_GET['deleteUser'])) {
  $foundUser = $Settings->getUser($_GET['deleteUser']);
  if ($foundUser) {
    $Settings->deleteUser($foundUser['data']);
  }
}

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
?>


<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <?php include(dirname(__DIR__) . '/includes/cms/confirmation.php'); ?>
    <div class="section-container">
      <section class="profile-info">
        <h2>Profile Information <?= $User['data']['user_name']; ?></h2>
        <hr class="title-separator">
        <form action="" method="POST" class="profile-info" novalidate>
          <div class="user-title-container">
            <label for="user-title" aria-label="title">Title</label>
            <select name="titles" id="user-title">
              <?php
              // output <option>s w/ value
              foreach ($titles as $key => $value) {
                echo "<option value=\"" . $key . "\"";
                if (isset($_POST['titles']) && $_POST['titles'] == $key) {
                  echo " selected";
                } else if (isset($User['data']['user_title']) && $User['data']['user_title'] == $key) {
                  echo " selected";
                }
                echo ">" . $value . "</option>";
              }
              ?>
              <?php if (isset($Response['titles']) && !empty($Response['titles'])) : ?>
                <span class="error-span"><?= $Response['titles']; ?></span>
              <?php endif; ?>
            </select>
          </div>
          <fieldset class="gender-radio-inputs">
            <legend id="radio-legend">Gender:</legend>
            <div class="radio-input-options">

              <?php
              // output radio button <input>s with <label>
              foreach ($genders as $key => $value) {
                echo "<label for=\"" . $key . "\"" . ">";
                echo "<input type=\"radio\"";
                echo " value=\"" . $key . "\"";
                echo " name=\"gender\"";
                echo " id=\"" . $key . "\"";
                if (isset($_POST['gender']) && $_POST['gender'] == $key) {
                  echo "checked";
                } else if (isset($User['data']['user_gender']) && $User['data']['user_gender'] == $key) {
                  echo "checked";
                }
                echo ">\n";
                echo $value;
                echo "</label>";
                echo "<br>\n\n";
              }
              ?>
              <?php if (isset($Response['gender']) && !empty($Response['gender'])) : ?>
                <span class="error-span"><?= $Response['gender']; ?></span>
              <?php endif; ?>
            </div>
          </fieldset>
          <div class="input-container">
            <label for="given-name">First name</label>
            <input type="text" id="given-name" name="given-name" value="<?= (isset($_POST['given-name'])) ? $_POST['given-name'] : $User['data']['user_given_name'] ?>">
            <?php if (isset($Response['given-name']) && !empty($Response['given-name'])) : ?>
              <span class="error-span"><?= $Response['given-name']; ?></span>
            <?php endif; ?>
          </div>
          <div class="input-container">
            <label for="family-name">Last name</label>
            <input type="text" id="family-name" name="family-name" value="<?= (isset($_POST['family-name'])) ? $_POST['family-name'] : $User['data']['user_family_name'] ?>">
            <?php if (isset($Response['family-name']) && !empty($Response['family-name'])) : ?>
              <span class="error-span"><?= $Response['family-name']; ?></span>
            <?php endif; ?>
          </div>
          <button class="save-changes" type="submit" name="profile-info">Save all changes</button>
        </form>
      </section>
      <div class="section">
        <section class="acc-security">
          <h2>Account security</h2>
          <hr class="title-separator">
          <div class="acc-sec-grid">
            <!-- NOTE -->
            <!-- email authentication will be implemented at a later stage -->
            <i class="fa-solid fa-circle-exclamation first" aria-label="status is not verified"></i>
            <!-- <i class="fa-solid fa-check" aria-label="status is verified"></i> -->
            <h3 class="email">Email verification</h3>
            <button class="email-verification">Change</button>
            <!-- NOTE -->
            <!-- 2-step authentication will be implemented at a later stage -->
            <i class="fa-solid fa-circle-exclamation second" aria-label="status is not enabled"></i>
            <!-- <i class="fa-solid fa-check" aria-label="status is enabled"></i> -->
            <h3 class="two-step">2-step verification</h3>
            <button class="two-step-verification">Enable</button>
          </div>
        </section>
        <?php if ($_SESSION['data']['ID'] == $User['data']['ID']) : ?>
          <section class="update-password">
            <h2>Update <?= $User['data']['user_name']; ?>'s Password</h2>
            <hr class="title-separator">
            <form action="" method="POST" class="edit-password" novalidate>
              <div class="form-flex-container">
                <div class="input-container">
                  <label for="password-original">Enter your current password</label>
                  <input type="password" id="password-original" name="password-original" value="<?= (isset($_POST['password-original'])) ? $_POST['password-original'] : '' ?>">
                  <?php if (isset($Response['password-original']) && !empty($Response['password-original'])) : ?>
                    <span class="error-span"><?= $Response['password-original']; ?></span>
                  <?php endif; ?>
                </div>
                <div class="input-container">
                  <label for="password-new">New password</label>
                  <input type="password" id="password-new" name="password-new" value="<?= (isset($_POST['password-new'])) ? $_POST['password-new'] : '' ?>">
                  <?php if (isset($Response['password-new']) && !empty($Response['password-new'])) : ?>
                    <span class="error-span"><?= $Response['password-new']; ?></span>
                  <?php endif; ?>
                </div>
                <div class="input-container">
                  <label for="password-confirmation">Confirm new password</label>
                  <input type="password" id="password-confirmation" name="password-confirmation" value="<?= (isset($_POST['password-confirmation'])) ? $_POST['password-confirmation'] : '' ?>">
                  <?php if (isset($Response['password-confirmation']) && !empty($Response['password-confirmation'])) : ?>
                    <span class="error-span"><?= $Response['password-confirmation']; ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <button class="save-changes" type="submit" name="update-password">Update Password</button>
            </form>
          </section>
        <?php endif; ?>
      </div>
      <section class="login-info">
        <h2>Login Information <?= $User['data']['user_name']; ?></h2>
        <hr class="title-separator">
        <form action="" method="POST" class="credentials" novalidate>
          <div class="input-container">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= (isset($_POST['username'])) ? $_POST['username'] : $User['data']['user_name'] ?>">
            <!-- <input type="text" id="username" name="username" value="<?= $User['data']['user_name']; ?>"> -->
            <?php if (isset($Response['username']) && !empty($Response['username'])) : ?>
              <span class="error-span"><?= $Response['username']; ?></span>
            <?php endif; ?>
          </div>
          <div class="form-flex-container">
            <div class="input-container">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : $User['data']['user_email'] ?>">
              <!-- <input type="email" id="email" name="email" value="<?= $User['data']['user_given_name']; ?>"> -->
              <?php if (isset($Response['email']) && !empty($Response['email'])) : ?>
                <span class="error-span"><?= $Response['email']; ?></span>
              <?php endif; ?>
            </div>
            <div class="input-container">
              <label for="email-confirmation">Confirm new e-mail</label>
              <input type="email" id="email-confirmation" name="email-confirmation" value="<?= (isset($_POST['email-confirmation'])) ? $_POST['email-confirmation'] : '' ?>">
              <?php if (isset($Response['email-confirmation']) && !empty($Response['email-confirmation'])) : ?>
                <span class="error-span"><?= $Response['email-confirmation']; ?></span>
              <?php endif; ?>
            </div>
          </div>
          <button class="save-changes" type="submit" name="login-info">Save all changes</button>
        </form>
      </section>
      <?php if ($_SESSION['data']['ID'] == $User['data']['ID'] && $User['data']['user_group'] != 0) : ?>
        <section class="delete-acc">
          <h2>Close your account</h2>
          <hr class="title-separator">
          <div class="flex-container">
            <p>All data associated with this account will be irrevocably deleted.</p>
            <!-- Delete btn -->
            <button class="delete-btn" onclick="
                  showModal('Are you sure you want to delete <?= $User['data']['user_name'] ?>\'s user account? All data associated with this account will be irreversibly deleted!',
                  '?deleteUser=<?= $User['data']['ID'] ?>' )">Close Account</button>
          </div>
        </section>
      <?php endif; ?>

  </main>

</body>

</html>