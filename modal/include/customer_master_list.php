<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
// <!-- Sample Data -->
// <tr class="text-start" >
//     <td class="text-start" >ABC Corporation</td>
//     <td class="text-start" >9876543210</td>
//     <td class="text-start" >abc@example.com</td>
//     <td class="text-start" >
//         7418529636
//     </td>
//     <td class="text-start" >State1</td>
//     <td class="text-start" >City1</td>
//     <td class="text-start" >Working....</td>
//     <td class="text-start"  class="d-flex">



//             <button class="btn"  onclick="location.href='customer_master.php';"style="color: black;  " ><i class="fas fa-edit"></i></button>
//             <button class="btn " style="color: red; " ><i class="fas fa-trash-alt"></i></button>

//     </td>
// </tr>
if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $query = "update `awt_customer` set deleted = 1 WHERE `id` = $did";
    $result = mysqli_query($sql, $query);
    if ($result) {
        echo '<script type="text/javascript">window.location.href="customer_master_list.php?";</script>';
    } else {
        echo '<script type="text/javascript">window.location.href="customer_master_list.php?";</script>';
    }
}



function gettable($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_customer` WHERE  `deleted` = 0 ");

    $x = 1;
    while ($listdata = mysqli_fetch_object($query1)) {
        $contact = '';
        $query0 = mysqli_query($sql,"select * from `awt_customer_no` where company_id = $listdata->id and default_no = 0");
        $listdata0 = mysqli_fetch_object($query0);
        if(mysqli_num_rows($query0)>0){
            $contact =  $listdata0->name ;
        }else{
            $contact = "No Default Contact Selected";
        }

        $query22 =mysqli_query($sql,"select * from `awt_states` where id = '$listdata->state'");
        $listdata22 = mysqli_fetch_object($query22);
        $state = $listdata22->name;

        echo '
        <tr class="text-start" >
        <td class="text-start" >' . $listdata->company_name . '</td>
        <td class="text-start" >' . $listdata->mobile_no . '</td>
        <td class="text-start" >' . $listdata->email . '</td>

        <td class="text-start" >' .$contact. '</td>

        <td class="text-start" >' . $state . '</td>
        <td class="text-start" >' . $listdata->city . '</td>
        <td class="text-start"  class="d-flex">
        <a class="btn" href="customer_master.php?&eid=' . $listdata->id . '"  style="color: black;  "><i class="fas fa-edit"></i></a>
        <a class="btn" href="customer_master_list.php?&did=' . $listdata->id . '"  style="color: red; "><i class="fas fa-trash-alt"></i></a>

        </td>
    </tr>';
        $x++;
    }
}

        // <---<td class="text-start" >Working....</td>--->
