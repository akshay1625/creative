 <?php
  include('include/review_master.php');
  ?>

 <div class="page-wrapper">
   <div class=" ">
     <div class="card m-3 row">
       <div class="card-body col-12 row   " style="margin-left: 1px;">
         <div class="col-12 d-flex justify-content-between  p-0 mb-3 ">
           <div class="col-3 d-flex align-items-center justify-content-start p-0">
             <h5 class=" "><strong>Review Task</strong></h5>
           </div>
           
         </div>


         <div class="table-responsive pt-3" style="border-top: 1px solid #cfcfcf ;">
           <table width="100%" class="table mt-3 table-bordered  table-sm" id="myTable">
             <thead class="thead-dark">
               <tr>
                 <th class="text-left" style="width:5% ;">#</th>
                 <th class="text-left" style="width:50% ;">Task </th>
                 <th class="text-left" style="width:10% ;">Assign To</th>
                 <th class="text-left" style="width:10% ;">View </th>
                 <th class="text-left" style="width:15% ;">status </th>
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
