<?php

$currentPage = basename($_SERVER['PHP_SELF']);

/* navigation elements */

$navArray = array(
  array(
    'link' => '../dashboard/index',
    'icon' => 'fa-solid fa-chart-line nav-icon',
    'title' => 'Dashboard'
  ),
  array(
    'link' => '../media_library/media_library',
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
        'link' => '../projects/projects_read',
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
    'link' => '../contacts/contacts_read',
    'icon' => 'fa-regular fa-address-book nav-icon',
    'title' => 'Contacts'
  ),
  array(
    'link' => '../user/user_read',
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
    'link' => '../user/account_settings',
    'icon' => 'fa-solid fa-gear nav-icon',
    'title' => 'Settings'
  ),
  array(
    'link' => '../logout',
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
