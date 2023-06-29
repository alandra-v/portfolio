<nav class="sidebar">
  <div class="logo-details">
    <img src="<?= BASE_URL . '/assets/icons/avd_logo.svg' ?>" width="200" height="100" alt="Alandra Villalaz Development logo" class="avd-logo-nav">
    <i class="fa-solid fa-bars sidebar-toggle sidebar-toggle-desktop"></i>
  </div>
  <ul class="nav-list">
    <?php
    foreach ($navArray as $main) :
    ?>
      <li>
        <span class="tooltip"><?= $main['title']; ?></span>
        <!-- gives a tag class submenu-title if submenu -->
        <a href="<?= $main['link']; ?>" class="<?= (!empty($main['subnav'])) ? 'submenu-title' : '' ?>" <?= ($currentPage == $main['link']) ? 'active' : ''; ?>>
          <i class="<?= $main['icon']; ?>"></i>
          <span class="links_name"><?= $main['title']; ?></span>
          <?= (!empty($main['subnav'])) ? '<i class="fa-solid fa-chevron-right drop-down-icon" aria-label="drop down"></i>' : '' ?>
        </a>
        <?php
        if (!empty($main['subnav'])) :
          echo '<ul class="submenu">';
          foreach ($main['subnav'] as $sub) :
        ?>
      <li class="submenu-item">
        <a href="<?= $sub['link']; ?>" <?php if ($currentPage == $sub['link']) {
                                          echo 'active';
                                        } ?>>
          <span class="links_name"><?= $sub['title']; ?></span>
        </a>
      </li>
    <?php endforeach;
          echo '</ul>' ?>
  <?php endif; ?>
  </li>
<?php
    endforeach;
?>
</li>
  </ul>
</nav>
<div class="navbar">
  <!-- NOTE -->
  <!-- breadcrumb navigation will be implemented at a later stage -->
  <ol class="breadcrumb-nav">
    <li>
      <a href="#">
        <h1><?= $pageTitle[$currentPage] ?></h1>
      </a>
    </li>
  </ol>

  <div class="navbar-content">
    <i class="fa-solid fa-bars sidebar-toggle sidebar-toggle-mobile" aria-label="open sidebar-navigation"></i>
    <?php foreach ($navBarArray as $navbar) : ?>
      <a href="<?= $navbar['link']; ?>" aria-label="<?= $navbar['title']; ?>">
        <i class="<?= $navbar['icon']; ?>"></i>
      </a>
    <?php
    endforeach;
    ?>
    <i class="fa-solid fa-user active-admin-toggle" aria-label="information about logged in user"></i>
    <div class="active-admin-quicknav">
      <span><?= htmlspecialchars($_SESSION['data']['user_name']) . " is logged in" ?></span>
      <hr class="active-admin-separator">
      <a href="../user/account_settings" class="hover">Account settings</a>
      <div class="profile-logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <a href="../logout">Logout</a>
      </div>
    </div>
  </div>
</div>