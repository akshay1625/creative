<?php

function gettable($sql)
{
  
  $query1 = mysqli_query($sql, "SELECT * FROM `task_status_history` where status != 0  ORDER BY `updated_date` DESC");

  $x = 1;
  while ($listdata = mysqli_fetch_object($query1)) {
    $query = mysqli_query($sql, "SELECT * , a.first_name , a.last_name FROM `awt_task` as t left join `awt_admin` as a on t.seuser = a.id where t.id = '$listdata->task_id'");
    // echo"SELECT * , a.first_name , a.last_name FROM `awt_task` as t left join `awt_admin` as a on t.seuser = a.id and t.id = '$listdata->id' <br> ";
    $row = mysqli_fetch_object($query);
    $task_name = $row->taskname;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $name = $first_name . " " . $last_name;


    $status = $listdata->status;
    if ($status == 1 ) {
      $status = "Waiting for Review";
    }elseif ($status == 2) {
      $status = "Rejected";
    }elseif ($status == 3){
      $status = "Approval Send Customer";
    }elseif ($status == 4){
      $status = "Approval by Customer";
    }else{
      $status = "Rejected by Customer";
    }

    echo '<tr class="text-start" >
                <td class="text-start" >' . $x . '</td>
                <td class="text-start" >' . $task_name . '</td>
                <td class="text-start" >' . $name . '</td>
                <td class="text-start" >  <button type="button" class="btn btn-primary" data-toggle="modal" onclick="getdata(' . $listdata->id . ')" data-target="';
    if ($listdata->status == 1) {
      echo '#images';
    }elseif ($listdata->status ==5) {
      echo '#reassign';
    } else {
      echo '#close';
    }

    echo '">View</button></td>
      <td>'.$status.' </td>
            </tr>
            ';
    $x++;
  }
}

if (isset($_POST['submit'])) {
  $denyreason = $_POST['denyReason'];
  $denyid = $_POST['denyid'];
  $query = mysqli_query($sql , "update `task_status_history` set deny_reason = '$denyreason' , status = 2 where id = '$denyid' ");
  $query = mysqli_query($sql , "select * from `task_status_history` where id = '$denyid' ");
  $query = mysqli_fetch_object($query);
  $id = $query->task_id;
  $query = mysqli_query($sql , "update `awt_task` set  status = 4 where id = '$id' ");

}
