<?php require_once("includes/admin_head_data.php"); ?>
<?php require_once("includes/admin_head.inc.php"); ?>

<body>
  <header>
    <a href="../index.php" class="avd-logo" aria-label="Home"><img src="../assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  </header>
  <main>
    <div class="container">
      <h1>Reset your password</h1>
      <form action="" method="POST" id="login-form" novalidate>
        <div class="input-container password-container">
          <input type="password" id="new-password" name="new-password" aria-label="new password" placeholder="New password" required>
          <label for="new-password" class="placeholder">New password</label>
          <i class="fa fa-eye password-toggle" aria-label="show password"></i>
        </div>
        <div class="input-container password-confirmation-container">
          <input type="password" id="password-confirmation" name="password-confirmation" aria-label="confirm new password" placeholder="Confirm new password" required>
          <label for="password-confirmation" class="placeholder">Confirm new password</label>
          <i class="fa fa-eye password-toggle" aria-label="show password"></i>
        </div>
        <p><b>New password:</b></p>
        <ul class="password-rules">
          <li>Must contain at least <b>8 characters</b></li>
          <li>Must contain at least <b>one lowercase letter</b></li>
          <li>Must contain at least <b>one capital letter</b></li>
          <li>Must contain at least <b>one number</b></li>
          <li>Must contain at least <b>one special character</b></li>
          <li>Must <b>not contain spaces</b></li>
        </ul>
        <div class="buttons">
          <button type="submit" class="reset-password">Reset password</button>
          <a href="login.php">Return to login</a>
        </div>
      </form>
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