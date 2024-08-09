<?php include('include/addtask_master.php') ?>

<div class="page-wrapper">
  <div class="container-fluid p-0 m-2">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="col-12 d-flex justify-content-between  p-0 ">
              <div class="col-3 d-flex align-items-center justify-content-start p-0">
                <h5 class=" "><strong>Add Task</strong></h5>
              </div>
              <div class="col-2 m-0 p-0  d-flex align-items-center justify-content-end " style="">

              </div>
            </div>

            <form class="row" action="" method="POST" enctype="multipart/form-data" id="userForm" style="margin: 1px;border-top: 1px solid black!important;
    padding-top: 15px!important;">
              <div class="form-group col-md-3" <?php if ($project_type == 0){echo "$project_type";}?>>
                <label class="text-dark" for="floor">Select Floor</label>
                <select name="floor" id="selector" class="form-select">
                  <option value="0">Select Floor</option>
                  <?php getfloor($sql, $project_id, $floor) ?>
                </select>
                <div id="floorError" style="color: red;"></div>
              </div>

              <div class="form-group col-md-3">
                <label class="text-dark" for="taskname">Floor / Task Name</label>
                <input type="text" class="form-control" id="taskname" value="<?Php echo $taskname; ?>" name="taskname">
                <div id="tasknameError" style="color: red;"></div>
              </div>
              <div class="form-group col-md-3">
                <label class="text-dark" for="artwork">Artwork For</label>
                <select name="artwork" id="selector" class="form-select">

                    <option value="0" >Select Artwork</option>
                    <option value="1" <?php if ($artwork == 1) echo 'selected'; ?>>Wall</option>
                    <option value="2" <?php if ($artwork == 2) echo 'selected'; ?>>Glass</option>
                    <option value="3" <?php if ($artwork == 3) echo 'selected'; ?>>Columns</option>

                </select>
                <div id="artworkError" style="color: red;"></div>
              </div>
              <div class="form-group col-md-3">
                <label class="text-dark" for="creative_type">Creative Type</label>
                <select class="form-select" aria-label="Default select example" id="creative_type" name="creative_type[]" multiple="multiple">
                  <?php creative($sql, $creative_type) ?>
                </select>
                <div id="costError" style="color: red;"></div>
              </div>
              <div class="form-group col-md-12">
                <label class="text-dark" for="taskdes">Task Description</label>
                <textarea class="form-control" id="taskdes" name="taskdes" rows="3"><?php echo $taskdes; ?></textarea>
                <span class="error" id="taskdesError"></span>
              </div>



              <div class="form-group col-md-3">
                <label class="text-dark" for="Exstardate">Expected Start Date</label>
                <input type="date" class="form-control" id="Exstardate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $Exstardate; ?>" name="Exstardate">
                <div id="ExstardateError" style="color: red;"></div>
              </div>
              <div class="form-group col-md-3">
                <label class="text-dark" for="Exenddate">Expected End Date</label>
                <input type="date" class="form-control" id="Exenddate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $Exenddate; ?>" name="Exenddate">
                <div id="ExenddateError" style="color: red;"></div>
              </div>
              <div class="form-group col-md-3">
                <label class="text-dark" for="seuser">Select User</label>
                <select name="seuser" id="selector" class="form-select">
                  <?php userlist($sql, $assginuser, $project_id) ?>
                </select>
                <div id="seuserError" style="color: red;"></div>
              </div>
              <div class="form-group col-12 d-flex justify-content-end">
                <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <button type="submit" style="width: 100px;" name="submit" id="submit" class="btn  btn-sm btn-primary btn-block">Submit</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
