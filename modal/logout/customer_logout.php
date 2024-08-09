<?php
session_start();
$_SESSION['customer_id'] ='';

session_unset();
session_destroy();

echo '<script> window.location.href="../../customer_login.php"</script> ';
