<?php

$currentPage = basename($_SERVER['PHP_SELF']);

/* navigation elements */

$navArray = array(
  array(
    'link' => 'index.php',
    'icon' => 'fa-solid fa-chart-line nav-icon',
    'title' => 'Dashboard'
  ),
  array(
    'link' => 'media_library.php',
    'icon' => 'fa-solid fa-photo-film nav-icon',
    'title' => 'Media library'
  ),
  // subnavigation
  array(
    'link' => '#',
    'icon' => 'fa-solid fa-file-pen nav-icon',
    'title' => 'Content',
    'subnav' => array(
      array(
        'link' => 'projects_read.php',
        'title' => 'Projects'
      ),
      // NOTE
      // This page will be implemented at a later stage
      array(
        'link' => '#',
        'title' => 'Services'
      )
    )
  ),
  array(
    'link' => 'contacts_read.php',
    'icon' => 'fa-regular fa-address-book nav-icon',
    'title' => 'Contacts'
  ),
  array(
    'link' => 'user_read.php',
    'icon' => 'fa-solid fa-user nav-icon',
    'title' => 'User'
  ),
  // NOTE
  // This page will be implemented at a later stage
  array(
    'link' => '#',
    'icon' => 'fa-solid fa-puzzle-piece nav-icon',
    'title' => 'Plugins'
  ),
  array(
    'link' => 'account_settings.php',
    'icon' => 'fa-solid fa-gear nav-icon',
    'title' => 'Settings'
  ),
  array(
    'link' => 'logout.php',
    'icon' => 'fa-solid fa-arrow-right-from-bracket',
    'title' => 'Logout'
  ),
);

$navBarArray = array(
  // NOTE
  // This page will be implemented at a later stage
  array(
    'link' => '#',
    'icon' => 'fa-solid fa-inbox',
    'title' => 'Notifications'
  )
);
