<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $metaDescription[$currentPage]; ?>">
  <title>AV Development - <?php echo $pageTitle[$currentPage]; ?></title>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" id="16" type="image/png" href="assets/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" id="ico" href="assets/favicon/favicon.ico">
  <meta name="application-name" content="AVD" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="favicon/mstile-144x144.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- stylesheets -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/back_to_top_btn.css">

  <!-- scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="js/mobile_navigation.js" defer></script>
  <script src="js/back_to_top_btn.js" defer></script>
  <script src="js/favicon_match_media.js" defer></script>

  <!-- dynamic stylesheets & scripts-->
  <?php

  if ($currentPage == 'about.php') {
    echo
    '<link rel="stylesheet" href="css/about.css">';
  }

  if ($currentPage == 'contact_reaction.php') {
    echo
    '<link rel="stylesheet" href="css/contact_reaction.css">';
  }

  if ($currentPage == 'contact.php') {
    echo
    '<link rel="stylesheet" href="css/contact.css">';
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>';
  }

  if ($currentPage == 'index.php') {
    echo
    '<link rel="stylesheet" href="css/style.css">';
    '<script src="js/home_preview_slider.js" defer></script>';
  }

  if ($currentPage == 'legal_disclosure.php') {
    echo
    '<link rel="stylesheet" href="css/legal_disclosure.css">';
  }

  if ($currentPage == 'privacy_policy.php') {
    echo
    '<link rel="stylesheet" href="css/privacy_policy.css">';
  }

  if ($currentPage == 'project_aebele_interiors.php') {
    echo
    '<link rel="stylesheet" href="css/project.css">';
  }

  if ($currentPage == 'services.php') {
    echo
    '<link rel="stylesheet" href="css/services.css">';
    '<script src="js/services.js" defer></script>';
  }

  if ($currentPage == 'work.php') {
    echo
    '<link rel="stylesheet" href="css/work.css">';
  }

  ?>
</head>