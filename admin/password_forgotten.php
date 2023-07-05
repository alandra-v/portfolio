<?php
require_once(dirname(__DIR__) . '/configuration.php');
require_once(__DIR__ . '/includes/admin_head.inc.php');
?>

<body>
  <header>
    <a href="../index" class="avd-logo" aria-label="Home"><img src="../assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  </header>
  <main>
    <div class="container">
      <h1>Forgot your password?</h1>
      <!-- NOTE  -->
      <!-- Account recovery will  be implemented at a later stage  -->
      <p>Please enter your username or email address. You will receive an email message with instructions on how to reset your password. If you don't have access to your email anymore, you can try <a href="#">account recovery</a></p>
      <form action="" method="POST" id="login-form" novalidate>
        <div class="input-container">
          <input type="text" id="username-email" name="username-email" aria-label="username or email" autocomplete="email" placeholder="Username or email" required>
          <label for="username-email" class="placeholder">Username or email</label>
        </div>
        <div class="buttons">
          <button type="submit" class="reset-password">Reset password</button>
          <a href="login">Return to login</a>
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
      <a href="../contact" class="footer-element"><small>Contact</small></a>
    </div>
  </footer>
</body>

</html>