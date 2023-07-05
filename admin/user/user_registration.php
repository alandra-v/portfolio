<?php
require_once(dirname(__DIR__) . '/Controller/Register.php');

$defaultGenderValue = 'woman';

$Register = new Register();
$Response = [];
$titles = $Register->titleArray;
$genders = $Register->genderArray;


if (isset($_POST) && count($_POST) > 0) {
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
  $Response = $Register->register($_POST);
}
require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');
?>

<body>
  <header>
    <a href="../index" class="avd-logo" aria-label="Home"><img src="../../assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  </header>
  <main>
    <div class="registration-container">
      <div class="user-polygon-container">
        <picture>
          <source media="(min-width: 760px)" srcset="../../assets/illustrations/user.webp 1200w,
                        ../../assets/illustrations/user.png 1200w">
          <source srcset="../../assets/illustrations/user_small.webp 600w,
                        ../../assets/illustrations/user_small.png 600w">
          <img src="../../assets/illustrations/user.png" width="500" height="491" class="user-polygon" alt="upper body outline polygon">
        </picture>
      </div>
      <div class="registration">
        <h1>Create Account</h1>
        <div class="switch-to-login">
          <p>Changed your mind? <a href="user_read">Go Back</a></p>
        </div>
        <div class="third-party-registration">
          <!-- NOTE -->
          <!-- third party registrations will be implemented at a later stage -->
          <a href="#" class="third-party">
            <img class="third-party-icon" src="../../assets/icons/google_icon.svg" width="48" height="48" alt="">
            <p>Continue with Google</p>
          </a>
          <a href="#" class="third-party">
            <img class="third-party-icon" src="../../assets/icons/facebook_icon.svg" width="48" height="48" alt="">
            <p>Continue with Facebook</p>
          </a>
        </div>
        <div class="separator">
          <hr class="separator">
          <p>OR</p>
          <hr class="separator">
        </div>
        <form action="" autocomplete="on" method="POST" id="registration-form" novalidate>
          <div class="user-title-container">
            <label for="user-title" aria-label="title">*Title</label>
            <select name="titles" id="user-title">
              <?php
              // output <option>s w/ value
              foreach ($titles as $key => $value) {
                echo "<option value=\"" . $key . "\"";
                if (isset($_POST['titles']) && $_POST['titles'] == "$key") {
                  echo " selected";
                }
                echo ">" . $value . "</option>";
              }
              ?>
            </select>
          </div>
          <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
            <span class="error-span"><?= $Response['title']; ?></span>
          <?php endif; ?>
          <fieldset class="gender-radio-inputs">
            <legend id="radio-legend">Please select your gender:</legend>
            <div class="radio-input-options">

              <?php
              // output radio button <input>s with <label>
              foreach ($genders as $key => $value) {
                echo "<label for=\"" . $key . "\"" . ">";
                echo "<input type=\"radio\"";
                echo " value=\"" . $key . "\"";
                echo " name=\"gender\"";
                echo " id=\"" . $key . "\"";
                if (isset($_POST['gender']) && $_POST['gender'] == $key || $defaultGenderValue == $key) {
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
          <div class="flex-container">
            <div class="input-container given-name-container">
              <input type="text" id="given-name" name="given-name" aria-label="given-name" placeholder="*First name" value="<?= (isset($_POST['given-name'])) ? $_POST['given-name'] : '' ?>" required>
              <label for="given-name" class="placeholder">*First name</label>
              <?php if (isset($Response['givenName']) && !empty($Response['givenName'])) : ?>
                <span class="error-span"><?= $Response['givenName']; ?></span>
              <?php endif; ?>
            </div>
            <div class="input-container family-name-container">
              <input type="text" id="family-name" name="family-name" aria-label="family-name" placeholder="*Last name" value="<?= (isset($_POST['family-name'])) ? $_POST['family-name'] : ''  ?>" required>
              <label for="family-name" class="placeholder">*Last name</label>
              <?php if (isset($Response['familyName']) && !empty($Response['familyName'])) : ?>
                <span class="error-span"><?= $Response['familyName']; ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="input-container username-container">
            <input type="text" id="username" name="username" aria-label="username" placeholder="*Username (please use 4-16 characters)" value="<?= (isset($_POST['username'])) ? $_POST['username'] : ''  ?>" autocomplete="off" required>
            <label for="username" class="placeholder">*Username</label>
            <?php if (isset($Response['username']) && !empty($Response['username'])) : ?>
              <span class="error-span"><?= $Response['username']; ?></span>
            <?php endif; ?>
          </div>
          <div class="flex-container">
            <div class="input-container email-container">
              <input type="email" id="email" name="email" aria-label="email" placeholder="*E-mail" value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''  ?>" required>
              <label for="email" class="placeholder">*E-mail</label>
              <?php if (isset($Response['email']) && !empty($Response['email'])) : ?>
                <span class="error-span"><?= $Response['email']; ?></span>
              <?php endif; ?>
            </div>
            <div class="input-container email-confirmation-container">
              <input type="email" id="email-confirmation" name="email-confirmation" aria-label="email confirmation" placeholder="*Confirm e-mail" value="<?= (isset($_POST['email-confirmation'])) ? $_POST['email-confirmation'] : ''  ?>" required>
              <label for="email-confirmation" class="placeholder">*Confirm e-mail</label>
              <?php if (isset($Response['emailConfirmation']) && !empty($Response['emailConfirmation'])) : ?>
                <span class="error-span"><?= $Response['emailConfirmation']; ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="flex-container">
            <div class="input-container password-container">
              <input type="password" id="password" name="password" aria-label="password" placeholder="*Password" value="<?= (isset($_POST['password'])) ? $_POST['password'] : ''  ?>" autocomplete="off" required>
              <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
              <label for="password" class="placeholder">*Password</label>
              <?php if (isset($Response['password']) && !empty($Response['password'])) : ?>
                <span class="error-span"><?= $Response['password']; ?></span>
              <?php endif; ?>
            </div>
            <div class="input-container password-confirmation-container">
              <input type="password" id="password-confirmation" name="password-confirmation" aria-label="password confirmation" placeholder="*Confirm password" value="<?= (isset($_POST['password-confirmation'])) ? $_POST['password-confirmation'] : ''  ?>" autocomplete="off" required>
              <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
              <label for="password-confirmation" class="placeholder">*Confirm password</label>
              <?php if (isset($Response['passwordConfirmation']) && !empty($Response['passwordConfirmation'])) : ?>
                <span class="error-span"><?= $Response['passwordConfirmation']; ?></span>
              <?php endif; ?>
            </div>
          </div>



          <div class="terms-and-conditions-container">
            <input type="checkbox" id="terms" name="terms" aria-label="Accept the terms and conditions" value="agree" <?= (isset($_POST['terms']) && $_POST['terms'] == "agree") ? "checked" : '' ?> required>
            <label for="terms" class="terms-after">I have read and agree to the<a href="#">Terms & Conditions</a>.</label>
          </div>

          <?php if (isset($Response['terms']) && !empty($Response['terms'])) : ?>
            <span class="error-span"><?= $Response['terms']; ?></span>
          <?php endif; ?>




          <button type="submit" value="register" name="register" class="form-submit">Create Account</button>
          <?php if (isset($Response['error'])) : ?>
            <div class="alert">
              <p><?= '❗️ Please fill out all required fields correctly' ?></p>
            </div>
          <?php endif; ?>
          <?php if (isset($Response['status'])) : ?>
            <div class="alert">
              <p><?= 'Sorry, An unexpected error occurred and your request could not be completed.' ?></p>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </main>

  <footer>
    <div class="footer-left">
      <button class="language-switch-footer" aria-label="Change the language to german">EN &#10072; DE</button>
    </div>
    <div class="footer-right">
      <div class="legals">
        <a href="#" class="footer-element"><small>Terms & Conditions</small></a>
        <p class="delimiter">&#10072;</p>
        <a href="#" class="footer-element"><small>Privacy policy</small></a>
      </div>
      <a href="mailto:alandra.villalaz@gmail.com" class="footer-element" aria-label="Send us an email"><small>Contact</small></a>
    </div>
  </footer>
</body>

</html>