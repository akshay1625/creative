<?php
$id='';
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
function getrow($sql,$id)
{
  $userid =$_SESSION['user_id'];
if(empty($id)){
  $query = mysqli_query($sql, "SELECT * FROM `awt_task` WHERE  `deleted` = 0 and seuser = '$userid' ");
}else {
  $query = mysqli_query($sql, "SELECT * FROM `awt_task` WHERE  `deleted` = 0 and seuser = '$userid' and project_id = '$id'  ");
}

  $x = 1;
  while ($listdata = mysqli_fetch_object($query)) {
    $project_id = $listdata->project_id;
    $query1=mysqli_query($sql , "select * from `awt_project` where id = '$project_id' ");
    $listdata1 = mysqli_fetch_object($query1);
    $project_name = $listdata1->projecttitle;

    $status = $listdata->status;
    if ($listdata->status == 0) {
      $status = "Cancel.";
  } else if ($listdata->status == 1) {
      $status = "Waiting To Start";
  } else if ($listdata->status == 2) {
      $status = "Process...";
  } else if ($listdata->status == 3) {
      $status = "Reviews..";
  } else {
      $status = "Reassign";
  }

    echo '
      <tr>
        <td class="text-center">'.$x.'</td>
        <td class="text-left">'.$project_name.'</td>
        <td class="text-left">'.$listdata->taskname.'</td>
        <td class="text-left">'.$listdata->Exstardate.'</td>
        <td class="text-left">'.$listdata->Exenddate.'</td>
        <td class="text-left">'.$status.'</td>
        <td>
          <a href="task_master_details.php?&id='.$listdata->id.'"><button class="btn btn-primary  edit-btn">View</button></a>
        </td>
      </tr>';
    $x++;
  }
}
