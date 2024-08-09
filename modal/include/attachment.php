<?php
$attachment = $attachmenterr  = '';
$filepatherr = $filepath = '';
$eid='';
$msg='';
$project_id = '';
$path = "upload/profile_img/";
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "JPG", "PNG", "GIF", "BMP", "JPEG", "SVG", "svg", "JFIF", "jfif", "WEBP", "webp", "mp4", "webm", "ogg");
$filepath = '';



if (!file_exists('upload')) {
    mkdir('upload', 0777, true);
}
if (!file_exists('upload/project_sample/')) {
    mkdir('upload/project_sample/', 0777, true);
}


if (isset($_GET['s'])) {
    $msg = "New record created successfully";
}
if (isset($_GET['d'])) {
    $msg = "Attactment Deleted";
}
if (isset($_GET['e'])) {
    $msg = "Attactment Updated";
}




if (isset($_POST['submit'])) {
    $attachment = $_POST['attachment'];
    $eid = '';
    $flag = true;
    $project_id = $_POST['project_id'];
    $creative_typeerr = '';


    if (!empty($_POST['eid'])) {
        $eid = $_POST['eid'];
    }

     // Handle file upload
     $filename = $_FILES['smpatt']['name'];
     $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
     $isValidFile = in_array($file_ext, $valid_formats);
     $filename = $_FILES['smpatt']['name'];

     if ($filename != '') {
             list($name, $ext) = explode(".", $filename);

             if (in_array($ext, $valid_formats)) {
                 $upload_filename = time() . "-" . $filename;
                 $tmp = $_FILES['smpatt']['tmp_name'];
                 move_uploaded_file($tmp, $path . $upload_filename);
             }
             $filepath = $upload_filename;
         } else {
             $filepath = $_POST['filepath'];
         }


    // Validate project type
    if (empty($attachment)) {
        $attachmenterr = 'Please select Creative type';
        $flag = false;
    } else {
        if ($eid == '') {
            $query = mysqli_query($sql, "SELECT * FROM `awt_attachment` WHERE attachment = '$attachment' AND deleted = 0 and project_id = '$project_id'");
            if (mysqli_num_rows($query) > 0) {
                $attachmenterr = 'Creative type already exists';
                $flag = false;
            }
        }
    }

    $date = date("Y-m-d H:i:s");

    if ($flag) {
        if ($eid == '') {
            // Insert new record
            echo "INSERT INTO `awt_attachment` (`attachment`, `sample_design`,`project_id`,`created_at`) VALUES ('$attachment', '$filepath','$project_id', '$date')";
            $query = mysqli_query($sql, "INSERT INTO `awt_attachment` (`attachment`, `sample_design`,`project_id`,`created_at`) VALUES ('$attachment', '$filepath','$project_id', '$date')");

            echo '<script type="text/javascript">window.location.href="attachment.php?&s=1&project_id='.$project_id.'"</script>';
        } else {
            // Update existing record
            $query = mysqli_query($sql, "UPDATE `awt_attachment` SET `attachment` = '$attachment', `sample_design` = '$filepath' WHERE id = '$eid'");
            // echo "UPDATE `awt_creative_type` SET `title` = '$creative_type', `description` = '$description' WHERE id = '$eid'";
            echo '<script type="text/javascript">window.location.href="attachment.php?&u=1&project_id='.$project_id.'"</script>';
        }
    }
}




if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $project_id = $_GET['project_id'];
    $query = (mysqli_query($sql, "update  `awt_attachment` set deleted = 1 where id = '$did'"));
    if ($query) {
        echo '<script type="text/javascript">window.location.href="attachment.php?&d=1&project_id='.$project_id.'"</script>';
    } else {
        $msg = "something gone wrong";
    }
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "select * from `awt_attachment` where id = '$eid'");
    $query = mysqli_fetch_object($query);
    $attachment = $query->attachment;
    $filepath = $query->sample_design;
}
if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
}

function tablerow($sql,$project_id)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_attachment` where `deleted` != 1 and project_id = '$project_id'");

    $x = 1;
    while ($listdata = mysqli_fetch_object($query1)) {
        echo '  <tr>
                    <td class="text-center">' . $x . '</td>
                    <td class="d-flex justify-content-between"> ' . $listdata->attachment . '  </td>
                     <td>
                        <a href="attachment.php?&eid=' . $listdata->id . '&project_id='.$project_id.'" class="btn btns" style="color: black;"><i class="fas fa-edit"></i></a>
                        <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="attachment.php?&did=' . $listdata->id . '&project_id='.$project_id.'" class="btn btns" style="color: red;"><i class="fas fa-trash-alt"></i></a>
                     </td>
                  </tr>';
        $x++;
    }
}
