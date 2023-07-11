<?php


require_once('admin/Controller/ProjectRead.php');

$DataProjects = new ProjectRead();
$Response = [];
$Project = $DataProjects->getCompletedProject($_GET['id']);

include(__DIR__ . '/includes/head.inc.php');

// echo '<pre>';
// print_r($Project);
// echo '</pre>';
?>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include(__DIR__ . '/includes/navigation.inc.php'); ?>
  </header>
  <main id="main">
    <section class="hero-section">

      <?php foreach ($Project['images'] as $index => $image) : ?>
        <picture>
          <source media="(min-width:760px)" srcset="assets/images/uploads/<?= $image['img_webp'] ?> 1200w, assets/images/uploads/<?= $image['img'] ?> 1200w">
          <source srcset="assets/images/uploads/<?= $image['img_small_webp'] ?> 600w, assets/images/uploads/<?= $image['img_small'] ?> 600w">
          <img src="assets/images/uploads/<?= $image['img'] ?>" width="1200" height="758" alt="<?= $image['img_alt_text'] ?>" class="hero img-<?= ($index === 0) ? '0' : '1' ?>">
        </picture>
      <?php endforeach; ?>

      <div class="logo-positioning-container">
        <div class="title">
          <div class="project-title">
            <h1><?= $Project['project_title'] ?></h1>
            <hr>
            <p><?= $Project['project_year'] ?></p>
          </div>
          <a class="visit-website" href="<?= $Project['project_link'] ?>" target="blank">>Visit website</a>
        </div>
        <?php if ($Project['project_logo']) : ?>
          <picture class="logo">
            <!-- NOTE -->
            <!-- Different logo formats for responsive design will be implemented at a later stage -->
            <source media="(min-width:1000)" srcset="assets/images/uploads/<?= $Project['project_logo'] ?> 200w,
                          assets/images/uploads/<?= $Project['project_logo'] ?> 200w">
            <source srcset="assets/images/uploads/<?= $Project['project_logo'] ?> 100w,
                          assets/images/uploads/<?= $Project['project_logo'] ?> 100w">
            <img src="assets/images/uploads/<?= $Project['project_logo'] ?>" alt="<?= $Project['project_logo_alt_text'] ?>" width="200" height="163" class="logo">
          </picture>
        <?php endif; ?>
      </div>
    </section>
    <div class="computer-frame">
      <iframe title="<?= $Project['project_title'] ?>" class="computer" src="<?= $Project['project_link'] ?>" frameborder="0" width="580" height="180"></iframe>
    </div>
    <div class="mobile-frame">
      <iframe title="<?= $Project['project_title'] ?>" class="mobile" src="<?= $Project['project_link'] ?>" frameborder="0" width="200" height="400"></iframe>
    </div>
    <div class="buttons">
      <a href="contact" class="contact-button">LET'S TALK</a>
      <a href="work" class="back-button">>Back to overview</a>
    </div>
  </main>
  <?php include(__DIR__ . '/includes/footer.inc.php'); ?>