<?php
include('include/task_master.php');
?>

<div class="page-wrapper">
    <div class="container-fluid p-0 m-2">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
            <div class="col-12 d-flex justify-content-between  p-0 mb-3 " >
                        <div class="col-3 d-flex align-items-center justify-content-start p-0" >
                            <h4 class=" "><strong><?php echo $project_name; ?> Task</strong></h4>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end " style=""  >
                          <a class="btn btn-primary mr-2" href="addtask_master.php?&project_id=<?php echo $project_id;?>">Add Task</a>
                          <a class="btn btn-success" onclick="if (confirm('Are you sure you want to end this project?')) done(<?php echo $project_id; ?>)" >Project End</a>  
                        </div>

                    </div>
              <table width="100%" class="table table-striped table-bordered table-sm" id="myTable">
                <thead class="thead-dark">
                  <tr>
                    <th class="text-left" style="width:5% ;"  >#</th>
                    <th class="text-left" style="width:55% ;" >Task </th>
                    <th class="text-left" style="width:10% ;" >Start Date </th>
                    <th class="text-left" style="width:10% ;" >End Date  </th>
                    <th class="text-left" style="width:10% ;" >Status  </th>
                    <th class="text-left" style="width:10% ;" >Action</th>
                  </tr>
               </thead>
                <tbody id="roleTableBody">
                  <!-- Sample Data -->
               <?php gettable($sql,$project_id) ; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
