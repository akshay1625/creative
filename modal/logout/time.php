<?php
session_start();

// Check if it's a new day
if (isset($_SESSION['last_reset']) && date('Ymd') != date('Ymd', $_SESSION['last_reset'])) {
    // New day, reset session
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
    echo '<script> window.location.href="index.php"</script> ';
}

// Update last reset timestamp
$_SESSION['last_reset'] = time();

?>