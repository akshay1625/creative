<?php
session_start();
$_SESSION['admin_id'] = '';
$_SESSION['admin_role'] = ''; // added closing single quote
session_unset();
session_destroy();

echo '<script> window.location.href="../../index.php"</script> ';
