<?php
include('include/attachment.php');
?>

<div class="page-wrapper">
  <div class=" p-3" style="height: 100vh !important; width: 100%; ">
    <div class="row">
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">
            <h5 class="text-dark"><strong>Attachment Master </strong></h5>
            <form method="post" id="roleForm" role="form" enctype="multipart/form-data" style="border-top: 1px solid #cfcfcf;">
              <div class="card-body p-1 mt-2">
                <div class="form-group">
                  <label for="attachment" class="text-dark-50 "> Title</label>
                  <input type="text" class="form-control" id="attachment" value="<?php echo $attachment; ?>" placeholder="Enter" name="attachment">
                  <h6 class="attecmenterr text-danger " id="err"><?php echo $attachmenterr; ?></h6>
                </div>
                <div class="form-group w-50">
                  <label class="text-dark" for="smpatt">Sample Design and Attachment</label>
                  <input type="file" class="form-control" id="smpatt" name="smpatt">
                  <span class="error" id="smpattError"></span>
                  <?php
                  if ($filepath) {
                    echo '<img src="upload/profile_img/' . $filepath . '" width="100px">';
                  }
                  ?>
                </div>
                <div class="form-group row mr-1 justify-content-end">
                  <input type="hidden" name="filepath" value="<?php echo $filepath ?>">
                  <input type="hidden" name="project_id" value="<?Php echo $project_id;?>" >
                  <input type="hidden" class="form-control" id="eid" name="eid" value="<?php echo $eid; ?>" placeholder="Enter your Role Title. . . . ." >
                  <button type="submit" name="submit" class="btn  col-2 btn-primary btn-sm btn-block">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <?php
            $x = mysqli_num_rows(mysqli_query($sql, "SELECT * FROM `awt_attachment` where `deleted` != 1 and project_id = '$project_id'"));
            ?>
            <h5 class="text-dark" style="border-bottom: 1px solid #cfcfcf;padding-bottom:5px ; "><strong>Creative Type List (<span id="roleCount"><?php echo $x; ?></span>)</strong></h5>
            <table width="100%" class="table table-striped align-baseline table-bordered table-sm" id="myTable">
              <thead class="thead-dark">
                <tr>
                  <th style="width: 5%;">No.</th>
                  <th style="width: 70%;">Title</th>
                  <th style="width: 20%;">Action</th>
                </tr>
              </thead>
              <tbody id="roleTableBody">
                <?php tablerow($sql,$project_id); ?>


              </tbody>
            </table>
            <div style="font-size: 14px; color: red;">
              <p><?php echo $msg; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>