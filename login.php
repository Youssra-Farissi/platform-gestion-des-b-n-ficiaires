<?php
// Start a session if not already started
session_start();

// Destroy the session and redirect to login page
session_destroy();
header("Location: index.php"); // Change to your login page URL
exit;
?>
