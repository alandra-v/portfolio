<?php
// -------------------------
// environment configuration
// -------------------------

$locale = 'de_DE';
$timezone = 'CET';
$dateType = IntlDateFormatter::FULL;
$timeType = IntlDateFormatter::FULL;
$calendar = IntlDateFormatter::GREGORIAN;

// ----------------------
// session configuration
// ----------------------

define('CONFIG_SESSION_NAME', 'chocolatechipcookie');
define('CONFIG_SESSION_LIFETIME', 1800);

// ----------------------
// database configuration
// ----------------------

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root'); // when using XAMPP leaver empty '' when using MAMP enter 'root'
define('DB_NAME', 'portfolio_admin');
