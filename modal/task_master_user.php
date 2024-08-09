<?php include('include/task_master_user.php') ?>

<div class="page-wrapper">
    <div class="container-fluid p-0 m-2">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
            <div class="col-12 d-flex justify-content-between  p-0 mb-3 " >
                        <div class="col-3 d-flex align-items-center justify-content-start p-0" >
                            <h4 class=" "><strong>Task</strong></h4>
                        </div>
                        <div class="col-2 m-0 p-0  d-flex align-items-center justify-content-end " style=""  >
                        </div>
                    </div>
              <table width="100%" class="table table-striped table-bordered table-sm" id="myTable">
                <thead class="thead-dark">
                  <tr>
                    <th class="text-left" style="width:5% ;"  >#</th>
                    <th class="text-left" style="width:20% ;" >Project Name </th>
                    <th class="text-left" style="width:30% ;" >Task </th>
                    <th class="text-left" style="width:10% ;" >Start Date </th>
                    <th class="text-left" style="width:10% ;" >End Date  </th>
                    <th class="text-left" style="width:15% ;" >Status  </th>
                    <th class="text-left" style="width:10% ;" >Action</th>
                  </tr>
               </thead>
                <tbody id="roleTableBody">
                  <!-- Sample Data -->
                  <?php getrow($sql,$id)?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
