<?php include('include/task_master_details.php'); ?>

<div class="page-wrapper shadow-none">

  <div class="card p-0 m-2 ">

    <div class="card-title m-0 p-2">
      <div class="d-flex justify-content-between align-items-md-center m-1 ">
        <h4><strong>Task Details</strong></h4>

      </div>
    </div>
  </div>
  <div class="p-0 m-2 ">
    <div class="row  ">
      <!-- Left Column: Task Details -->
      <div class="col-md-4 ">
        <div class="card mb-3">
          <div class="card-body">
            <h4>Task Information</h4>
            <div class="">
              <hr>
              <?php if (!empty($floor_no)) { ?>
                <h4><strong class="fa-1x" style="font-size: 15px;">Floor No:</strong> <span style="font-size: 13px;"><?php echo $floor_no; ?></span></h4>
                <hr>
                <h4><strong class="fa-1x" style="font-size: 15px;">Floor Name:</strong> <span style="font-size: 13px;"><?php echo $floor_name; ?></span></h4>
                <hr>
              <?php } else { ?>
                <h4><strong class="fa-1x" style="font-size: 15px;">Name:</strong> <span style="font-size: 13px;"><?php echo $floor_name; ?></span></h4>
                <hr>
              <?php } ?>
              <h4><strong class="fa-1x" style="font-size: 15px;">Artwork For :</strong> <span style="font-size: 13px;"><?php echo $artwork_for; ?></span></h4>
              <hr>
              <h4><strong class="fa-1x" style="font-size: 15px;">Creative Type:</strong> <span style="font-size: 13px;"><?php echo $creative_type; ?></span></h4>
              <hr>
              <h4><strong class="fa-1x" style="font-size: 15px;">Actual Start :</strong> <span style="font-size: 13px;"><?php echo $act_start; ?></span></h4>
              <hr>
              <h4><strong class="fa-1x" style="font-size: 15px;">Actual End :</strong> <span style="font-size: 13px;"><?php echo $act_end; ?></span></h4>
              <hr>
              <h4><strong class="fa-1x" style="font-size: 15px;">Task Description :</strong></h4>
              <p><span style="font-size: 13px;"><?php echo $description; ?></span></p>
            </div>
            <div>
              <?php if ($task_status == 1) { ?>
                <a href="task_master_details.php?&id=<?php echo $id; ?>&start=<?php echo $id; ?>" class="btn btn-primary btn-sm" style="font-size: 18px;">Start Task</a>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Form or Table -->

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form method="post" id="roleForm" role="form" enctype="multipart/form-data">
              <div class="form-group">
                <label for="filepath">Enter the File path</label>
                <input type="text" class="form-control" name="filepath" value="<?php echo $filepath; ?>" id="filepath">
                <h6 id="filepatherr" class="text-danger" ><?php echo $filepatherr; ?></h6>
              </div>
              <div class="form-group">
                <label for="preview">Upload Preview Image</label>
                <input type="file" name="preview" class="form-control-file" id="preview">
                <h6 id="previewerr" class="text-danger" ><?php echo $filepathserr; ?></h6>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
<?php
   if ($task_status > 1) {
$querys = mysqli_query($sql, "Select * from `task_status_history` where task_id= '$id' ORDER BY `task_status_history`.`updated_date` DESC");
 $listdata12 = mysqli_fetch_object($querys);
$status12 = $listdata12->status;
if ($status12 == 1) {
  // $status = "Awaiting for Admin Approval";
} elseif ($status12 == 2) {
  $deny_reason = $listdata12->deny_reason;
  echo '     <div class="card">
          <div class="card-body">
            <p class="m-0 text-danger ">'.$deny_reason.'</p>
          </div>
        </div>';
} elseif ($status12 == 3) {
  // $status = "Awaiting For Customer Approval";
} elseif ($status12 == 4) {
  // $status = "Approval By Customer";
}elseif ($status12 == 5 ) {
  $deny_reason = $listdata12->deny_reason;
  echo '     <div class="card">
  <div class="card-body">
    <p class="m-0 text-danger ">'.$deny_reason.'</p>
  </div>
</div>';
}
   }
  ?>


        <?php getrow($sql,$id)?>


      </div>
    </div>
  </div>
</div>
