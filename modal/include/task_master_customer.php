<?php
$project_id = '';
$filepaths = '';
$project_name = '';
if (isset($_GET['project_id'])) {
  $project_id = $_GET['project_id'];
  $query = mysqli_query($sql , "select * from  `awt_project` where id = '$project_id'");
  $listdata = mysqli_fetch_object($query);
  $project_name= $listdata->projecttitle;
}
function getrow($sql, $project_id)
{
  $cid = $_SESSION['customer_id'];
  if (isset($_GET['project_id'])) {
    $query = mysqli_query($sql, "SELECT t.id, o.taskname, o.act_start,p.projecttitle, a.company_name, t.status FROM `task_status_history` AS t left join `awt_task` as o on t.task_id = o.id LEFT JOIN `awt_project` AS p ON p.id = o.project_id LEFT JOIN `awt_customer` AS a ON p.companyName = a.id where a.id = '$cid' and t.status in (3,4,5) and p.id = '$project_id';");
    // echo 'project id hai';
  }else {
    $query = mysqli_query($sql, "SELECT t.id, o.taskname, o.act_start,p.projecttitle, a.company_name, t.status FROM `task_status_history` AS t left join `awt_task` as o on t.task_id = o.id LEFT JOIN `awt_project` AS p ON p.id = o.project_id LEFT JOIN `awt_customer` AS a ON p.companyName = a.id where a.id = '$cid' and t.status in (3,4,5)");
    // echo 'project id nahi';
  }
  $x = 1;
  while ($listdata = mysqli_fetch_object($query)) {
$status = $listdata->status;
if ($status == 3) {
  $status = "Waiting for Review";
}elseif ($status == 4) {
  $status = "Approve";
}else {
  $status = "Rejected";
}

    echo '
    <tr>
    <td class="text-center">' . $x . '</td>
    <td class="text-left">' . $listdata->projecttitle . '</td>
    <td class="text-left">' . $listdata->taskname . '</td>
    <td class="text-left">' . $listdata->act_start . '</td>
    <td class="text-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" onclick="getdata(' . $listdata->id . ')" data-target="';
    if ($listdata->status == 3) {
      echo '#images';
    } else {
      echo '#close';
    }

    echo '">View</button>

    </td>
    <td>
      <p class="" style="color: red; ">'.$status.'</p>
    </td>
  </tr>';
    $x++;
  }
}


if (isset($_POST['submit'])) {
  $denyreason = $_POST['denyReason'];
  $id = $_POST['denyid'];

  $query = mysqli_query($sql, "update `task_status_history` set status = 5 , deny_reason = '$denyreason' where id = '$id' ");

  echo 'success';
}
