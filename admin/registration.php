<!-- <?php //require("includes/registration_and_login/registration_script.php");
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
          <!-- third party registrations will be implemented at a later date -->
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
              <option value="">Title</option>
              <option value="mr">Mr.</option>
              <option value="mrs">Mrs.</option>
              <option value="ms">Ms.</option>
              <option value="ms">Other</option>
            </select>
            <?php echo isset($errorMessages['title']) ? '<br><span style="color:red;">' . $errorMessages['title'] . '</span>' : ''; ?>
          </div>
          <fieldset class="gender-radio-inputs">
            <legend>Please select your gender:</legend>
            <div class="radio-input-options">
              <label for="woman">
                <input type="radio" id="woman" value="woman" name="gender" checked>
                Woman</label>
              <label for="man">
                <input type="radio" id="man" value="man" name="gender">
                Man</label>
              <label for="transgender">
                <input type="radio" id="transgender" value="transgender" name="gender">
                Transgender</label>
              <label for="non-binary">
                <input type="radio" id="non-binary" value="non-binary" name="gender">
                Non-binary</label>
              <label for="no-response">
                <input type="radio" id="no-response" value="no-response" name="gender">
                Prefer not to respond</label>
            </div>
          </fieldset>
          <div class="flex-container">
            <div class="input-container given-name-container">
              <input type="text" id="given-name" name="given-name" aria-label="given-name" placeholder="*First name" required>
              <label for="given-name" class="placeholder">*First name</label>
              <?php echo isset($errorMessages['givenName']) ? '<br><span style="color:red;">' . $errorMessages['givenName'] . '</span>' : ''; ?>
            </div>
            <div class="input-container family-name-container">
              <input type="text" id="family-name" name="family-name" aria-label="family-name" placeholder="*Last name" required>
              <label for="family-name" class="placeholder">*Last name</label>
              <?php echo isset($errorMessages['familyName']) ? '<br><span style="color:red;">' . $errorMessages['familyName'] . '</span>' : ''; ?>
            </div>
          </div>
          <div class="input-container username-container">
            <input type="text" id="username" name="username" aria-label="username" placeholder="*Username (please use 4-16 characters)" autocomplete="off" required>
            <label for="username" class="placeholder">*Username</label>
            <?php echo isset($errorMessages['username']) ? '<br><span style="color:red;">' . $errorMessages['username'] . '</span>' : ''; ?>
          </div>
          <div class="flex-container">
            <div class="input-container email-container">
              <input type="email" id="email" name="email" aria-label="email" placeholder="*E-mail" required>
              <label for="email" class="placeholder">*E-mail</label>
              <?php echo isset($errorMessages['email']) ? '<br><span style="color:red;">' . $errorMessages['email'] . '</span>' : ''; ?>
            </div>
            <div class="input-container email-confirmation-container">
              <input type="email" id="email-confirmation" name="email-confirmation" aria-label="email confirmation" placeholder="*Confirm e-mail" required>
              <label for="email-confirmation" class="placeholder">*Confirm e-mail</label>
              <?php echo isset($errorMessages['emailConfirmation']) ? '<br><span style="color:red;">' . $errorMessages['emailConfirmation'] . '</span>' : ''; ?>
            </div>
          </div>
          <div class="flex-container">
            <div class="input-container password-container">
              <input type="password" id="password" name="password" aria-label="password" placeholder="*Password" autocomplete="off" required>
              <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
              <label for="password" class="placeholder">*Password</label>
              <?php echo isset($errorMessages['password']) ? '<br><span style="color:red;">' . $errorMessages['password'] . '</span>' : ''; ?>
            </div>
            <div class="input-container password-confirmation-container">
              <input type="password" id="password-confirmation" name="password-confirmation" aria-label="password confirmation" placeholder="*Confirm password" autocomplete="off" required>
              <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
              <label for="password-confirmation" class="placeholder">*Confirm password</label>
              <?php echo isset($errorMessages['passwordConfirmation']) ? '<br><span style="color:red;">' . $errorMessages['passwordConfirmation'] . '</span>' : ''; ?>
            </div>
          </div>
          <div class="terms-and-conditions-container">
            <input type="checkbox" id="terms-and-conditions" name="agree" value="terms-and-conditions" aria-label="Accept the terms and conditions" required>
            <label for="terms-and-conditions">I have read and agree to the<a href="#">Terms & Conditions</a>.</label>
          </div>
          <?php echo isset($errorMessages['termsAndConditions']) ? '<br><span style="color:red;">' . $errorMessages['termsAndConditions'] . '</span>' : ''; ?>
          <button type="submit" value="register" name="register" class="form-submit">Create Account</button>
          <?php echo isset($errorMessages['form']) ? '<br><span style="color:red;">' . $errorMessages['form'] . '</span>' : ''; ?>
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