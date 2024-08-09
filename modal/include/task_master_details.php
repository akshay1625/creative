<?php
$filepath = $filepatherr = '';
$previewerr  = $perview = '';
$floor_no  =  $floor_name = $description = $artwork_for = $creative_type = '';
$id = '';
$filepathserr='';
$act_start = '';
$act_end = '';
$act_start = '';
$status = '';
$filepaths = '';
$path = "upload/task/";
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "JPG", "PNG", "GIF", "BMP", "JPEG", "SVG", "svg", "JFIF", "jfif", "WEBP", "webp", "mp4", "webm", "ogg", "PDF", "pdf");
$$act_start = $act_end = '';
if (!file_exists('upload')) {
  mkdir('upload', 0777, true);
}
if (!file_exists('upload/task/')) {
  mkdir('upload/task/', 0777, true);
}

if (isset($_GET['start'])) {
  $id = $_GET['id'];
  $date = date("y-m-d H:i");
  echo $date;
  $query = mysqli_query($sql, "update `awt_task` set `act_start` = '$date' , `status` = 2 where id = '$id'");
  $query = mysqli_query($sql, "select * from `awt_task` where id = '$id'");
  $profile_id = mysqli_fetch_object($query);
  $project_id = $profile_id->project_id;
  $query = mysqli_query($sql, "update `awt_project` set  `status` = 1 where id = '$project_id'");

  // echo "update `awt_task` set `act_start` = '$date' , `status` = 2 where id = '$id'";
  // echo '<script type="text/javascript">window.location.href="task_master_details.php?&id='.$id.'"</script>';
}


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($sql, "select * from `awt_task` where id = '$id'");
  $listdata = mysqli_fetch_object($query);
  $floor_no = $listdata->floor;
  $floor_name = $listdata->taskname;
  $artwork_for = $listdata->artwork;
  $description = $listdata->taskdes;
  $creative =  $listdata->creative_type;
  $task_status = $listdata->status;



  $act_start = $listdata->act_start;
  if (empty($act_start)) {
    $act_start = '';
  }
  $act_end = $listdata->act_end;
  if (empty($act_end)) {
    $act_end = '';
  }
  if ($artwork_for == 1) {
    $artwork_for = "WALL";
  } elseif ($artwork_for == 2) {
    $artwork_for = "GLASS";
  } else {
    $artwork_for = "COLUMN";
  }

  $query1 = mysqli_query($sql, "SELECT * FROM `awt_creative_type` WHERE FIND_IN_SET(id, '$creative')");
  // echo "SELECT * FROM `awt_creative_type` WHERE FIND_IN_SET(id, '$creative');";
  while ($row = mysqli_fetch_object($query1)) {
    $creative_type .= $row->title . ' , ';
    // echo $creative_type;
  }
}

if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $filepath = $_POST['filepath'];
  $filename = $_FILES['preview']['name'];
  $allok = true;
  $date = date("y-m-d H:m:s A");

  if (empty($filepath)) {
    $filepatherr = "Please Enter File Path ";
    $allok = false;
  }

  if ($filename != '') {
    list($name, $ext) = explode(".", $filename);

    if (in_array($ext, $valid_formats)) {
      $upload_filename = time() . "-" . $filename;
      $tmp = $_FILES['preview']['tmp_name'];
      move_uploaded_file($tmp, $path . $upload_filename);
    }
    $filepaths = $upload_filename;
  } else {
    $filepathserr = "Please Upload the File ";
    $allok = false;
  }


  if ($allok == true) {
    $query = "INSERT INTO `task_status_history` (`filepath`,`filepaths`,`task_id`,`created_date`,`status`) VALUES ('$filepath', '$filepaths' ,'$id' , '$date' ,0)";
    mysqli_query($sql, $query);
    $query1 = mysqli_query($sql, "update `awt_task` set `act_end` = '$date' , `status` = 3 where id = '$id'");
    echo '<script type="text/javascript">window.location.href="task_master_details.php?&id=' . $id . '"</script>';
  }
}


function getrow($sql, $id)
{
  $query = mysqli_query($sql, "Select * from `task_status_history` where task_id= '$id' ORDER BY `id` DESC ");
  $x = 1;
  while ($listdata = mysqli_fetch_object($query)) {


    $status = $listdata->status;
    if ($status == 1) {
      $status = "Awaiting for Admin Approval";
      $color = " ";
    } elseif ($status == 2) {
      $status = "Reject by Admin";
      $color = "text-danger ";
    } elseif ($status == 3) {
      $status = "Awaiting For Customer Approval";
      $color = " ";
    } elseif ($status == 4) {
      $status = "Approval By Customer";
      $color = "text-success ";
    }elseif ($status== 5 ) {
      $status ="Rejected By Customer";
      $color = "text-danger ";
    }
    echo "
    <div class='card'>
    <div class='card-body'>

       <div class='col-md-12 row  '>
                <div class='col-sm-6'>
                  <h5 class='p-1' >Filepath: " . $listdata->filepath . "</h5>
                  <h5 class='p-1' >Date: " . $listdata->created_date . "</h5>";
    if ($listdata->status == 0) {
      echo "<a href='' onclick='send(" . $listdata->id . ")'  class='btn btn-sm btn-primary'>Send For Approver</a>";
    } else {
      echo "<p class='".$color." p-1' >" . $status . "</p>";
    }

    echo "</div><div class='col-sm-6 d-flex justify-content-end'>
               <img src='upload/task/" . $listdata->filepaths . "' width='30%' alt=''>
                </div>
              </div>
              </div>
    </div>
    ";
    $x++;
  }
}
