<?php
$companyName = $email = $mobileNo = $gstNo = $address = $state = $city = $pincode = $password = '';
$companyNameError = $emailError = $mobileNoError = $gstNoError = $addressError = $stateError = $cityError = $pincodeError = $passwordError = '';

$msge = '';
$msg = '';
$cu_name = $emails = $mobiles = $role = '';
$eid = $ecid = '';

if (isset($_GET['s'])) {
    $msg = "Update successfully";
}



if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];

    $query = "SELECT * FROM `awt_customer` WHERE `id` = '$eid'";
    $result = mysqli_query($sql, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $companyName = $row['company_name'];
        $email = $row['email'];
        $mobileNo = $row['mobile_no'];
        $gstNo = $row['gst_no'];
        $address = $row['address'];
        $state = $row['state'];
        $city = $row['city'];
        $pincode = $row['pincode'];
    }
}

if (isset($_GET['ecid'])) {
    $ecid = $_GET['ecid'];

    $query = "SELECT * FROM `awt_customer_no` WHERE `id` = '$ecid'";
    $result = mysqli_query($sql, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_object($result);
        $cu_name = $row->name;
        $emails = $row->email;
        $mobiles = $row->mobile;
        $role = $row->role;
        $ecid = $row->id;
    }
}


if (isset($_POST['contact_no'])) {
    $name = $_POST['name'];
    $emails = $_POST['email'];
    $mobiles = $_POST['mobiles'];
    $role = $_POST['role'];
    $eid = $_POST['eid'];
    $ecid = $_POST['ecid'];
    $ecid = '';
    if (!empty(isset($_POST['ecid']))) {
        $ecid = $_POST['ecid'];
    }

    if ($ecid == '') {
        $query=mysqli_query($sql ,"update `awt_customer_no` set  default_no = 1 where company_id = '$eid'");
        // echo "INSERT INTO `awt_customer_no`(`name`, `email`, `mobile`, `role`, `company_id`) VALUES ('$name','$emails','$mobiles','$role','$eid')";
        $query = "INSERT INTO `awt_customer_no`(`name`, `email`, `mobile`, `role`, `company_id`,`default_no`) VALUES ('$name','$emails','$mobiles','$role','$eid','0')";
        $result = mysqli_query($sql, $query);
        if ($result) {
            $msge = 'Contact Added Successfully';
        } else {
            $msge = 'Contact Not Added';
        }
    } else {
        $ecid = $_POST['ecid'];
        $query = "UPDATE `awt_customer_no` SET `name`='$name', `email`='$emails', `mobile`='$mobiles', `role`='$role' WHERE `id`='$ecid'";
        // echo $query;
        $result = mysqli_query($sql, $query);
        if ($result) {
            $msge = 'Contact Updated Successfully';
        } else {
            $msge = 'Contact Not Updated';
        }
    }
}

if (isset($_GET['dcid'])) {
    $dcid = $_GET['dcid'];
    $eid = $_GET['eid'];
    echo $eid;
    // $query = mysqli_query($sql,"select * from ");
    // $query = mysqli_query($sql,"update `awt_customer_no`set default_no = 1");
    $query = "update `awt_customer_no`set deleted = 1 WHERE `id`='$dcid'";
    $result = mysqli_query($sql, $query);
    if ($result) {
        $cmsg = 'Contact Deleted Successfully';
    } else {
        $cmsg = 'Contact Not Deleted';
    }
}


function makerow($sql, $eid)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_customer_no` WHERE `company_id` = '$eid' and `deleted` != 1 ");
    $x = 1;
    while ($listdata = mysqli_fetch_object($query1)) {
        $ecid = $dcid = $listdata->id;
        echo '
        <tr>
            <td>' . $x . '</td>
            <td>' . $listdata->name . '</td>
            <td>' . $listdata->mobile . '</td>';
        if ($listdata->default_no == 0) {
            echo '<td>
                    <label class="switch">
                        <input type="checkbox" class="status-toggle" data-id="' . $listdata->id . '" checked>
                        <span class="slider round"></span>
                    </label>
                 </td>';
        } else {
            echo '<td>
                    <label class="switch">
                        <input type="checkbox" class="status-toggle" data-id="' . $listdata->id . '">
                        <span class="slider round"></span>
                    </label>
                 </td>';
        }

        echo ' <td class=\"d-flex justify-content-between \">
                <a href=customer_master.php?&eid=' . $eid . '&ecid=' . $ecid . ' class="btn" style="padding:3px;color: black;"><i class="fas fa-edit"></i></a>
                <a href=customer_master.php?&eid=' . $eid . '&dcid=' . $dcid . ' class="btn" style="padding:3px;color: red;"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>';
        $x++;
    }
}

if (isset($_POST['submit'])) {
    $flag = true;

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = trim(mysqli_real_escape_string($sql, $_POST['password']));
        if (empty($password)) {
            $flag = false;
            $passwordError = "Password is required.gjhjhgfdsxbgcnhvb";
        }
        $password = md5($password);
    }

    $companyName = trim(mysqli_real_escape_string($sql, $_POST['companyName']));
    if (empty($companyName)) {
        $flag = false;
        $companyNameError = "Company Name is required.";
    }

    $email = trim(mysqli_real_escape_string($sql, $_POST['email']));
    if (empty($email)) {
        $emailError = "Email is required.";
        $flag = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
        $flag = false;
    }
    // Sanitize and validate mobile number
    $mobileNo = trim(mysqli_real_escape_string($sql, $_POST['mobileNo']));
    if (empty($mobileNo)) {
        $flag = false;
        $mobileNoError = "Mobile Number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $mobileNo)) {
        $flag = false;
        $mobileNoError = "Invalid mobile number format. It should be 10 digits.";
    }

    // Sanitize GST number
    $gstNo = trim(mysqli_real_escape_string($sql, $_POST['gstNo']));

    // Sanitize and validate address
    $address = trim(mysqli_real_escape_string($sql, $_POST['address']));
    if (empty($address)) {
        $flag = false;
        $addressError = "Address is required.";
    }

    // Sanitize and validate state
    $state = trim(mysqli_real_escape_string($sql, $_POST['state']));
    if (empty($state)) {
        $flag = false;
        $stateError = "State is required.";
    }

    // Sanitize and validate city
    $city = trim(mysqli_real_escape_string($sql, $_POST['city']));
    if (empty($city)) {
        $flag = false;
        $cityError = "City is required.";
    }

    // Sanitize and validate pincode
    $pincode = trim(mysqli_real_escape_string($sql, $_POST['pincode']));
    if (empty($pincode)) {
        $flag = false;
        $pincodeError = "Pincode is required.";
    } elseif (!preg_match("/^[0-9]{6}$/", $pincode)) {
        $flag = false;
        $pincodeError = "Invalid pincode format. It should be 6 digits.";
    }

    $eid = $_POST['eid'];
    // Check if there are no errors
    if ($flag == true) {
        $query = "UPDATE `awt_customer` SET
        `company_name` = '$companyName',
        `email` = '$email',
        `mobile_no` = '$mobileNo',
        `gst_no` = '$gstNo',
        `address` = '$address',
        `state` = '$state',
        `city` = '$city',
        `pincode` = '$pincode',
        `password` = '$password'
        WHERE `id` = '$eid'";
        echo $query;
        if (mysqli_query($sql, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($sql);
        }

        echo '<script type="text/javascript">window.location.href="customer_master.php?&eid=' . $eid . '&s=1";</script>';
    }
}


function state($sql,$state){
  echo $state;
  $query =mysqli_query($sql , "Select * from `awt_states` ");
  while ($listdata=mysqli_fetch_object($query)) {
    echo '<option value="'. $listdata->id .'"' ;
    if ($state==$listdata->id) {
      echo "selected";
    }
    echo '>'. $listdata->name .'</option>';
  }
}

function getrow($sql,$eid){
  $query = mysqli_query($sql, "SELECT * FROM `awt_project` where companyName = '$eid'");
  $x = 1 ;
  while ($listadata = mysqli_fetch_object($query)) {
    $status = $listadata->status;
    if ($status == 0) {
        $status = "Pending..";
        // $color = "style='color: red;'";
    } else if ($status == 1) {
        $status = "Process..";
    } else if ($status == 2) {
        $status = "Completed";
    }
    echo '<tr>
      <td class="text-center"><div class="col-md-12">'. $x .'</div></td>
      <td>
        <div class="d-flex justify-content-between align-items-center">
          <img src="assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" />
          <div class="col-md-12">'. $listadata->projecttitle .'</div>
        </div>
      </td>
      <td><div class="col-md-12">'. $status .'</div></td>
    </tr>';
    $x++;
  }
}
