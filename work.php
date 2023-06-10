<?php
require_once("includes/head_data.php");
require_once("includes/nav_data.php");
include("includes/head.inc.php");
?>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include('includes/navigation.inc.php'); ?>
  </header>
  <main id="main">
    <h1>Projects</h1>
    <hr class="parting-line">
    <div class="layout">
      <div class="project project-aebele">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/aebele_home.webp 1200w,
                          assets/images/aebele_home.png 1200w">
          <source srcset="assets/images/aebele_home_small.webp 600w,
                          assets/images/aebele_home_small.png 600w">
          <img src="assets/images/aebele_home.png" width="1200" height="758" alt="Landing page Aebele interiors" class="thumbnail aebele-thumbnail">
        </picture>
        <div class="title">
          <h2>Aebele</h2>
          <a href="project_aebele_interiors.php" class="view-project" aria-label="Take a closer look at the Aebele project">>View project</a>
        </div>
      </div>
      <div class="project">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/mikks_home.webp 1200w,
                          assets/images/mikks_home.png 1200w">
          <source srcset="assets/images/mikks_home_small.webp 600w,
                          assets/images/mikks_home_small.png 600w">
          <img src="assets/images/mikks_home.png" width="1200" height="758" alt="Landing page Mikks all natural drink mixers" class="thumbnail">
        </picture>
        <div class="title">
          <h2>Mikks</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the Mikks project">>View project</a>
        </div>
      </div>
      <div class="project project-hyer">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/hyer_home.webp 1200w,
                          assets/images/hyer_home.png 1200w">
          <source srcset="assets/images/hyer_home_small.webp 600w,
                          assets/images/hyer_home_small.png 600w">
          <img src="assets/images/hyer_home.png" width="1200" height="758" alt="Landing page Hyer personalised aviation" class="thumbnail">
        </picture>
        <div class="title title-hyer ">
          <h2>Hyer</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the Hyer project">>View project</a>
        </div>
      </div>
      <div class="project">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/princeton_home.webp 1200w,
                          assets/images/princeton_home.png 1200w">
          <source srcset="assets/images/princeton_home_small.webp 600w,
                          assets/images/princeton_home_small.png 600w">
          <img src="assets/images/princeton_home.png" width="1200" height="758" alt="Landing page Princeton computational imaging lab" class="thumbnail">
        </picture>
        <div class="title">
          <h2>Princeton</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the Princeton project">>View project</a>
        </div>
      </div>
      <div class="project project-ggg">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/gravityglobalgroup_home.webp 1200w,
                          assets/images/gravityglobalgroup_home.png 1200w">
          <source srcset="assets/images/gravityglobalgroup_home_small.webp 600w,
                          assets/images/gravityglobalgroup_home_small.png 600w">
          <img src="assets/images/gravityglobalgroup_home.png" width="1200" height="758" alt="Landing page gravity global group" class="thumbnail ggg-thumbnail">
        </picture>
        <div class="title">
          <h2>Gravity Global</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the Gravity Global project">>View
            project</a>
        </div>
      </div>
      <div class="project">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/what_is_missing_home.webp 1200w,
                          assets/images/what_is_missing_home.png 1200w">
          <source srcset="assets/images/what_is_missing_home_small.webp 600w,
                          assets/images/what_is_missing_home_small.png 600w">
          <img src="assets/images/what_is_missing_home.png" width="1200" height="750" alt="Landing page what is missing" class="thumbnail">
        </picture>
        <div class="title">
          <h2>What is missing? <br> A Memorial to the Planet</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the what is missing project">>View
            project</a>
        </div>
      </div>
      <div class="project project-dimorph">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/dimorph_home.webp 1200w,
                          assets/images/dimorph_home.png 1200w">
          <source srcset="assets/images/dimorph_home_small.webp 600w,
                          assets/images/dimorph_home_small.png 600w">
          <img src="assets/images/dimorph_home.png" width="1200" height="750" alt="Landing page dimorph" class="thumbnail">
        </picture>
        <div class="title title-dimorph">
          <h2>Dimorph Creative Web Studio</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the dimorph project">>View project</a>
        </div>
      </div>
      <div class="project">
        <picture>
          <source media="(min-width: 770px)" srcset="assets/images/celia_lopez_1.webp 1200w,
                          assets/images/celia_lopez_1.png 1200w">
          <source srcset="assets/images/celia_lopez_1_small.webp 600w,
                          assets/images/celia_lopez_1_small.png 600w">
          <img src="assets/images/celia_lopez_1.png" width="1200" height="750" alt="Landing page célia lopez portfolio" class="thumbnail">
        </picture>
        <div class="title">
          <h2>Célia Lopez Interactive & 3D designer</h2>
          <a href="#" class="view-project" aria-label="Take a closer look at the célia lopez portfolio project">>View
            project</a>
        </div>
      </div>
    </div>
  </main>
  <?php include('includes/footer.inc.php'); ?>