<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>AVD Admin - <?php echo $pageTitle[$currentPage]; ?></title>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="../assets/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="../assets/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="../assets/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" id="16" type="image/png" href="../assets/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" id="ico" href="../assets/favicon/favicon.ico">
  <meta name="application-name" content="AVD" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="../favicon/mstile-144x144.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- stylesheets -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="css/admin_header.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/back_to_top_btn.css">

  <!-- scripts -->
  <script src="../js/back_to_top_btn.js" defer></script>
  <script src="../js/favicon_match_media.js" defer></script>

  <!-- dynamic stylesheets & scripts-->
  <?php

  switch ($currentPage) {
    case 'login.php':
      echo
      '<link rel="stylesheet" href="css/admin_login.css">';
      // '<script src="js/login_validation.js" defer></script>';
      break;

    case 'registration.php':
      echo
      '<link rel="stylesheet" href="css/admin_registration.css">',
      '<script src="js/registration_validation.js" defer></script>';
      break;

    case 'password_forgotten.php':
      echo
      '<link rel="stylesheet" href="css/password_forgotten.css">',
      '<script src="js/password_forgotten.js" defer></script>';
      break;

    case 'password_reset.php':
      echo
      '<link rel="stylesheet" href="css/password_reset.css">',
      '<script src="js/password_reset.js" defer></script>';
      break;
  }

  // if ($currentPage == 'index.php') {
  //   echo
  //   '<link rel="stylesheet" href="css/password_reset.css">';
  //   echo
  //   '<script src="js/password_reset.js" defer></script>';
  // }

  ?>
</head>