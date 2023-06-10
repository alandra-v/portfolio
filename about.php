<?php
require_once("includes/head_data.php");
require_once("includes/nav_data.php");
include("includes/head.inc.php");
?>


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