<?php
// logout.php
session_start();
session_unset();
session_destroy();
header("Location: \Restaurant Management\Flavour Fleet\signup\login.html"); // Redirect to login page
exit();
?>