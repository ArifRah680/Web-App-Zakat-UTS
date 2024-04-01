<?php
// Start the session
session_start();

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// JavaScript alert
echo '<script>alert("Logged out successfully!");</script>';

// Redirect to the homepage
echo '<script>window.location.href = "../homepage/index.php";</script>'; // Change index.php to the homepage URL
exit();
?>
