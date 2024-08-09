<?php

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $query = mysqli_query($sql,"Select * from `awt_project` where id = '$project_id'");
    $listdata = mysqli_fetch_object($query);
    $project_name = $listdata->projecttitle;
}

if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $project_id = $_GET['project_id'];
    $query = mysqli_query($sql,"UPDATE `awt_task` set `status` = 0 where id= '$did'");
    if ($query) {
        echo "Task completed successfully";
    echo '<script type="text/javascript">window.location.href="task_master.php?&project_id=' . $project_id . '"</script>';

    }else {
        echo "Error completing task";
    }
}

function gettable($sql, $project_id)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_task` WHERE  `deleted` = 0 and project_id = '$project_id'");

    $x = 1;
    while ($listdata = mysqli_fetch_object($query1)) {
        $query = mysqli_query($sql, "select *  from `awt_project` where id = '$project_id'");
        $project = mysqli_fetch_object($query);
        $task_name = $project->projecttitle;
        if ($listdata->status == 0) {
            $status = "Cancel";
            $color = "text-danger";
          } else if ($listdata->status == 1) {
            $status = "Assign To User";
            $color = "";
          } else if ($listdata->status == 2) {
            $status = "Process...";
            $color = "";
          } else if ($listdata->status == 3) {
            $status = "Reviews..";
            $color = "text-success";
          } else if ($listdata->status== 4) {
            $status = "Reassign";
            $color = "text-danger";
          }else{
            $color = "text-success";
          $status = "Completed";
        }


        echo '
           <tr>
            <td class="text-center">' . $x . '</td>

            <td class="text-left">' . $listdata->taskname . '</td>
            <td class="text-left">' . $listdata->Exstardate . '</td>
            <td class="text-left">' . $listdata->Exenddate . '</td>
            <td class="text-left '.$color.' ">' . $status . '</td>
            <td>
                <a class="btn btn-sm" href="addtask_master.php?&eid=' . $listdata->id . '&project_id='.$project_id.'"  style="color: black;  "><i class="fas fa-edit"></i></a>
                <a class="btn btn-sm" href="task_master.php?&did=' . $listdata->id . '&project_id='.$project_id.'"  style="color: red; "><i class="fas fa-times-circle"></i></a>
            </td>
            </tr>
                  ';
        $x++;
    }
}
