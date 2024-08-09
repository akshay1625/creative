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
        $query = "SELECT * FROM `awt_admin` WHERE `email_id` = '$email'  AND `password` = '$password' and `status`!= 1 and `role` != 1";
        echo $query ;
        $result = mysqli_query($sql, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = 2;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            echo '<script type="text/javascript">window.location.href="task_master_user.php";</script>';
        } else {
            echo '<script type="text/javascript">window.location.href="user_login.php?e=1";</script>';
        }
    } else {
        echo '<script type="text/javascript">window.location.href="user_login.php?n=1";</script>';
    }
}
