<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION["loggedin"] = false;
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);   
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>