<?php
require_once(__DIR__ . '/includes/head_data.php');
require_once(__DIR__ . '/includes/nav_data.php');
include(__DIR__ . '/includes/head.inc.php');
?>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include(__DIR__ . '/includes/navigation.inc.php'); ?>
  </header>
  <main id="main">
    <h1>Thank you for contacting us.</h1>
    <p class="text">Dear [name], <br><br> thank you for contacting us. We'll get back to you as soon as possible.
      <br><br> Your AVD team
    </p>
    <a href="index.php" class="back-to-home">>Back to home</a>
  </main>
  <?php include(__DIR__ . '/includes/footer.inc.php'); ?>