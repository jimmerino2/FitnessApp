<?php
session_start();  // Start the session

// Remove session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: ../index.php");
exit();
