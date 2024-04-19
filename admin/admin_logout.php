<?php
session_start();

// this unsets all session variables
$_SESSION = array();

// this destroys the session
session_destroy();

// this redirects to the admin login page
header("Location: admin_login.php");
exit();
?>