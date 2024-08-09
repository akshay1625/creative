<?php
include('head.php');
// include('');
include('loader.php');
?>


<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="dist/css/style.min.css">

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php
  include('sidebar_user.php');
  include('header.php');
  include('modal/task_master_details.php');
  ?>
  <!-- Page wrapper  -->

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>



<?php
include('modal/role_right.php');
include('footer.php');
?>
<script>
 $(document).ready(function() {
        new DataTable('#myTable', {
            "info": false // hide the "Showing 1 to 3 of 3 entries" text

        });
    });

    function send(id){
      $.ajax({
        type: "POST",
        url: "modal/ajax_funtion.php",
        data: {task_id:id},
        success: function(data){
          if(data!=null)
          alert("Approver Send Successfully ")
        }
      });
    }
</script>
