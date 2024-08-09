<?php
echo 'worl';
function getrow($sql)
{
  $id = $_SESSION['customer_id'];
  $query = mysqli_query($sql, "SELECT * FROM `awt_project` where companyName = '$id' ");
  $x = 1;
  while ($listdata = mysqli_fetch_object($query)) {
    $status = $listdata->status;
    if ($status==0) {
      $status = "Process....";
    }elseif ($status==3){
      $status = "Done";
    }
    echo '
   <tr class="text-start" >
  <td class="text-start" >'.$x.'</td>
  <td class="text-start" >'.$listdata->projecttitle.'</td>

  <td class="text-start" ><a href="task_master_customer.php?&project_id='.$listdata->id.'"><button class="btn  btn-sm  btn-primary"  type="button">Task</button></a></td>
  <td class="text-start text-success " >'.$status.'</td>
  </tr>';
  $x++;
  }
}
