<?php
require_once('admin/Controller/ProjectRead.php');

$DataProjects = new ProjectRead();
$Response = [];
$Projects = $DataProjects->getCompletedProjectsWork();

include(__DIR__ . '/includes/head.inc.php');
?>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include(__DIR__ . '/includes/navigation.inc.php'); ?>
  </header>
  <main id="main">
    <h1>Projects</h1>
    <hr class="parting-line">
    <div class="layout">
      <?php foreach ($Projects as $project) : ?>
        <div class="project">
          <?php foreach ($project['images'] as $image) : ?>
            <picture>
              <source media="(min-width: 770px)" srcset="assets/images/uploads/<?= $image['img_webp'] ?> 1200w,
          assets/images/uploads/<?= $image['img'] ?> 1200w">
              <source srcset="assets/images/uploads/<?= $image['img_small_webp'] ?> 600w,
          assets/images/uploads/<?= $image['img_small'] ?> 600w">
              <img src="assets/images/uploads/<?= $image['img'] ?>" width="1200" height="758" alt="<?= $image['img_alt_text'] ?>" class="thumbnail">
            </picture>
          <?php endforeach; ?>

          <div class="title">
            <h2><?= $project['project_title'] ?></h2>
            <a href="project?id=<?= $project['project_id'] ?>" class="view-project" aria-label="Take a closer look at the <?= $project['project_title'] ?> project">>View project</a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </main>
  <?php include(__DIR__ . '/includes/footer.inc.php'); ?>