<?php
require(dirname(__DIR__) . '/configuration.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $metaDescription[$currentPage]; ?>">
  <title>AV Development - <?= $pageTitle[$currentPage]; ?></title>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= BASE_URL . 'assets/favicon/apple-touch-icon-57x57.png' ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASE_URL . 'assets/favicon/apple-touch-icon-114x114.png' ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASE_URL . 'assets/favicon/apple-touch-icon-72x72.png' ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASE_URL . 'assets/favicon/apple-touch-icon-144x144.png' ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= BASE_URL . 'assets/favicon/apple-touch-icon-120x120.png' ?>" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= BASE_URL . 'assets/favicon/apple-touch-icon-152x152.png' ?>" />
  <link rel="icon" id="16" type="image/png" href="<?= BASE_URL . 'assets/favicon/favicon-16x16.png' ?>" sizes="16x16" />
  <link rel="icon" id="ico" href="<?= BASE_URL . 'assets/favicon/favicon.ico' ?>">
  <meta name="application-name" content="AVD" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="favicon/mstile-144x144.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- stylesheets -->
  <link rel="stylesheet" href="<?= BASE_URL . 'css/reset.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'css/nav.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'css/footer.css' ?>">
  <link rel="stylesheet" href="<?= BASE_URL . 'css/back_to_top_btn.css' ?>">

  <!-- scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="<?= BASE_URL . 'js/mobile_navigation.js' ?>" defer></script>
  <script src="<?= BASE_URL . 'js/back_to_top_btn.js' ?>" defer></script>
  <script src="<?= BASE_URL . 'js/favicon_match_media.js' ?>" defer></script>

  <!-- dynamic stylesheets & scripts-->
  <?php

  switch ($currentPage) {
    case 'about.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/about.css">';
      break;

    case 'contact_reaction.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/contact_reaction.css">';
      break;

    case 'contact.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/contact.css">',
      '<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>',
      '<script src="' . BASE_URL . 'js/contact_form_validation.js" defer></script>';
      break;

    case 'index.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/style.css">',
      '<script src="' . BASE_URL . 'js/home_preview_slider.js" defer></script>';
      break;

    case 'legal_disclosure.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/legal_disclosure.css">';
      break;

    case 'privacy_policy.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/privacy_policy.css">';
      break;

    case 'project_aebele_interiors.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/project.css">';
      break;

    case 'services.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/services.css">',
      '<script src="' . BASE_URL . 'js/services.js" defer></script>';
      break;

    case 'work.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/work.css">';
      break;
  }

  ?>
</head>