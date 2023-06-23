<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVD Admin - <?= $pageTitle[$currentPage]; ?></title>
  <link rel="icon" id="ico" href="<?= BASE_URL . 'assets/favicon/favicon.ico' ?>">
  <link rel="icon" id="16" type="image/png" href="<?= BASE_URL . 'assets/favicon/favicon-16x16.png' ?>" sizes="16x16" />
  <meta name="application-name" content="AVD" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- dynamic stylesheets & scripts-->
  <?php

  switch ($currentPage) {
    case 'login.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/admin_header.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/footer.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/login.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/login_validation.js" defer></script>';
      break;

    case 'password_forgotten.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/admin_header.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/footer.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/password_forgotten.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/password_forgotten.js" defer></script>';
      break;

    case 'password_reset.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/admin_header.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/footer.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/password_forgotten.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/password_reset.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/password_reset.js" defer></script>';
      break;


      /* Content Management System */

    case 'index.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/style.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>';
      break;

    case 'user_registration.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/admin_header.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/footer.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/registration.css">',
      '<script src="' . BASE_URL . 'admin/js/registration_validation.js" defer></script>';
      break;

    case 'account_settings.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/account_settings.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/confirmation.js" defer></script>';

      break;

    case 'user_read.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/user_read.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/drop_down.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/confirmation.js" defer></script>';
      break;

    case 'media_library.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/media_library.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>',
      '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>',
      '<script src="' . BASE_URL . 'admin/js/confirmation.js" defer></script>';
      break;

    case 'media_upload.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/media_upload.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>';
      break;

    case 'media_update.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/media_update.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>';
      break;

    case 'projects_read.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/projects_read.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>',
      '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>',
      '<script src="' . BASE_URL . 'admin/js/confirmation.js" defer></script>';
      break;

    case 'project_create.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/project_create.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>';
      break;

    case 'project_update.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/projects_update.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>';
      break;

    case 'contacts_read.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/contacts_read.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src=" ' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/drop_down.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/confirmation.js" defer></script>';
      break;

    case 'contact_update.php':
      echo
      '<link rel="stylesheet" href="' . BASE_URL . 'css/reset.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'css/back_to_top_btn.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/contacts_update.css">',
      '<link rel="stylesheet" href="' . BASE_URL . 'admin/css/cms_nav.css">',
      '<script src="' . BASE_URL . 'js/favicon_match_media.js" defer></script>',
      '<script src="' . BASE_URL . 'js/back_to_top_btn.js" defer></script>',
      '<script src="' . BASE_URL . 'admin/js/cms_nav.js" defer></script>';
      break;
  }

  ?>
</head>