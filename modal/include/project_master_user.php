<?php
$id='';

function getrow($sql, $id)
{
  $userid = $_SESSION['user_id'];

  $query = mysqli_query($sql, "SELECT * FROM `awt_project` where deleted = 0 and FIND_IN_SET( '$userid' , `assginuser`); ");
  $x=1;
  while ( $listdata = mysqli_fetch_object($query)) {
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
        // $color = "style='color: red;'";
    } else if ($status == 1) {
        $status = "Process..";
    } else if ($status == 2) {
        $status = "Completed";
    }

  echo '<tr class="text-start" >
        <td class="text-start" >'.$x.'</td>
        <td class="text-start" >'.$listdata->projecttitle.'</td>
        <td class="text-start" >'.$name.'</td>
        <td class="text-start" >'.$contact.'</td>
        <td class="text-start" ><a href="task_master_user.php?&id='.$listdata->id.'"><button class="btn  btn-sm  btn-primary"  type="button">Task</button></a></td>
        <td class="text-start text-success " >'.$status.'</td>

    </tr>';
  }
}
