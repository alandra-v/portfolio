<?php

$currentPage = basename($_SERVER['PHP_SELF']);

/* navigation elements */

$navArray = array(
  array(
    'link' => 'index.php',
    'title' => 'Home'
  ),
  array(
    'link' => 'services.php',
    'title' => 'Services'
  ),
  array(
    'link' => 'work.php',
    'title' => 'Work'
  ),
  array(
    'link' => 'about.php',
    'title' => 'About'
  ),
  array(
    'link' => 'contact.php',
    'title' => 'Contact'
  )
);

$legalsArray = array(
  array(
    'link' => 'legal_disclosure.php',
    'title' => 'Legal disclosure'
  ),
  array(
    'link' => 'privacy_policy.php',
    'title' => 'Privacy policy'
  )
);
