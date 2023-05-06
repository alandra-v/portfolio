<nav>
  <a href="index.php" class="avd-logo" aria-label="Home"><img src="assets/icons/avd_logo_black.svg" class="avd-logo-svg" width="200" height="100" alt="Alandra Villalaz Development logo"></a>
  <button class="burger-nav" aria-label="Open the navigation">
    <span class="burger"></span>
    <span class="burger"></span>
    <span class="burger"></span>
    <span class="burger"></span>
  </button>
  <div class="overlay-menu">
    <ul class="overlay-content">
      <?php
      foreach ($navArray as $main) {
      ?>
        <li><a href="<?php echo $main['link']; ?>" <?php if ($currentPage == $main['link']) {
                                                      echo 'active';
                                                    } ?>><?php echo $main['title']; ?></a></li>
      <?php
      }
      ?>
      <ul class="small-menu">
        <?php
        foreach ($legalsArray as $main) {
        ?>
          <li><a href="<?php echo $main['link']; ?>" <?php if ($currentPage == $main['link']) {
                                                        echo 'active';
                                                      } ?>><?php echo $main['title']; ?></a></li>
        <?php
        }
        ?>
      </ul>
      </li>
      <li><button class="dark-mode-switch" aria-label="Switch to dark mode"><img src="assets/icons/dark_mode_switch.svg" width="50" height="50" alt=""></button></li>
      <li><button class="language-switch-menu" aria-label="Change the language to german">EN &#10072; DE</button>
      </li>
    </ul>
  </div>
  <ul class="nav-switches">
    <li><button class="theme-switch" aria-label="Switch to dark mode"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 41.81 58.22">
          <path stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M40.81 29.11c0 15.53-12.58 28.11-28.11 28.11-3.46 0-6.77-.63-9.84-1.77 10.68-3.99 18.27-14.27 18.27-26.34S13.55 6.76 2.86 2.77C5.92 1.63 9.24 1 12.7 1c15.53 0 28.11 12.58 28.11 28.11Z" />
        </svg></button></li>
    <li><button class="language-switch-header" aria-label="Change the language to german">EN &#10072; DE</button>
    </li>
  </ul>
  <ul class="site-nav">
    <?php
    foreach ($navArray as $main) {
    ?>
      <li><a href="<?php echo $main['link']; ?>" <?php if ($currentPage == $main['link']) {
                                                    echo 'active';
                                                  } ?>><?php echo $main['title']; ?></a></li>
    <?php
    }
    ?>
  </ul>
</nav>