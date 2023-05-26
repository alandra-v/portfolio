<?php require("includes/registration_and_login/registration_script.php");
?>
<!-- <?php //require("includes/registration_and_login/registration_script_test.php");
      ?> -->
<?php require_once("includes/admin_head_data.php"); ?>
<?php require_once("includes/admin_head.inc.php"); ?>


<body>
  <header>
    <a href="../index.php" class="avd-logo" aria-label="Home"><img src="../assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  </header>
  <main>
    <div class="registration-container">
      <div class="user-polygon-container">
        <picture>
          <source media="(min-width: 760px)" srcset="../assets/illustrations/user.webp 1200w,
                        ../assets/illustrations/user.png 1200w">
          <source srcset="../assets/illustrations/user_small.webp 600w,
                        ../assets/illustrations/user_small.png 600w">
          <img src="../assets/illustrations/user.png" width="500" height="491" class="user-polygon" alt="upper body outline polygon">
        </picture>
      </div>
      <div class="registration">
        <h1>Create Account</h1>
        <div class="switch-to-login">
          <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
        <div class="third-party-registration">
          <!-- NOTE -->
          <!-- third party registrations will be implemented at a later stage -->
          <a href="#" class="third-party">
            <img class="third-party-icon" src="../assets/icons/google_icon.svg" width="48" height="48" alt="">
            <p>Continue with Google</p>
          </a>
          <a href="#" class="third-party">
            <img class="third-party-icon" src="../assets/icons/facebook_icon.svg" width="48" height="48" alt="">
            <p>Continue with Facebook</p>
          </a>
        </div>
        <div class="separator">
          <hr class="separator">
          <p>OR</p>
          <hr class="separator">
        </div>
        <!-- <form action="includes/registration_and_login/registration_script.php" autocomplete="on" method="POST" id="registration-form" novalidate> -->
        <form action="" autocomplete="on" method="POST" id="registration-form" novalidate>
          <div class="user-title-container">
            <label for="user-title" aria-label="title">*Title</label>
            <select name="titles" id="user-title">
              <?php
              // output <option>s w/ value
              foreach ($titleArray as $key => $value) {
                echo "<option value=\"" . $key . "\"";
                if ($key == $title) {
                  echo " selected";
                }
                echo ">" . $value . "</option>";
              }
              ?>
            </select>
          </div>
          <?= isset($errorMessages['title']) ? '<span class="error-span">' . $errorMessages['title'] . '</span>' : ''; ?>
          <fieldset class="gender-radio-inputs">
            <legend id="radio-legend">Please select your gender:</legend>
            <div class="radio-input-options">
              <?php
              // output radio button <input>s with <label>
              foreach ($genderArray as $key => $value) {
                echo "<label for=\"" . $key . "\"" . ">";
                echo "<input type=\"radio\"";
                echo " value=\"" . $key . "\"";
                echo " name=\"gender\"";
                echo " id=\"" . $key . "\"";
                if ($key == $gender) {
                  echo "checked";
                }
                echo ">\n";
                echo $value;
                echo "</label>";
                echo "<br>\n\n";
              }
              ?>
              <?= isset($errorMessages['gender']) ? '<span class="error-span">' . $errorMessages['gender'] . '</span>' : ''; ?>
            </div>
          </fieldset>
          <div class="flex-container">
            <div class="input-container given-name-container">
              <input type="text" id="given-name" name="given-name" aria-label="given-name" placeholder="*First name" value="<?= $givenName ?>" required>
              <label for="given-name" class="placeholder">*First name</label>
              <?= isset($errorMessages['givenName']) ? '<span class="error-span">' . $errorMessages['givenName'] . '</span>' : ''; ?>
            </div>
            <div class="input-container family-name-container">
              <input type="text" id="family-name" name="family-name" aria-label="family-name" placeholder="*Last name" value="<?= $familyName ?>" required>
              <label for="family-name" class="placeholder">*Last name</label>
              <?= isset($errorMessages['familyName']) ? '<span class="error-span">' . $errorMessages['familyName'] . '</span>' : ''; ?>
            </div>
          </div>
          <div class="input-container username-container">
            <input type="text" id="username" name="username" aria-label="username" placeholder="*Username (please use 4-16 characters)" value="<?= $username ?>" autocomplete="off" required>
            <label for="username" class="placeholder">*Username</label>
            <?= isset($errorMessages['username']) ? '<span class="error-span">' . $errorMessages['username'] . '</span>' : ''; ?>
            <?= isset($dbErrorMessage) ? '<span class="error-span">' . $dbErrorMessage . '</span>' : ''; ?>
          </div>
          <div class="flex-container">
            <div class="input-container email-container">
              <input type="email" id="email" name="email" aria-label="email" placeholder="*E-mail" value="<?= $email ?>" required>
              <label for="email" class="placeholder">*E-mail</label>
              <?= isset($errorMessages['email']) ? '<span class="error-span">' . $errorMessages['email'] . '</span>' : ''; ?>
            </div>
            <div class="input-container email-confirmation-container">
              <input type="email" id="email-confirmation" name="email-confirmation" aria-label="email confirmation" placeholder="*Confirm e-mail" value="<?= $emailConfirmation ?>" required>
              <label for="email-confirmation" class="placeholder">*Confirm e-mail</label>
              <?= isset($errorMessages['emailConfirmation']) ? '<span class="error-span">' . $errorMessages['emailConfirmation'] . '</span>' : ''; ?>
            </div>
          </div>
          <div class="flex-container">
            <div class="input-container password-container">
              <input type="password" id="password" name="password" aria-label="password" placeholder="*Password" value="<?= $password ?>" autocomplete="off" required>
              <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
              <label for="password" class="placeholder">*Password</label>
              <?= isset($errorMessages['password']) ? '<span class="error-span">' . $errorMessages['password'] . '</span>' : ''; ?>
            </div>
            <div class="input-container password-confirmation-container">
              <input type="password" id="password-confirmation" name="password-confirmation" aria-label="password confirmation" placeholder="*Confirm password" value="<?= $passwordConfirmation ?>" autocomplete="off" required>
              <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
              <label for="password-confirmation" class="placeholder">*Confirm password</label>
              <?= isset($errorMessages['passwordConfirmation']) ? '<span class="error-span">' . $errorMessages['passwordConfirmation'] . '</span>' : ''; ?>
            </div>
          </div>
          <div class="terms-and-conditions-container">
            <input type="checkbox" id="terms" name="terms" aria-label="Accept the terms and conditions" value="agree" <?= $termsChecked ?> required>
            <label for="terms-and-conditions">I have read and agree to the<a href="#">Terms & Conditions</a>.</label>
          </div>
          <?= isset($errorMessages['termsAndConditions']) ? '<span class="error-span">' . $errorMessages['termsAndConditions'] . '</span>' : ''; ?>
          <button type="submit" value="register" name="register" class="form-submit">Create Account</button>
          <?php if (isset($errorMessages['error'])) :
          ?>
            <div class="alert">
              <p><?= $errorMessages['error'] ?></p>
            </div>
          <?php endif;
          ?>
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
      <a href="../contact.php" class="footer-element"><small>Contact</small></a>
    </div>
  </footer>
</body>

</html>