<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();


header('Location: http://www.iessineu.net/QR/login.php');

exit;
?>