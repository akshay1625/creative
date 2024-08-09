<?php

$projecttitle = $companyName = $projecttag  = $information = $projecttype = $cost = $creative_type = $assginuser = '';
$spacedesign = $floor = $eid = '';


if (isset($_POST['submit'])) {
    $projecttitle = $_POST['projecttitle'];
    $companyName = $_POST['companyName'];
    $projecttag = $_POST['projecttag'];
    $information = $_POST['information'];
    $projecttype = $_POST['projecttype'];
    $cost = $_POST['cost'];
    $creative_types = $_POST['creative_type'];
    $creative_type = implode(',', $creative_types);
    // Handle the case where 'assginuser' might not be set
    $assginuser = isset($_POST['assginuser']) ? $_POST['assginuser'] : [];
    $assginusers = implode(',', $assginuser);
    $spacedesign = $_POST['spacedesign'];
    $floor = $_POST['floor'];
    $date = date("y-m-d h:i:s A");
    $eid = $_POST['eid'];



    if ($eid == '') {
        // Prepare the SQL query
        $query = "INSERT INTO `awt_project` (`projecttitle`, `companyName`, `projecttag`, `information`, `projecttype`, `cost`, `creative_type`, `assginuser`, `spacedesign`, `floor`, `created_date`) VALUES ('$projecttitle', '$companyName', '$projecttag', '$information', '$projecttype', '$cost', '$creative_type', '$assginusers', '$spacedesign', '$floor', '$date')";

        // Execute the query
        $result = mysqli_query($sql, $query);

        // Check the result
        if ($result) {
            echo "New record created successfully";
            echo '<script type="text/javascript">window.location.href="project_master_list.php?&s=1"</script>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($sql);
        }
    } else {

        // Prepare the SQL query for update
        $query = "UPDATE `awt_project` SET `projecttitle`='$projecttitle',`companyName`='$companyName',`projecttag`='$projecttag',`information`='$information',`projecttype`='$projecttype',`cost`='$cost',`creative_type`='$creative_type',`assginuser`='$assginusers',`spacedesign`='$spacedesign',`floor`='$floor',`created_date`='$date' WHERE `id`='$eid'";
        // Execute the query
        $result = mysqli_query($sql, $query);
        // Check the result
        if ($result) {
            echo "Record updated successfully";
            echo '<script type="text/javascript">window.location.href="project_master_list.php?&u=1"</script>';
        } else {
            echo "Error updating record: " . mysqli_error($sql);
        }
    }
}


if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "SELECT * FROM `awt_project` WHERE `id`= $eid");
    $row = mysqli_fetch_object($query);
    $projecttitle = $row->projecttitle;
    $companyName = $row->companyName;
    $projecttag = $row->projecttag;
    $information = $row->information;
    $projecttype = $row->projecttype;
    $cost = $row->cost;
    $creative_types = $row->creative_type;
    $creative_type = explode(',', $creative_types);
    $assginusers =  $row->assginuser;
    $assginuser = explode(',', $assginusers);


    $spacedesign = $row->spacedesign;
    $floor = $row->floor;
    $filepath = $row->filepath;

}

function company($sql, $company)
{
    $query = "SELECT * FROM `awt_customer` WHERE `id` = '$company' or deleted =0";
    $query = mysqli_query($sql, $query);
    echo '<option value="0">Select Option</option>';
    while ($listdata = mysqli_fetch_object($query)) {
        if ($company == $listdata->id) {
            echo '<option selected value="' . $listdata->id . '">' . $listdata->company_name . '</option>';
        }else{
            echo '<option value="' . $listdata->id . '">' . $listdata->company_name . '</option>';
        }
    }
}
// function creative($sql, $creative_type)
// {
//     $query = "SELECT * FROM `awt_creative_type` WHERE `id` = '$creative_type' or deleted =0";
//     $query = mysqli_query($sql, $query);
//     echo '<option value="0">Select Option</option>';
//     while ($listdata = mysqli_fetch_object($query)) {
//         if () {
//             echo '<option selected value="' . $listdata->id . '">' . $listdata->title . '</option>';
//         }else{
//             echo '<option value="' . $listdata->id . '">' . $listdata->title . '</option>';
//         }

//     }
// }

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
function projecttypes($sql, $projecttype)
{
    $query = "SELECT * FROM `awt_project_type` WHERE `id` = '$projecttype' or deleted =0";
    $query = mysqli_query($sql, $query);
    echo '<option value="0">Select Option</option>';
    while ($listdata = mysqli_fetch_object($query)) {
        if ($projecttype == $listdata->id) {
            echo '<option selected value="' . $listdata->id . '">' . $listdata->title . '</option>';
        }else{
            echo '<option value="' . $listdata->id . '">' . $listdata->title . '</option>';
        }

    }
}
function userlist($sql, $assginuser)
{

    $query = "SELECT * FROM `awt_admin` where deleted = 0";
    $result = mysqli_query($sql, $query);

    echo '<option value="0">Select Option</option>';
    mysqli_data_seek($result, 1);
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
