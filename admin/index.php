<?php
require_once("includes/admin_head_data.php");
require_once("includes/admin_head.inc.php");

require_once('../configuration.php');
// nav und oder head daten einbinden mit require once

session_name(CONFIG_SESSION_NAME);
session_start();

//VAR DUMP instead of echo/print
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

// echo "Welcome to the admins's area, " . htmlspecialchars($_SESSION['username']) . "!";

require_once('includes/cms/session_check.php');
?>

<body>
  <h1>HOLAA</h1>
  <a href="logout.php">abmelden</a>
</body>

</html>