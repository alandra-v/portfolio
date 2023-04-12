<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="We are a young & committed team located in Zurich and in Graubünden.">
  <title>About us</title>
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
  <link rel="stylesheet" href="css/about.css">
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
    <div class="background-img">
      <?php include('includes/navigation.inc.php'); ?>
      <h1>We are AVD</h1>
      <a href="contact.php" class="hero-section-button">GET IN TOUCH</a>
    </div>
  </header>
  <main id="main">
    <section>
      <div class="title-section">
        <h2>Cooperation partners</h2>
        <hr class="title">
      </div>
      <div class="cooperation-partners">
        <div class="logos">
          <a href="https://www.sel-ina.art/" class="selina-art-logo" aria-label="Visit Selina Art website">
            <picture>
              <source media="(min-width: 700px)" srcset="assets/images/selina_art_logo.webp 1500w,
                              assets/images/selina_art_logo.jpg 1500w">
              <source srcset="assets/images/selina_art_logo_small.webp 500w,
                              assets/images/selina_art_logo_small.jpg 500w">
              <img src="assets/images/selina_art_logo.jpg" width="1500" height="1096" alt="Selina Art logo" class="logo">
            </picture>
          </a>
          <a href="https://www.silvanproductions.ch/" class="silvan-productions-logo" aria-label="Visit Silvan Productions website"><img src="assets/images/silvan_productions_logo.png.webp" width="234" height="105" alt="Silvan Productions logo" class="logo silvan-productions-logo"></a>
        </div>
        <p class="partners">We closely work together with Selina Caderas (graduate designer HR communication design with
          specialisation in photography) and Silvan Wagner (videographer, digital film producer).</p>
      </div>
    </section>
    <section>
      <div class="title-section">
        <h2>About us</h2>
        <hr class="title">
      </div>
      <div class="about">
        <picture>
          <source media="(min-width:700px)" srcset="assets/images/portrait.webp 1920w,
                          assets/images/portrait.jpg 1920w">
          <source srcset="assets/images/portrait_small.webp 500w,
                          assets/images/portrait_small.jpg 500w">
          <img src="assets/images/portrait.jpg" width="1920" height="2880" alt="Woman with brown long hair wearing a jean jacket" class="portrait">
        </picture>
        <p class="about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, ducimus accusamus deleniti et
          beatae illum in similique nobis. Distinctio quod soluta, veniam, dolorum facilis pariatur sit odio, rerum nam
          ipsum modi beatae necessitatibus dolores minima temporibus ex id non magni aspernatur. Eveniet nisi cum qui
          ipsam earum nesciunt inventore sequi?</p>
      </div>
    </section>
    <section class="education-career">
      <div class="title-section">
        <h2>Education & career</h2>
        <hr class="title">
      </div>
      <div class="education-career-grid">
        <p>Quant - Web developer</p>
        <p class="date">2021 - present</p>
        <p>Enigma - Digital Project Manager Support Internship</p>
        <p class="date">2020 - 2021</p>
        <p>Freelance Webdesign & Development</p>
        <p class="date">2020 - present</p>
        <p>Webdevelopment Bachelor SAE Zurich</p>
        <p class="date">2017 - 2020</p>
      </div>
    </section>
    <a href="contact.php" class="contact-button">CONTACT</a>
    <section class="recognitions">
      <div class="title-section">
        <h2>Recognitions</h2>
        <hr class="title">
      </div>
      <div class="recognitions-grid">
        <p>Awwwards site of the day</p>
        <p class="date">13.02.2022</p>
        <p>Awwwards honorable mention</p>
        <p class="date">08.2021</p>
        <p>Cssdesignawards website of the month</p>
        <p class="date">05.2021</p>
      </div>
      <a href="work.php" class="view-projects-button">VIEW PROJECTS</a>
    </section>
  </main>
  <?php include('includes/footer.inc.php'); ?>