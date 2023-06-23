<?php
require_once(dirname(__DIR__) . '/Controller/User.php');

require_once(dirname(__DIR__) . '/includes/admin_head_data.php');
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
require_once(dirname(__DIR__) . '/includes/cms/nav_data.php');


// require_once("../configuration.php");

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
// or session id?

if (isset($_POST['profile-info']) && count($_POST) > 0) {
  $Response = $Settings->editProfileInfo($_POST, $_GET['id']);
} else if (isset($_POST['update-password']) && count($_POST) > 0) {
  $Response = $Settings->editLoginInfo($_POST, $_GET['id']);
} else if (isset($_POST['login-info']) && count($_POST) > 0) {
  $Response = $Settings->editLoginInfo($_POST, $_GET['id']);
}

if (isset($_GET['remove'])) $Settings->deleteAccount($_GET['remove']);

?>


<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <div class="section-container">
      <section class="profile-info">
        <h2>Profile Information <?= ucfirst($User['data']['user_name']); ?></h2>
        <hr class="title-separator">
        <form action="" method="POST" class="profile-info">
          <div class="user-title-container">
            <label for="user-title" aria-label="title">Title</label>
            <select name="titles" id="user-title">
              <?php
              // output <option>s w/ value
              foreach ($titles as $key => $value) {
                echo "<option value=\"" . $key . "\"";
                if (isset($User['data']['user_title']) && $User['data']['user_title'] == $key) {
                  echo " selected";
                }
                echo ">" . $value . "</option>";
              }
              ?>
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
                if (isset($User['data']['user_gender']) && $User['data']['user_gender'] == $key) {
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
            <input type="text" id="given-name" name="given-name" value="<?= $User['data']['user_given_name']; ?>">
          </div>
          <div class="input-container">
            <label for="family-name">Last name</label>
            <input type="text" id="family-name" name="family-name" value="<?= $User['data']['user_family_name']; ?>">
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
        <section class="update-password">
          <h2>Update <?= ucfirst($User['data']['user_name']); ?>'s Password</h2>
          <hr class="title-separator">
          <form action="" method="POST" class="edit-password">
            <div class="form-flex-container">
              <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
              </div>
              <div class="input-container">
                <label for="password-confirmation">Confirm password</label>
                <input type="password" id="password-confirmation" name="password-confirmation">
              </div>
            </div>
            <button class="save-changes" type="submit" name="update-password">Update Password</button>
          </form>
        </section>
      </div>
      <section class="login-info">
        <h2>Login Information <?= ucfirst($User['data']['user_name']); ?></h2>
        <hr class="title-separator">
        <form action="" method="POST" class="credentials">
          <div class="input-container">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= $User['data']['user_name'];
                                                                    ?>">
          </div>
          <div class="form-flex-container">
            <div class="input-container">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" value="<?= $User['data']['user_email'];
                                                                  ?>">
            </div>
            <div class="input-container">
              <label for="email-confirmation">Confirm e-mail</label>
              <input type="email" id="email-confirmation" name="email-confirmation">
            </div>
          </div>
          <button class="save-changes" type="submit" name="login-info">Save all changes</button>
        </form>
      </section>
      <section class="delete-acc">
        <h2>Close your account</h2>
        <hr class="title-separator">
        <div class="flex-container">
          <p>All data associated with this account will be irrevocably deleted.</p>
          <a href="?remove=<?= $User['data']['ID']; ?>" class="delete-acc-btn" data-confirm="<?= $User['data']['user_name'] ?>">Close Account</a>
        </div>
        <!-- <div class="delete-warning">
          <p>Are you sure you want to delete your account?</p>
          <p>All data associated with this account will be irrevocably deleted.</p>
          <div class="flex-container">
            <button class="dont-delete">Go back</button>
            <button class="delete">Delete account</button>
          </div>
        </div> -->
    </div>
    </section>

  </main>

</body>

</html>