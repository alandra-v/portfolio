<?php
require_once(dirname(__DIR__) . '/Controller/Dashboard.php');
$Dashboard = new Dashboard();

require_once(dirname(__DIR__) . '/includes/admin_head.inc.php');

?>


<body>
  <?php include(dirname(__DIR__) . '/includes/cms/navigation.inc.php'); ?>
  <main>
    <section class="var-dump">
      <h2>Overview</h2>
      <hr class="title-separator">
      <p><?= "Welcome to the admin's area, " . htmlspecialchars($_SESSION['data']['user_name']) . "!" ?></p>
    </section>
    <section class=" login-history">
      <div class="section-content">
        <!-- NOTE -->
        <!-- recent login attempts will be implemented at a later stage -->
        <h2>Recent login activity</h2>
        <hr class="title-separator">
        <!-- <div class="login-activity"></div> -->
        <div class="flex-container">
          <p>This wasn't me </p>
          <a href="../user/account_settings" class="change-password">Change password</a>
        </div>

        <h2>Failed login attempts</h2>
        <hr class="title-separator">
        <!-- <div class="failed-login-attempts"></div> -->
        <div class="flex-container">
          <p>This wasn't me </p>
          <a href="../user/account_settings" class="change-password">Change password</a>
        </div>
      </div>
    </section>
  </main>

</body>

</html>