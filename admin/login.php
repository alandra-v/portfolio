<?php
// require_once("../configuration.php");
require_once(__DIR__ . '/Controller/Login.php');
$Login = new Login();
$Response = [];
if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST);

require_once(__DIR__ . '/includes/admin_head_data.php');
require_once(__DIR__ . '/includes/admin_head.inc.php');
?>


<body>
  <header>
    <a href="../index" class="avd-logo" aria-label="Home"><img src="../assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  </header>
  <main>
    <div class="login-container">
      <div class="lock-polygon-container">
        <picture>
          <source media="(min-width: 760px)" srcset="../assets/illustrations/lock_closed.webp 1200w,
                          ../assets/illustrations/lock_closed.png 1200w">
          <source srcset="../assets/illustrations/lock_closed_small.webp 600w,
                          ../assets/illustrations/lock_closed_small.png 600w">
          <img src="../assets/illustrations/lock_closed.png" width="338" height="469" alt="lock outline polygon" class="lock-polygon-closed">
        </picture>
      </div>
      <div class="login">
        <h1>Log In</h1>
        <div class="switch-to-registration">
          <?php
          if (isset($_GET['userStatus'])) {
            if ($_GET['userStatus'] == 'loggedout') {
              echo '<p>You have successfully been logged out.</p>';
            } else if ($_GET['userStatus'] == 'removed') {
              echo '<p>Your account has successfully been removed.</p>';
            }
          }
          ?>
        </div>
        <form action="" method="POST" id="login-form" autocomplete="off" novalidate>
          <!-- <form action="" method="POST" id="login-form" autocomplete="off" novalidate> -->
          <div class="input-container username-container">
            <input type="text" id="username-or-email" name="username-email" aria-label="username or email" placeholder="Username or Email" required>
            <label for="username-or-email" class="placeholder">Username or Email</label>
          </div>
          <div class="input-container password-container">
            <input type="password" id="password" name="password" aria-label="password" placeholder="Password" required>
            <label for="password" class="placeholder">Password</label>
            <i role="button" class="fa fa-eye password-toggle" aria-label="show password"></i>
          </div>
          <a href="password_forgotten" class="forgotten-password">Forgotten password?</a>
          <?php if (isset($_GET['error'])) : ?>
            <div class="alert">
              <p><?= '❗️ Username or password incorrect' ?></p>
            </div>
          <?php endif; ?>
          <button type="submit" value="login" name="login" class="form-submit">Log In</button>
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
      <a href="../contact" class="footer-element"><small>Contact</small></a>
    </div>
  </footer>
</body>

</html>