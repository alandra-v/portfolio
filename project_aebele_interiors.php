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
      <a href="contact" class="contact-button">LET'S TALK</a>
      <a href="work" class="back-button">>Back to overview</a>
    </div>
  </main>
  <?php include(__DIR__ . '/includes/footer.inc.php'); ?>