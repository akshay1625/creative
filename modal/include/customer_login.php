<?php
$msg  = '';
$empty =true ;
if (isset($_GET['e'])) {
    $msg = "Your email or password is incorrect";
}

if (isset($_GET['n'])) {
    $msg = "Enter Your email or password ";
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $empty = false;
    }

    if(empty($password)){
        $empty = false;
    }
    $password=md5($password);
    //write a script to verify user id and pass from data `awt_admin`
    if ($empty) {
        $query = "SELECT * FROM `awt_customer` WHERE `email` = '$email'  AND `password` = '$password'";
        // echo $query;
        $result = mysqli_query($sql, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_object($result);
            $_SESSION['id'] = 3;
            $_SESSION['customer_id'] = $row->id;
            echo '<script type="text/javascript">window.location.href="task_master_customer.php";</script>';
        } else {
            echo '<script type="text/javascript">window.location.href="customer_login.php?e=1";</script>';
        }
    } else {
        echo '<script type="text/javascript">window.location.href="customer_login.php?n=1";</script>';
    }
}
