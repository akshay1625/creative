<?php
$firstName = $lastName = $emailId = $mobileNo = $password=$npassword = $pimg = $role = '';
$firstNameError  = $lastNameError = $roleError = $emailIdError = $mobileNoError = $passwordError = $pimgError = $reporttoError = '';
$msg = '';
$eid = '';
$id = '';
$profile_icon = '';
$filepath = '';

$path = "upload/profile_img/";

$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "JPG", "PNG", "GIF", "BMP", "JPEG", "SVG", "svg", "JFIF", "jfif", "WEBP", "webp", "mp4", "webm", "ogg", "PDF", "pdf");
$allok = true;
$mdpss = '';
$filepath = '';
$reportto = '';
if (isset($_GET['s'])) {
    $msg = "New record created successfully";
}
if (isset($_GET['d'])) {
    $msg = "User Deleted";
}
if (isset($_GET['e'])) {
    $msg = "User Updated";
}
if (isset($_GET['u'])) {
    $msg = "Error uploading file";
}
if (isset($_GET['o'])) {
    $msg = "Invalid file format";
}

// this is something

if (!file_exists('upload')) {
    mkdir('upload', 0777, true);
}
if (!file_exists('upload/profile_img/')) {
    mkdir('upload/profile_img/', 0777, true);
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $emailId = $_POST['emailId'];
    $role = $_POST['role'];
    $mobileNo = $_POST['mobileNo'];
    $eid = $_POST['eid'];
    $mdpss = $_POST['mdpss'];
    $npassword = $_POST['password'];
    $password = md5($npassword);
    $reportto = $_POST['reportto'];

    $date = date("y-M-d h:i:s");


    if (empty($firstName)) {
        $firstNameError = "Please Enter the firstName";
        $allok = false;
    }
    if (empty($lastName)) {
        $lastNameError = "Please Enter the lastName";
        $allok = false;
    }
    if (empty($emailId)) {
        $emailIdError = "Please Enter the emailId";
        $allok = false;
    }
    if (empty($role)) {
        $roleError = "Please Enter the role";
        $allok = false;
    }
    if (empty($mobileNo)) {
        $mobileNoError = "Please Enter the mobileNo";
        $allok = false;
    }
    if (empty($password)) {
        $passwordError = "Please Enter the password";
        if (!empty($eid))
            $allok = false;
    }
    if (empty($eid)) {
        $query = mysqli_query($sql, "Select * from `awt_admin` where deleted != 1 and (`email_id` = '$emailId' or `mobile_no` = '$mobileNo')");

        $row = mysqli_num_rows($query);

        if ($row == 0) {
            $allok = true;
        } else {
            if (mysqli_num_rows(mysqli_query($sql, "Select * from `awt_admin` where deleted != 1 and `email_id` = '$emailId'")) > 0) {
                $emailIdError = "email is already exist";
            } elseif (mysqli_num_rows(mysqli_query($sql, "Select * from `awt_admin` where deleted != 1 and `mobile_no` = '$mobileNo'")) > 0) {
                $mobileNoError = "mobile no is already exist";
            }
            $allok = false;
        }
    }

    $filename = $_FILES['pimg']['name'];

    if ($filename != '') {
        list($name, $ext) = explode(".", $filename);
        // echo "workimg";
        if (in_array($ext, $valid_formats)) {
            $upload_filename = time() . "-" . $filename;
            $tmp = $_FILES['pimg']['tmp_name'];
            move_uploaded_file($tmp, $path . $upload_filename);
            // echo "work";
        }
        $filepath = $upload_filename;
    } else {
        $filepath = $_POST['filepath'];
    }

    if ($allok) {
        if (empty($eid)) { // Insert new record
            // Database connection

            $query = "INSERT INTO `awt_admin`(`first_name`, `role`, `last_name`, `email_id`, `mobile_no`, `password`, `reportingto`,`profile_icon`, `created_at`)  VALUES ('$firstName', '$role', '$lastName', '$emailId', '$mobileNo', '$password','$reportto', '$filepath', '$date')";
            $result = mysqli_query($sql, $query);

            if ($result) {
                echo '<script type="text/javascript">window.location.href="user_master.php?s=1";</script>';
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($sql);
            }
        } else { // Update existing record

            if (empty($npassword)) {
                // Update other fields
                $query = "UPDATE `awt_admin` SET `first_name` = '$firstName', `last_name` = '$lastName', `email_id` = '$emailId', `mobile_no` = '$mobileNo', `password`='$mdpss', `role` = '$role',`created_at` = '$date'  , `profile_icon` = '$filepath' , `reportingto` = '$reportto' WHERE `id` = '$eid'";
                // echo $query;
            } else {
                $query = "UPDATE `awt_admin` SET `first_name` = '$firstName', `last_name` = '$lastName', `email_id` = '$emailId', `mobile_no` = '$mobileNo',`password` = '$password', `role` = '$role',`created_at` = '$date' , `profile_icon` = '$filepath' , `reportingto` = '$reportto' WHERE `id` = '$eid'";
                // echo $query;
            }

            $result = mysqli_query($sql, $query);

            if ($result) {
                // echo '<script type="text/javascript">window.location.href="user_master.php?e=1";</script>';
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($sql);
            }
        }
    }

    // Display error message if any
    if (!empty($msg)) {
        echo $msg;
    }
}





/////
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $query = mysqli_query($sql, "update `awt_admin` set `deleted = 1  WHERE `id` = '$id'");
    if ($query) {
        echo '<script type="text/javascript">window.location.href="user_master.php?d=1";</script>';
    }
}

if (isset($_GET['eid']) || isset($_GET['id'])) {
    $id = $_GET['eid'] ?? $_GET['id'];
    $query = mysqli_query($sql, "SELECT * FROM `awt_admin` WHERE `id` = '$id'");
    $row = mysqli_fetch_object($query);
    $firstName = $row->first_name;
    $lastName = $row->last_name;
    $emailId = $row->email_id;
    $mobileNo = $row->mobile_no;
    $role = $row->role;
    $reportto = $row->reportingto;
    $filepath = $row->profile_icon;
    $mdpss = $row->password;
    // echo $reportto;
}



//     <tr>
//     <td>John Doe</td>
//     <td>john.doe@example.com</td>
//     <td>1234567890</td>
//     <td>Admin</td>
//     <td>

//     </td>
//     <td class="d-flex">
//
//     </td>
// </tr>

function role($sql, $role)
{
    $query = mysqli_query($sql, "Select * from awt_role where deleted != 1 ;");
    if (mysqli_num_rows($query) > 0) {
        echo '<option value="" >Select role</option>';
        while ($listdata = mysqli_fetch_object($query)) {
            $roles = $listdata->id;
            if ($role == $roles) {
                echo '<option value="' . $listdata->id . '" selected >' . $listdata->title . '</option>';
            } else {
                echo '<option value="' . $listdata->id . '" >' . $listdata->title . '</option>';
            }
        }
    }
}
function reportto($sql, $reportto)
{
    echo $reportto;
    $query = mysqli_query($sql, "Select * from awt_admin where deleted != 1 ;");
    if (mysqli_num_rows($query) > 0) {
        echo '<option value="" >Select Maneger</option>';
        while ($listdata = mysqli_fetch_object($query)) {
            $roles = $listdata->id;
            if ($reportto == $roles) {
                echo '<option value="' . $listdata->id . '" selected >' . $listdata->first_name . ' ' . $listdata->last_name . '</option>';
            } else {
                echo '<option value="' . $listdata->id . '" >' . $listdata->first_name . ' ' . $listdata->last_name . '</option>';
            }
        }
    }
}
function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_admin` WHERE  `deleted` != 1 ");

    $x = 1;
    mysqli_data_seek($query1, 1);
    while ($listdata = mysqli_fetch_object($query1)) {
        echo '<tr>';
        echo '<td class="text-left">' . $listdata->first_name  . ' ' . $listdata->last_name . '</td>';
        echo '<td class="text-left">' . $listdata->email_id  . '</td>';
        echo '<td class="text-left">' . $listdata->mobile_no  . '</td>';
        $query = mysqli_query($sql, "select * from `awt_role` where `deleted` != 1 and id = '$listdata->role'");
        $listdata1 = mysqli_fetch_object($query);
        $role = $listdata1->title;
        echo '<td class="text-left">' . $role  . '</td>';

        if ($listdata->status == 0) {
            echo '<td class="text-left">
                    <label class="switch">
                        <input type="checkbox" class="status-toggle" data-id="' . $listdata->id . '" checked>
                        <span class="slider round"></span>
                    </label>
                 </td>';
        } else {
            echo '<td class="text-left">
                    <label class="switch">
                        <input type="checkbox" class="status-toggle" data-id="' . $listdata->id . '">
                        <span class="slider round"></span>
                    </label>
                 </td>';
        }


        echo '<td class="text-left"> <a class="btn" href="user_master.php?eid=' . $listdata->id . '"  style="color: black;  "><i class="fas fa-edit"></i></a>
                   <a class="btn" href="user_master.php?did=' . $listdata->id . '"  style="color: red; "><i class="fas fa-trash-alt"></i></a></td>';
        echo '</tr>';
        $x++;
    }
}
