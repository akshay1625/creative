<?php
session_start();
$_SESSION['user_id'] = '';
$_SESSION['user_role'] = ''; // added closing single quote

session_unset();
session_destroy();
echo '<script> window.location.href="../../index.php"</script> ';
