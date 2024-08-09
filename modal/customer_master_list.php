<?php 
include('include/customer_master_list.php');
?>

<div class="page-wrapper">
        <div class=" ">
            <div class="card m-3 row">
                <div class="card-body col-12 row   " style="margin-left: 1px;">
                    <div class="col-12 d-flex justify-content-between  p-0 mb-3 " >
                        <div class="col-3 d-flex align-items-center justify-content-start p-0" >
                            <h5 class=" "><strong>Customers Master</strong></h5>
                        </div>
                        <div class="col-2 m-0 p-0  d-flex align-items-center justify-content-end " style=""  >
                            <button type="button" style="width: 150px;" class="btn  btn-sm  btn-primary"  onclick="location.href='customer_master.php?edit';">Add Customers</button>
                        </div>
                    </div>


                    <div class="table-responsive pt-3"  style="border-top: 1px solid #cfcfcf ;" >
                        <table width="100%" class="table mt-3 table-bordered  table-sm" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-left" style="width: 20%;">Company Name</th>
                                    <th class="text-left">Mobile No.</th>
                                    <th class="text-left">Email</th>
                                    <th class="text-left" style="width: 15%;">Contact Person</th>
                                    <th class="text-left">State</th>
                                    <th class="text-left">City</th>
                                    <!-- <th class="text-left">Status</th> -->
                                    <th class="text-left" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="customerTableBody" class="">
                               <?php gettable($sql) ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>