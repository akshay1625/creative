<?php
include('include/role_master.php');
?>

<div class="page-wrapper">
    <div class="  p-3" style="height: 100vh !important; width: 100%; " >
      <div class="row">
        <div class="col-md-6 "  >
          <div class="card">
            <div class="card-body" >
              <h5 class="text-dark"><strong>Role Master </strong></h5>

              <form  method="post" id="roleForm" role="form" enctype="multipart/form-data" style="border-top: 1px solid #cfcfcf;" >
                <div class="card-body p-1 mt-2">
                  <div class="form-group">
                    <label for="roleName" class="text-dark-50 "> Title</label>
                    <input type="text" class="form-control" name="roleName" id="roleName" value="<?php echo $roleName; ?>" placeholder="Enter your Role Title. . . . ." name="roleName">
                    <h6  class="err text-danger " id="err"></h6>

                  </div>
                  <div class="form-group row mr-1 justify-content-end">
                    <input type="hidden" class="form-control" id="eid" name="eid" value="<?php echo $eid; ?>" placeholder="Enter your Role Title. . . . ." name="roleName">
                    <button type="submit" name="submit" class="btn  col-2 btn-primary btn-sm btn-block">Submit</button>

                  </div>
                 <div class="text-danger"><?php echo $msge; ?></div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <?php
              $x= mysqli_num_rows(mysqli_query($sql,"SELECT * from `awt_role` where deleted = 0"));
              ?>
              <h5 class="text-dark" style="border-bottom: 1px solid #cfcfcf;padding-bottom:5px ; "><strong>Role List (<span id="roleCount"><?php echo $x; ?></span>)</strong></h5>
              <table width="100%"   class="table table-striped align-baseline table-bordered table-sm" id="myTable">
                <thead class="thead-dark">
                  <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 70%;">Role Title</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </thead>
                <tbody id="roleTableBody">
                <?php tablerow($sql);?>


                </tbody>
              </table>
              <div style="font-size: 14px; color: red;" ><p><?php echo $msg ;?></p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


