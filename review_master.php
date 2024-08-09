<?php
include('head.php');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">

<link rel="stylesheet" href="dist/css/style.min.css">
<style>



</style>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

  <?php
  include('sidebar.php');
  include('header.php');
  include('modal/review_master.php');
  ?>
  <!-- Page wrapper  -->


</div>

<div class="modal fade" id="Deny" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: black !important; " id="exampleModalLongTitle">Deny Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="denyReason" style="color: black !important; ">What is the reason for deny?</label>
            <textarea class="form-control" id="denyReason" name="denyReason" rows="5"></textarea>
          </div>
          <div class="modal-footer p-0">
            <input type="hidden" name="denyid" id="denyid">
            <button type="submit" class="btn btn-primary" name="submit" data-dismiss="#Deny" aria-label="modal">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="images" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: black!important; " id="exampleModalLongTitle">Image Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="assets/images/BANNER1.png" id="imagePreview" style="width: 100%; height: auto;">
      </div>
      <div class="modal-footer">
        <div id="dey" class="d-flex">
          <button class="btn btn-primary edit-btn mr-2" data-toggle="modal" data-target="#images" name="approves" onclick="approves()" data-dismiss="modal" id="approves">Approve</button>
          </form>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Deny" onclick="hidebtn()" data-dismiss="modal" id="Deny">Deny</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="reassign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: black!important; " id="exampleModalLongTitle">Image Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="assets/images/BANNER1.png" id="imagePreviewa" style="width: 100%; height: auto;">
      </div>
      <div class="modal-footer">
        <div id="dey" class="d-flex">
          <button class="btn btn-danger edit-btn mr-2" data-toggle="modal" data-target="#reassign" name="approves" onclick="reassigns()" data-dismiss="modal" id="approves">Reassign</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="close" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: black!important; " id="exampleModalLongTitle">Image Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="assets/images/BANNER1.png" id="imagePreviews" style="width: 100%; height: auto;">
      </div>
      <div class="modal-footer">
        <div id="clo">
          <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>

<script>
  $(document).ready(function() {
    new DataTable('#myTable', {
      "info": false // hide the "Showing 1 to 3 of 3 entries" text
    });
  });

  function approves(){
    $.ajax({
      type: "POST",
      url: "modal/ajax_funtion.php",
      data: {
        "denyid": $("#denyid").val(),
      },
      success:function(data){
        location.reload()
      }

    });
  }
  function reassigns(){
    $.ajax({
      type: "POST",
      url: "modal/ajax_funtion.php",
      data: {
        "reassign": $("#denyid").val(),
      },
      success:function(data){
        location.reload()
      }

    });
  }

  function getdata(id) {
    var data = "id=" + id;
    $.ajax({
      type: "POST",
      url: "modal/ajax_funtion.php",
      data: data,
      success: function(data) {
        var response = JSON.parse(data);
        $('#imagePreview')[0].src = 'upload/task/' + response.filepath;
        $('#imagePreviews')[0].src = 'upload/task/' + response.filepath;
        $('#imagePreviewa')[0].src = 'upload/task/' + response.filepath;
        $('#denyid').val(response.id);
        $('#denyido').val(response.id);
        console.log(response.id); // You can access the ID value like this
      }
    });
  }
</script>

<?php
include('footer.php');
?>
