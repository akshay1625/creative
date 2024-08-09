<?php
$assginuser = '';
$project_id = '';
$floor = '';
$taskname = '';
$artwork = '';
$creative_type = '';
$taskdes = '';
$Exstartdate = '';
$eid='';
$Exenddate = '';

if (isset($_GET['project_id'])) {
  $project_id = $_GET['project_id'];
  $query =mysqli_query($sql , "Select * from `awt_project` where id ='$project_id'");
  $listdata = mysqli_fetch_object($query);
  $project_type = $listdata->spacedesign;
}

function getfloor($sql, $project_id, $floor)
{
  $query = mysqli_query($sql, "select * from `awt_project` where id = '$project_id'");
  $listdata = mysqli_fetch_object($query);
  for ($i = 1; $i <= $listdata->floor; $i++) {
    if ($i == $floor) {
      echo '<option value="' . $i . '" selected>' . $i . '</option>';
    } else {
      echo '<option value="' . $i . '">' . $i . '</option>';
    }
  }
}

function creative($sql, $creative_type)
{

  $query = "SELECT * FROM `awt_creative_type` WHERE `id` = '$creative_type' or deleted =0";
  $result = mysqli_query($sql, $query);

  echo '<option value="0">Select Option</option>';

  while ($listdata = mysqli_fetch_object($result)) {
    // Check if the current user ID is in the assigned users array
    echo '<option value="' . $listdata->id . '"';

    // Check if the current location is selected
    if (!empty($creative_type) && in_array($listdata->id, $creative_type)) {
      echo ' selected="selected"';
    }

    echo '>' . $listdata->title . '</option>';
  }
}

function userlist($sql, $assginuser, $project_id)
{

  $query = "SELECT p.assginuser , a.id , a.first_name , a.last_name FROM `awt_project` as p left join awt_admin as a on FIND_IN_SET( a.id,p.assginuser ) where p.id = 1;";
  $result = mysqli_query($sql, $query);

  echo '<option value="0">Select Option</option>';

  while ($listdata = mysqli_fetch_object($result)) {
    // Check if the current user ID is in the assigned users array
    echo '<option value="' . $listdata->id . '"';

    // Check if the current location is selected
    if (!empty($assginuser) && in_array($listdata->id, $assginuser)) {
      echo ' selected="selected"';
    }

    echo '>' . $listdata->first_name . ' ' . $listdata->last_name . '</option>';
  }
}


if (isset($_POST['submit'])) {
  $floor = $_POST['floor'];
  $taskname = $_POST['taskname'];
  $artwork = $_POST['artwork'];
  $creative_type = implode(',', $_POST['creative_type']);
  $taskdes = $_POST['taskdes'];
  $Exstardate = $_POST['Exstardate'];
  $Exenddate = $_POST['Exenddate'];
  $seuser = $_POST['seuser'];
  $date = date("Y-M-D h:m:s A");
  $project_id = $_POST['project_id'];
  if(isset($_POST['eid']))
  $eid = $_POST['eid'];

  if (empty($eid)) {
    $query = "INSERT INTO `awt_task` (`project_id`,`floor`, `taskname`, `artwork`, `creative_type`, `taskdes`, `Exstardate`, `Exenddate`, `seuser`,`created_at`, `status` ) VALUES ('$project_id','$floor', '$taskname', '$artwork', '$creative_type', '$taskdes', '$Exstardate', '$Exenddate', '$seuser','$date','1')";
  } else {
    $query = "UPDATE `awt_task` SET `project_id`='$project_id',`floor`='$floor', `taskname`='$taskname', `artwork`='$artwork',`creative_type`='$creative_type', `taskdes`='$taskdes', `Exstardate`= '$Exstardate',`Exenddate`='$Exenddate', `seuser`='$seuser', `created_at`='$date',`status`='1' WHERE `id`='$eid'";
  }
  echo $query ;

  if (mysqli_query($sql, $query)) {
    echo '<script type="text/javascript">window.location.href="task_master.php?&u=1&project_id=' . $project_id . '"</script>';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

if (isset($_GET['eid'])) {
  //edit
  $eid = $_GET['eid'];
  $project_id = $_GET['project_id'];
  $query = mysqli_fetch_object(mysqli_query($sql, "Select * from `awt_task` where id= '$eid'"));
  $floor = $query->floor;
  $taskname = $query->taskname;
  $artwork = $query->artwork;
  $creative_types = $query->creative_type;
  $creative_type = explode(',', $creative_types);
  $taskdes = $query->taskdes;
  $Exenddate = $query->Exenddate;
  $Exstardate = $query->Exstardate;
  $seuser = $query->seuser;
  $assginuser = explode(',', $seuser);
}
