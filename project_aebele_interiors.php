<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Æbele Interiors offers a full range of bespoke interior design services. They commissioned us to create a website that reflects their corporate personality.">
  <title>Project Aebele Interiors</title>
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
  <link rel="preload" as="font" href="https://use.typekit.net/zoc8kfz.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/project.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/back_to_top_btn.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="js/mobile_navigation.js" defer></script>
  <script src="js/back_to_top_btn.js" defer></script>
  <script src="js/favicon_match_media.js" defer></script>
</head>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include('includes/navigation.inc.php'); ?>
  </header>
  <main id="main">
    <section class="hero-section">
      <picture>
        <source media="(min-width:760px)" srcset="assets/images/aebele_2.webp 1200w,
                        assets/images/aebele_2.png 1200w">
        <source srcset="assets/images/aebele_2_small.webp 600w,
                        assets/images/aebele_2_small.png 600w">
        <img class="hero img-1" src="assets/images/aebele_2.png" alt="Gallery page Aebele interiors" width="1200" height="758">
      </picture>
      <picture>
        <source media="(min-width:1000px)" srcset="assets/images/aebele_3.webp 1200w,
                        assets/images/aebele_3.png 1200w">
        <source srcset="assets/images/aebele_3_small.webp 600w,
                        assets/images/aebele_3_small.png 600w">
        <img class="hero img-2" src="assets/images/aebele_3.png" alt="Shop Aebele interiors" width="1200" height="758">
      </picture>
      <div class="logo-positioning-container">
        <div class="title">
          <div class="project-title">
            <h1>Aebele</h1>
            <hr>
            <p>2022</p>
          </div>
          <a class="visit-website" href="https://aebeleinteriors.com/" target="blank">>Visit website</a>
        </div>
        <picture class="logo">
          <source media="(min-width:1000)" srcset="assets/images/aebele_interiors_logo.webp 200w,
                          assets/images/aebele_interiors_logo.png 200w">
          <source srcset="assets/images/aebele_interiors_logo_small.webp 100w,
                          assets/images/aebele_interiors_logo_small.png 100w">
          <img src="assets/images/aebele_interiors_logo.png" alt="Aebele Interiors logo" width="200" height="163" class="logo">
        </picture>
      </div>
    </section>
    <div class="computer-frame">
      <iframe title="Aebele Interiors home page" class="computer" src="https://aebeleinteriors.com/" frameborder="0" width="580" height="180"></iframe>
    </div>
    <div class="mobile-frame">
      <iframe title="Aebele Interiors home page" class="mobile" src="https://aebeleinteriors.com/" frameborder="0" width="200" height="400"></iframe>
    </div>
    <div class="buttons">
      <a href="contact.php" class="contact-button">LET'S TALK</a>
      <a href="work.php" class="back-button">>Back to overview</a>
    </div>
  </main>
  <?php include('includes/footer.inc.php'); ?>