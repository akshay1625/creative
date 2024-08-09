<?php
include('../config.php');

if (isset($_POST['userid'])) {
  $userid = $_POST['userid'];

  $query = mysqli_query($sql, "Select * from `awt_admin` where `id` = '$userid'");
  $listdata = mysqli_fetch_object($query);
  if ($listdata->status == 0)
    $query = mysqli_query($sql, "update `awt_admin` set `status` = '1' where `id` = '$userid' ");

  else
    $query = mysqli_query($sql, "update `awt_admin` set `status` = '0' where `id` = '$userid' ");
}


if (isset($_POST['default_no'])) {
  $default_no = $_POST['default_no'];

  $query = mysqli_query($sql, "Select * from `awt_customer_no` where `id` = '$default_no'");
  $listdata = mysqli_fetch_object($query);
  if ($listdata->default_no == 1) {
    $query = mysqli_query($sql, "update `awt_customer_no` set `default_no` = '0' where `id` = '$default_no' ");
    echo "update `awt_customer_no` set `default_no` = '0' where `id` = '$default_no'";
  } else {
    echo "update `awt_customer_no` set `default_no` = '1' where `id` = '$default_no'";
    $query = mysqli_query($sql, "update `awt_customer_no` set `default_no` = '1' where `id` = '$default_no' ");
  }
}

if (isset($_POST['email'])) {
  $row = 0;
  $email = $_POST['email'];
  $query = mysqli_query($sql, "Select * from `awt_admin` where `email_id` = '$email' and deleted !=1");
  $row = mysqli_num_rows($query);
  if ($row == 0) {
    echo '0';
  } else {
    echo '1';
  }
}




if (isset($_POST['mobileNo'])) {
  $row = 0;
  $mobileNo = $_POST['mobileNo'];
  $query = mysqli_query($sql, "Select * from `awt_admin` where `mobile_no` = '$mobileNo' and deleted !=1");
  $row = mysqli_num_rows($query);
  if ($row == 0) {
    echo '0';
  } else {
    echo '1';
  }
}

if (isset($_POST['project_type'])) {
  $project_type = $_POST['project_type'];
  $query = mysqli_query($sql, "Select * from `awt_project_type` where title='$project_type' and deleted = 0");
  $row = mysqli_num_rows($query);

  if ($row == 0) {
    echo '0';
  } else {
    echo '1';
  }
}
if (isset($_POST['creative_type'])) {
  $creative_type = $_POST['creative_type'];
  $query = mysqli_query($sql, "Select * from `awt_creative_type` where title='$creative_type' and deleted = 0");
  $row = mysqli_num_rows($query);

  if ($row == 0) {
    echo '0';
  } else {
    echo '1';
  }
}
if (isset($_POST['project_type'])) {
  $project_type = $_POST['project_type'];
  $query = mysqli_query($sql, "Select * from `awt_project_type` where title='$project_type' and deleted = 0");
  $row = mysqli_num_rows($query);

  if ($row == 0) {
    echo '0';
  } else {
    echo '1';
  }
}


if (isset($_POST['roleName'])) {
  $roleName = $_POST['roleName'];
  $query = mysqli_query($sql, "Select * from `awt_role` where title='$roleName' and deleted = 0");
  $row = mysqli_num_rows($query);
  if ($row == 0) {
    echo '0';
  } else {
    echo '1';
  }
}


if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $query = mysqli_query($sql, "Select * from `task_status_history` where id = '$id'");
  $listdata = mysqli_fetch_object($query);
  $filepath = $listdata->filepaths;
  $id = $listdata->id;

  // Create a JSON response
$response = array(
  'filepath' => $filepath,
  'id' => $id
);

// Echo the JSON response
echo json_encode($response);
}

if (isset($_POST['denyid'])) {
  $denyid= $_POST['denyid'];
  $query = mysqli_query($sql , "update `task_status_history` set status = 3 where id = '$denyid' ");
  echo '<script>alert("Update done successfully!");</script>';
}



if (isset($_POST['approves'])) {
  $approves= $_POST['approves'];
  $query = mysqli_query($sql , "update `task_status_history` set status = 4 where id = '$approves' ");
  echo '<script>alert("Update done successfully!");</script>';
}

if (isset($_POST['reassign'])) {
  $reassign= $_POST['reassign'];
  $query = mysqli_query($sql , "update `awt_task` set status = 5 where id = '$reassign' ");
  echo '<script>alert("Update done successfully!");</script>';
}


if(isset($_POST['task_id'])){
  $task_id = $_POST['task_id'];
  $query = mysqli_query($sql,"update `task_status_history` set status = 1 where id = '$task_id'");
  if ($query) {
    echo "1";
  }
}

if(isset($_POST['end_project'])){
  $end_project = $_POST['end_project'];
  $query = mysqli_query($sql ,"update `awt_project` set status = 2 where id='$end_project'");
  echo $end_project;
}
