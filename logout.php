<?php
require_once('connection.php');
// Start the session
session_start();

// Unset all of the session variables
$email  =   $_SESSION['email'] ;

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: signup.php");
exit;
?>