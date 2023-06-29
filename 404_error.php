<?php
require_once(__DIR__ . '/configuration.php');
require(__DIR__ . '/admin/Controller/Controller.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - page not found</title>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= BASE_URL; ?>/assets/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASE_URL; ?>/assets/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASE_URL; ?>/assets/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASE_URL; ?>/assets/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= BASE_URL; ?>/assets/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= BASE_URL; ?>/assets/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" id="16" type="image/png" href="<?= BASE_URL; ?>/assets/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" id="ico" href="<?= BASE_URL; ?>/assets/favicon/favicon.ico">
  <meta name="application-name" content="AVD" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="<?= BASE_URL; ?>/favicon/mstile-144x144.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/reset.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/404_error.css">
  <script src="<?= BASE_URL; ?>/js/favicon_match_media.js" defer></script>
</head>

<body>
  <header>
    <a href="<?= BASE_URL; ?>/index" class="avd-logo" aria-label="Home"><img src="<?= BASE_URL; ?>/assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  </header>
  <main>
    <div class="error-container">
      <div class="error-polygon-container">
        <picture>
          <source media="(min-width: 760px)" srcset="<?= BASE_URL; ?>/assets/illustrations/404_polygon.webp 1200w,
                          <?= BASE_URL; ?>/assets/illustrations/404_polygon.png 1200w">
          <source srcset="<?= BASE_URL; ?>/assets/illustrations/404_polygon_small.webp 600w,
                          <?= BASE_URL; ?>/assets/illustrations/404_polygon_small.png 600w">
          <img src="<?= BASE_URL; ?>/assets/illustrations/404_polygon.png" alt="404 polygon illustration" class="error-polygon" width="600" height="291">
        </picture>
      </div>
      <div class="msg">
        <h1>Page not found</h1>
        <p>Sorry, the page you are looking for might have been removed or is temporarily unavailable.</p>
        <a href="<?php
                  if (isset($_SESSION['auth_status'])) {
                    echo BASE_URL . '/admin/dashboard/index';
                  } else {
                    echo  BASE_URL . '/index';
                  }
                  ?>" class="bth-btn">Back to home</a>
      </div>
    </div>
  </main>
</body>

</html>