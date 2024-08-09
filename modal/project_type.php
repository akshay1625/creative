<?php
include('include/project_type.php');
?>
<div class="page-wrapper">
  <div class=" p-3" style="height: 100vh !important; width: 100%; ">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="text-dark"><strong>Project Type Master </strong></h5>
            <form method="post" id="roleForm" role="form" enctype="multipart/form-data" style="border-top: 1px solid #cfcfcf;">
              <div class="card-body p-1 mt-2">
                <div class="form-group">
                  <label for="project_type" class="text-dark-50 "> Title</label>
                  <input type="text" class="form-control" id="project_type" value="<?php echo $project_type; ?>" placeholder="Enter Project Type. . . . ." name="project_type">
                  <h6 class="project_typeerr text-danger " id="err"><?php echo $project_typeerr; ?></h6>
                </div>
                <div class="form-group">
                  <label for="description" class="text-dark-50 "> Description</label>
                  <textarea type="text" rows="4" class="form-control" id="description" placeholder="Describe Your Project Type. . . . . ." name="description"><?php echo $description; ?></textarea>
                  <h6 class="descriptionerr text-danger " id="err"><?php echo $descriptionerr; ?></h6>
                </div>
                <div class="form-group row mr-1 justify-content-end">
                  <input type="hidden" class="form-control" id="eid" name="eid" value="<?php echo $eid; ?>" placeholder="Enter your Role Title. . . . ." name="roleName">
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
              $x= mysqli_num_rows(mysqli_query($sql,"SELECT * from `awt_project_type` where deleted = 0"));
              ?>
            <h5 class="text-dark" style="border-bottom: 1px solid #cfcfcf;padding-bottom:5px ; "><strong>Project Type List (<span id="roleCount"><?php echo $x; ?></span>)</strong></h5>
            <table width="100%" class="table table-striped align-baseline table-bordered table-sm" id="myTable">
              <thead class="thead-dark">
                <tr>
                  <th style="width: 5%;">No.</th>
                  <th style="width: 70%;">Title</th>
                  <th style="width: 20%;">Action</th>
                </tr>
              </thead>
              <tbody id="roleTableBody">
                <?php tablerow($sql); ?>
              </tbody>
            </table>
            <div style="font-size: 14px; color: red;"><p><?php echo $msg; ?></p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>