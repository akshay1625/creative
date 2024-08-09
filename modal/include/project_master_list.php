<?php

function gettable($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_project` WHERE  `deleted` = 0 ");

    $x = 1;
    while ($listdata = mysqli_fetch_object($query1)) {
        $contact = '';
        $query0 = mysqli_query($sql,"select * from `awt_customer_no` where deleted=0 and company_id='$listdata->companyName' and default_no = 0");
        $listdata0 = mysqli_fetch_object($query0);
        if(mysqli_num_rows($query0)>0){
            $contact =  $listdata0->mobile ;
        }else{
            $contact = "No Default Contact Selected";
        }

        $query0 = mysqli_query($sql, "select * from `awt_customer` where deleted = 0 and id = '$listdata->companyName'");
        if (mysqli_num_rows($query0) > 0) {
            $listdata0 = mysqli_fetch_object($query0);
            $name = $listdata0->company_name;
        } else {
            $name = "NULL";
        }

        $status = $listdata->status;
        if ($status == 0) {
            $status = "Pending..";
            $color = "text-danger";
          } else if ($status == 1) {
            $status = "Process..";
            $color = "text-secondary";
          } else if ($status == 2) {
            $status = "Completed";
            $color = "text-success";
        }

        echo '<tr class="text-start" >
                <td class="text-start" >'.$x.'</td>
                <td class="text-start" >' . $listdata->projecttitle . '</td>
                <td class="text-start" >' . $name . '</td>
                <td class="text-start" >' . $contact . '</td>
                <td class="text-start" ><a href="task_master.php?&project_id='.$listdata->id.'"><button class="btn  btn-sm  btn-primary"  type="button">Task</button></a></td>
                <td class="text-start " ><a href="attachment.php?&project_id='.$listdata->id.'"><button class="btn  btn-sm  btn-primary"  type="button">Sample and Attactment</button></a>
                </td>
                <td class="text-start '.$color.' " >'.$status.'</td>
                <td class="text-start"  class="d-flex">
                    <a class="btn" href="project_master.php?&eid=' . $listdata->id . '"  style="color: black;  "><i class="fas fa-edit"></i></a>
                    <a class="btn" href="project_master_list.php?&did=' . $listdata->id . '"  style="color: red; "><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            ';
        $x++;
    }
}

if(isset($_GET['did'])){
    $id = $_GET['did'];
    $query = mysqli_query($sql, "UPDATE `awt_project` SET `deleted`= 1 WHERE `id` = '$id'");
    if($query){
        echo '<script> alert("Project Deleted Successfully"); window.location.href="project_master_list.php";</script>';
    }
}
