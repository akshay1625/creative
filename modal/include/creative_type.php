<?php
$creative_type = $creative_typeerr = '';
$descriptionerr = $description = '';
$eid='';
$msg='';


if (isset($_GET['s'])) {
    $msg = "New record created successfully";
}
if (isset($_GET['d'])) {
    $msg = "Role Deleted";
}
if (isset($_GET['e'])) {
    $msg = "Role Updated";
}




if (isset($_POST['submit'])) {
    $creative_type = trim($_POST['creative_type']);
    $description = trim($_POST['description']);
    $eid = '';
    $flag = true;
    $creative_typeerr = '';


    if (!empty($_POST['eid'])) {
        $eid = $_POST['eid'];
    }

    // Validate project type
    if (empty($creative_type)) {
        $creative_typeerr = 'Please select Creative type';
        $flag = false;
    } else {
        if ($eid == '') {
            $query = mysqli_query($sql, "SELECT * FROM `awt_creative_type` WHERE title = '$creative_type' AND deleted = 0");
            if (mysqli_num_rows($query) > 0) {
                $creative_typeerr = 'Creative type already exists';
                $flag = false;
            }
        }
    }

    $date = date("Y-m-d H:i:s");

    if ($flag) {
        if ($eid == '') {
            // Insert new record
            $query = mysqli_query($sql, "INSERT INTO `awt_creative_type` (`title`, `description`, `created_date`) VALUES ('$creative_type', '$description', '$date')");
            echo '<script type="text/javascript">window.location.href="creative_type.php?s=1"</script>';
            // echo "INSERT INTO `awt_creative_type` (`title`, `description`, `created_date`) VALUES ('$creative_type', '$description', '$date'";
        } else {
            // Update existing record
            $query = mysqli_query($sql, "UPDATE `awt_creative_type` SET `title` = '$creative_type', `description` = '$description' WHERE id = '$eid'");
            // echo "UPDATE `awt_creative_type` SET `title` = '$creative_type', `description` = '$description' WHERE id = '$eid'";
            echo '<script type="text/javascript">window.location.href="creative_type.php?u=1"</script>';
        }
    }
}




if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $query = (mysqli_query($sql, "update  `awt_creative_type` set deleted = 1 where id = '$did'"));
    if ($query) {
        echo '<script type="text/javascript">window.location.href="creative_type.php?&d=1"</script>';
    } else {
        $msg = "something gone wrong";
    }
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "select * from `awt_creative_type` where id = '$eid'");
    $query = mysqli_fetch_object($query);
    $creative_type = $query->title;
    $description = $query->description;
}


function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_creative_type` where `deleted` != 1");

    $x = 1;
    while ($listdata = mysqli_fetch_object($query1)) {
        $eid = $did = $listdata->id;
        echo '  <tr>
                    <td class="text-center">' . $x . '</td>
                    <td class="d-flex justify-content-between"> ' . $listdata->title . '  </td>
                     <td>
                        <a href="creative_type.php?&eid=' . $listdata->id . '" class="btn btns" style="color: black;"><i class="fas fa-edit"></i></a>
                        <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="creative_type.php?&did=' . $listdata->id . '" class="btn btns" style="color: red;"><i class="fas fa-trash-alt"></i></a>
                     </td>
                  </tr>';
        $x++;
    }
}
