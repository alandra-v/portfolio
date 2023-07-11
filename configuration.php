<?php
// --------------------------
// base URL configuration
// --------------------------

define('BASE_URL', 'https://selinav.mywdd.info/');

// ----------------------
// session configuration
// ----------------------

define('CONFIG_SESSION_NAME', 'chocolatechipcookie');
define('CONFIG_SESSION_LIFETIME', 1800);

// ----------------------
// database configuration
// ----------------------

define('DB_NAME', 'selinav'); // Database name
define('DB_SERVER', 'localhost'); // Database host
define('DB_USER', 'selinav'); // Database root
define('DB_PASSWORD', 'Fere588&'); // Database password
// --------------------------
// image upload configuration
// --------------------------

define('TARGET_DIR', '../../assets/images/uploads'); // Target directory
// WEBP will be allowed as soon as multiple image upload is possible to support picture tag
define('ALLOWED_MIME_TYPES', ['image/jpeg', 'image/png', 'image/svg']); // Allowed MIME types
// WEBP will be allowed as soon as multiple image upload is possible to support picture tag
define('ALLOWED_EXTENSIONS', ['png', 'jpg', 'jpeg', 'svg']); // Allowed file extensions
define('MAX_FILE_SIZE', 3000000);  // Max. allowed file size
