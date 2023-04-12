<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A unique partner for unique projects. From the concept to the finished web project tailored to your and your customers needs.">
  <title>Home</title>
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/back_to_top_btn.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="js/mobile_navigation.js" defer></script>
  <script src="js/home_preview_slider.js" defer></script>
  <script src="js/back_to_top_btn.js" defer></script>
  <script src="js/favicon_match_media.js" defer></script>
</head>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <div class="background-img">
      <?php include('includes/navigation.inc.php'); ?>
      <!-- HERO SECTION -->
      <section class="hero">
        <h1>A unique partner for <br> unique projects</h1>
        <p class="hero-text">Custom web design & development for your brand</p>
        <a href="contact.php" class="contact-button-hero">LET'S TALK</a>
      </section>
    </div>
  </header>
  <main id="main">
    <!-- SERVICES SECTION -->
    <section class="services">
      <div class="title-section">
        <hr class="title">
        <h2 class="section-title">Services</h2>
      </div>
      <div class="articles-grid">
        <hr class="parting-line">
        <div class="service">
          <h3>Web design</h3>
          <p class="service-description">From concept to prototype. Design that goes beyond aesthetics to include the
            websites overall functionality.</p>
          <div class="container-buttons">
            <a href="services.php#web-design" class="learn-more">>Learn more</a>
            <a href="services.php#web-design" class="icon ux-ui-icon" aria-label="Learn more about web design services">UX/UI</a>
          </div>
        </div>
        <figure class="device-frame">
          <picture>
            <source srcset="assets/images/computer_device_frame.webp 466w">
            <img src="assets/images/computer_device_frame.png" width="466" height="406" alt="Computer device frame with a landing page of an art exhibition" class="computer">
          </picture>
        </figure>
        <hr class="parting-line">
        <div class="service">
          <h3>SEO & SEA optimization</h3>
          <p class="service-description">The best medium for long-term marketing for almost every company.</p>
          <div class="container-buttons">
            <a href="services.php#seo-sea" class="learn-more">>Learn more</a>
            <a href="services.php#seo-sea" class="icon" aria-label="Learn more about SEO and SEA services">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98.41 98.48">
                <path stroke="#000" stroke-miterlimit="10" stroke-width="2" d="M75.16 38.15C75.2 17.67 58.62 1.04 38.14 1 17.67.96 1.04 17.54 1 38.02.96 58.5 17.54 75.13 38.02 75.17c8.24.01 16.26-2.72 22.78-7.77l29.67 29.67 6.54-6.54-29.67-29.67a37.013 37.013 0 0 0 7.83-22.71ZM38.08 65.96c-15.36 0-27.81-12.45-27.81-27.81s12.45-27.82 27.81-27.82 27.81 12.45 27.81 27.81-12.45 27.81-27.81 27.81Z" />
              </svg>
            </a>
          </div>
        </div>
        <hr class="parting-line">
        <div class="service">
          <h3>Development</h3>
          <p class="service-description">From simple static pages to complex web applications, we take care of the
            technical implementation.</p>
          <div class="container-buttons">
            <a href="services.php#development" class="learn-more">>Learn more</a>
            <a href="services.php#development" class="icon development-icon" aria-label="Learn more about development services">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120.87 63.98">
                <path d="M43.01 63.98 66.6 0h10.13L53.21 63.98h-10.2ZM0 25.54 36.33 7.11v10.13l-26.07 12.7 26.08 13.07V53.2L0 34.49v-8.95ZM120.87 34.76 84.54 53.19v-10.2l26.08-12.7-26.08-13.07V7.11l36.33 18.7v8.95Z" />
              </svg>
            </a>
          </div>
        </div>
        <figure class="device-frame">
          <picture>
            <source srcset="assets/images/mobile_device_frame.webp 103w">
            <img src="assets/images/mobile_device_frame.png" width="103" height="194" alt="Mobile phone frame with a health app opened" class="mobile">
          </picture>
        </figure>
        <hr class="parting-line">
        <div class="service">
          <h3>CMS</h3>
          <p class="service-description">The backend as a frontend for you. This way you can manage your website and the
            content yourself, depending on your needs.</p>
          <div class="container-buttons">
            <a href="services.php#cms" class="learn-more">>Learn more</a>
            <a href="services.html#cms" class="icon" aria-label="Learn more about CMS services">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90.24 90.24">
                <path d="M58.48 39.5c4.99 0 9.67 1.94 13.19 5.46l3.45 3.45c7.05-3.13 12.56-9.39 14.38-17.03 1.01-4.22.94-8.3.04-12.05-.46-1.92-2.9-2.56-4.29-1.16L73.11 30.31H59.79V17.14L71.93 5c1.39-1.39.75-3.83-1.16-4.29-3.76-.9-7.84-.97-12.05.04-9.75 2.33-17.34 10.61-18.89 20.51-.25 1.47-.31 2.89-.29 4.3l14.59 14.6c1.43-.49 2.89-.66 4.36-.66Zm9.2 9.61c-4.08-4.08-10.15-4.86-15.05-2.45L33.68 27.85V16.92L11.28 0 0 11.12l16.92 22.4h10.93l18.81 18.79c-2.41 4.9-1.63 10.97 2.45 15.05L69.73 88c2.58 2.56 6.73 2.56 9.29 0l9.3-9.3c2.56-2.56 2.56-6.71 0-9.29L67.68 49.1Zm-27.51 5.01L29.74 43.7 3.49 69.93a11.884 11.884 0 0 0 0 16.82c2.32 2.32 5.36 3.48 8.41 3.48s6.09-1.16 8.41-3.49L41.3 65.75c-1.55-3.67-2.07-7.71-1.13-11.65ZM11.28 83.2c-2.34 0-4.23-1.89-4.23-4.23s1.89-4.23 4.23-4.23 4.23 1.89 4.23 4.23-1.89 4.23-4.23 4.23Z" />
              </svg>
            </a>
          </div>
        </div>
        <hr class="parting-line">
        <div class="service">
          <h3>Branding</h3>
          <p class="service-description">Together we'll find your USP's that we focus on and with which we
            design/redesign your online visual identity to align with your products/services and brand values.</p>
          <div class="container-buttons">
            <a href="services.php#branding" class="learn-more">>Learn more</a>
            <a href="services.php#branding" class="icon" aria-label="Learn more about branding services">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93.16 93">
                <path d="M46.67 44.69c-2.41 0-4.2 1.95-4.2 4.2.2 13.12-1.48 25.77-5.04 38.42-.64 1.94.25 5.7 4.04 5.7 1.91 0 3.65-1.25 4.2-3.18 2.45-8.69 5.47-22.78 5.36-40.78 0-2.4-1.95-4.36-4.36-4.36Zm-.16-14.84c-11.28-.04-18.89 8.54-18.73 18.36.14 8.69-.68 17.41-2.43 25.88-.5 2.2 1.02 4.65 3.38 5.15 2.2.48 4.65-1.02 5.15-3.38 1.88-9.1 2.75-18.45 2.61-27.63-.07-4.9 3.45-9.71 9.88-9.67 5.7.09 10.4 4.61 10.47 10.08.16 8.55-.5 17.48-1.93 26.06-.39 2.2 1.23 4.61 3.61 5.02 3.61.59 4.86-2.75 4.99-3.61 1.5-8.92 2.2-18.36 2.04-27.44-.17-10.33-8.7-18.68-19.06-18.83Zm-20.09-3.6a4.38 4.38 0 0 0-6.16.62c-4.62 5.72-7.14 12.97-7.03 20.34.11 6.83-.43 13.69-1.63 20.36-.43 2.2 1.14 4.63 3.5 5.06 3.65.64 4.93-2.7 4.92-3.52 1.29-7.24 1.91-14.64 1.77-22.05.09-5.41 1.83-10.5 5.09-14.68 1.69-1.89 1.42-4.61-.45-6.14Zm19.71-11.33c-2.63-.07-5.45.25-8.16.91-2.34.38-3.79 2.74-3.25 5.24.57 2.34 2.74 3.77 5.1 3.22 2.17-.45 4.23-.68 6.35-.66 13.69.2 24.99 11.17 25.23 24.45.09 6.88-.25 13.64-1.02 20.63-.27 2.38 1.45 4.38 3.84 4.81 3.04.2 4.63-2.16 4.81-3.84.84-7.22 1.2-14.49 1.09-21.74-.31-17.92-15.47-32.76-34-33.03Zm45.95 22.06c-.52-2.2-2.82-3.86-5.2-3.34-2.2.52-3.84 2.86-3.31 5.2.86 3.91.89 6.81.86 11.19-.02 2.41 1.91 4.38 4.31 4.4 2.38 0 4.38-1.93 4.4-4.34.02-4 .06-8-1.07-13.12Zm-7.45-16.47C75.78 7.91 61.31.22 45.89 0 33.23-.16 21.52 4.52 12.8 13.26 4.38 21.68-.16 32.87.02 44.79L0 48.7c.09 2.42 1.98 4.42 4.38 4.49.05.02.09.02.14.02 2.2 0 4.29-1.88 4.2-4.24l.02-4.29c.03-9.54 3.64-18.51 10.38-25.25 7.06-7.04 16.6-10.83 26.83-10.69 12.6.02 24.47 6.47 31.71 16.78a4.349 4.349 0 0 0 6.06 1.07c1.82-1.39 2.46-4.08.91-6.06Z" />
              </svg>
            </a>
          </div>
        </div>
        <figure class="device-frame">
          <picture>
            <source srcset="assets/images/tablet_device_frame.webp 265w">
            <img src="assets/images/tablet_device_frame.png" width="265" height="175" alt="Tablet device frame with a ski club landing page on it" class="tablet">
          </picture>
        </figure>
        <hr class="parting-line">
        <div class="service">
          <h3>Support</h3>
          <p class="service-description">Every website needs maintenance, and together we will find the right solution
            for you and your company.</p>
          <div class="container-buttons">
            <a href="services.php#support" class="learn-more">>Learn more</a>
            <a href="services.php#support" class="icon" aria-label="Learn more about our support">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87.37 91">
                <path d="M87.37 43.67v19.11c-.15 7.54-6.13 13.67-13.65 13.67-4.52 0-8.19-3.68-8.19-8.2V46.43c0-4.52 3.67-8.21 8.19-8.21 1.85 0 3.57.46 5.17 1.14-2.15-17.67-17.1-31.15-35.2-31.15S10.63 21.69 8.48 39.37c1.6-.68 3.32-1.14 5.17-1.14 4.52 0 8.19 3.69 8.19 8.21v21.83c0 4.51-3.67 8.19-8.19 8.19-7.53 0-13.5-6.12-13.5-13.66L0 43.7C0 19.59 19.59 0 43.68 0S87.3 19.54 87.21 43.57c0 .03 0 .07.15.1Z" />
                <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="10" d="M75.66 68.23S79.1 86 65.91 86H41.88" />
              </svg>
            </a>
          </div>
        </div>
      </div>
      <a href="contact.php" class="contact-button-services">LET'S TALK</a>
    </section>
    <!-- PROJECT PREVIEWS SECTION -->
    <section class="project-previews">
      <div class="title-section title-section-previews">
        <hr class="title">
        <h2 class="section-title">Projects</h2>
      </div>
      <button class="l-a" aria-label="Slide to the next project">&lsaquo;</button>
      <button class="r-a" aria-label="Slide to the previous project">&rsaquo;</button>
      <div class="previews-container">
        <div class="previews">
          <ul class="previews-ul">
            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/aebele_home.webp 1200w, assets/images/aebele_home.png 1200w">
                  <source srcset="assets/images/aebele_home_small.webp 600w, assets/images/aebele_home_small.png 600w">
                  <img src="assets/images/aebele_home.png" width="1200" height="758" alt="Landing page Aebele interiors" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/aebele_2.webp 1200w, assets/images/aebele_2.png 1200w">
                  <source srcset="assets/images/aebele_2_small.webp 600w, assets/images/aebele_2_small.png 600w"><img src="assets/images/aebele_2.png" width="1200" height="758" alt="Gallery page Aebele interiors" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/aebele_3.webp 1200w, assets/images/aebele_3.png 1200w">
                  <source srcset="assets/images/aebele_3_small.webp 600w, assets/images/aebele_3_small.png 600w"><img src="assets/images/aebele_3.png" width="1200" height="758" alt="Shop Aebele interiors" class="preview-img">
                </picture>
                <p class="project-title">Aebele</p>
                <a href="project_aebele_interiors.php" class="view-project">>View project</a>
              </div>
            </li>

            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/hyer_2.webp 1200w, assets/images/hyer_2.png 1200w">
                  <source srcset="assets/images/hyer_2_small.webp 600w, assets/images/hyer_2_small.png 600w"><img src="assets/images/hyer_2.png" width="1200" height="758" alt="Example page Hyer personalised aviation" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/hyer_3.webp 1200w, assets/images/hyer_3.png 1200w">
                  <source srcset="assets/images/hyer_3_small.webp 600w, assets/images/hyer_3_small.png 600w"><img src="assets/images/hyer_3.png" width="1200" height="758" alt="Financial advantages section on page Hyer personalised aviation" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/hyer_home.webp 1200w, assets/images/hyer_home.png 1200w">
                  <source srcset="assets/images/hyer_home_small.webp 600w, assets/images/hyer_home_small.png 600w">
                  <img src="assets/images/hyer_home.png" width="1200" height="758" alt="Landing page Hyer personalised aviation" class="preview-img">
                </picture>
                <p class="project-title">Hyer</p>
                <a href="#" class="view-project">>View project</a>
              </div>
            </li>

            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/mikks_2.webp 1200w, assets/images/mikks_2.png 1200w">
                  <source srcset="assets/images/mikks_2_small.webp 600w, assets/images/mikks_2_small.png 600w"><img src="assets/images/mikks_2.png" width="1200" height="758" alt="Recipe page Mikks all natural drink mixers" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/mikks_3.webp 1200w, assets/images/mikks_3.png 1200w">
                  <source srcset="assets/images/mikks_3_small.webp 600w, assets/images/mikks_3_small.png 600w"><img src="assets/images/mikks_3.png" width="1200" height="758" alt="Product page Mikks all natural drink mixers" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/mikks_home.webp 1200w, assets/images/mikks_home.png 1200w">
                  <source srcset="assets/images/mikks_home_small.webp 600w, assets/images/mikks_home_small.png 600w">
                  <img src="assets/images/mikks_home.png" width="1200" height="758" alt="Landing page Mikks all natural drink mixers" class="preview-img">
                </picture>
                <p class="project-title">Mikks</p>
                <a href="#" class="view-project">>View project</a>
              </div>
            </li>

            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/gravityglobalgroup_home.webp 1200w, assets/images/gravityglobalgroup_home.png 1200w">
                  <source srcset="assets/images/gravityglobalgroup_home_small.webp 600w, assets/images/gravityglobalgroup_home_small.png 600w">
                  <img src="assets/images/gravityglobalgroup_home.png" width="1200" height="758" alt="Landing page gravity global group" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/gravityglobalgroup_1.webp 1200w, assets/images/gravityglobalgroup_1.png  1200w">
                  <source srcset="assets/images/gravityglobalgroup_1_small.webp 600w, assets/images/gravityglobalgroup_1_small.png 600w">
                  <img src="assets/images/gravityglobalgroup_1.png" width="1200" height="750" alt="Idea page gravity global group" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/gravityglobalgroup_2.webp 1200w, assets/images/gravityglobalgroup_2.png 1200w">
                  <source srcset="assets/images/gravityglobalgroup_2_small.webp 600w, assets/images/gravityglobalgroup_2_small.png 600w">
                  <img src="assets/images/gravityglobalgroup_2.png" width="1200" height="750" alt="Gravity global group healthcare" class="preview-img">
                </picture>
                <p class="project-title">Gravity Global</p>
                <a href="#" class="view-project">>View project</a>
              </div>
            </li>

            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/what_is_missing_home.webp 1200w, assets/images/what_is_missing_home.png 1200w">
                  <source srcset="assets/images/what_is_missing_home_small.webp 600w, assets/images/what_is_missing_home_small.png 600w">
                  <img src="assets/images/what_is_missing_home.png" width="1200" height="750" alt="Landing page of whatismissing.org" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/what_is_missing_1.webp 1200w, assets/images/what_is_missing_1.png 1200w">
                  <source srcset="assets/images/what_is_missing_1_small.webp 600w, assets/images/what_is_missing_1_small.png 600w">
                  <img src="assets/images/what_is_missing_1.png" width="1200" height="750" alt="Navigation of whatismissing.org" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/what_is_missing_2.webp 1200w, assets/images/what_is_missing_2.png 1200w">
                  <source srcset="assets/images/what_is_missing_2_small.webp 600w, assets/images/what_is_missing_2_small.png 600w">
                  <img src="assets/images/what_is_missing_2.png" width="1200" height="750" alt="Greenprint overview of whatismissing.org" class="preview-img">
                </picture>
                <p class="project-title">What is missing? A Memorial to the Planet</p>
                <a href="#" class="view-project">>View project</a>
              </div>
            </li>

            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/dimorph_home.webp 1200w, assets/images/dimorph_home.png 1200w">
                  <source srcset="assets/images/dimorph_home_small.webp 600w, assets/images/dimorph_home_small.png 600w">
                  <img src="assets/images/dimorph_home.png" width="1200" height="750" alt="Dimorph Createive Web Studio landing page" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/dimorph_1.webp 1200w, assets/images/dimorph_1.png 1200w">
                  <source srcset="assets/images/dimorph_1_small.webp 600w, assets/images/dimorph_1_small.png  600w">
                  <img src="assets/images/dimorph_1.png " width="1200" height="750" alt="Dimorph work page" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/dimorph_2.webp  1200w, assets/images/dimorph_2.png  1200w">
                  <source srcset="assets/images/dimorph_2_small.webp  600w, assets/images/dimorph_2_small.png  600w">
                  <img src="assets/images/dimorph_2.png " width="1200" height="750" alt="Dimorph studio page" class="preview-img">
                </picture>
                <p class="project-title">Dimorph Creative Web Studio</p>
                <a href="#" class="view-project">>View project</a>
              </div>
            </li>

            <li>
              <div class="project">
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/celia_lopez_1.webp 1200w, assets/images/celia_lopez_1.png 1200w">
                  <source srcset="assets/images/celia_lopez_1_small.webp 600w, assets/images/celia_lopez_1_small.png 600w">
                  <img src="assets/images/celia_lopez_1.png" width="1200" height="750" alt="Célia Lopez projects page" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/celia_lopez_2.webp 1200w, assets/images/celia_lopez_2.png 1200w">
                  <source srcset="assets/images/celia_lopez_2_small.webp 600w, assets/images/celia_lopez_2_small.png 600w">
                  <img src="assets/images/celia_lopez_2.png" width="1200" height="750" alt="Célia Lopez everdays page" class="preview-img">
                </picture>
                <picture>
                  <source media="(min-width:760px)" srcset="assets/images/celia_lopez_3.webp 1200w, assets/images/celia_lopez_3.png 281200w48w">
                  <source srcset="assets/images/celia_lopez_3_small.webp 600w, assets/images/celia_lopez_3_small.png 600w">
                  <img src="assets/images/celia_lopez_3.png" width="1200" height="750" alt="Célia Lopez everydays preview" class="preview-img">
                </picture>
                <p class="project-title">Célia Lopez Interactive & 3D designer</p>
                <a href="#" class="view-project">>View project</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="autoplay-btn">
        <div class="toggle-container" aria-label="Autoplay button">
          <div class="toggle">
            <div class="toggle-btn"></div>
            <div class="toggle-text" aria-label="Autoplay is off">OFF</div>
            <div class="autoplay-text">Autoplay</div>
          </div>
        </div>
      </div>
      <a href="work.php" class="projects-button">VIEW PROJECTS</a>
    </section>
  </main>
  <?php include('includes/footer.inc.php'); ?>