<?php
include('include/project_master_customer.php');
?>
<div class="page-wrapper">
        <div class=" ">
            <div class="card m-3 row">
                <div class="card-body col-12 row   " style="margin-left: 1px;">
                    <div class="col-12 d-flex justify-content-between  p-0 mb-3 " >
                        <div class="col-3 d-flex align-items-center justify-content-start p-0" >
                            <h5 class=" "><strong>Project</strong></h5>
                        </div>
                        <div class="col-2 m-0 p-0  d-flex align-items-center justify-content-end " style=""  >
                        </div>
                    </div>


                    <div class="table-responsive pt-3"  style="border-top: 1px solid #cfcfcf ;" >
                        <table width="100%" class="table mt-3 table-bordered  table-sm" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-start">#</th>
                                    <th class="text-start" style="width: 70%;" >Project</th>
                                    <!-- <th class="text-start">Contact Person</th>
                                    <th class="text-start">Mobile no</th> -->
                                    <th class="text-start">Task</th>
                                    <th class="text-start">Status</th>
                                </tr>
                            </thead>
                            <tbody id="customerTableBody" class="">
                                <!-- Sample Data -->
                             <?php getrow($sql); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
