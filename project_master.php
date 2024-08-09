<?php
include('head.php');
include('loader.php');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<style>
  body {
    font-family: Rubik, sans-serif;
    background-color: #f8f9fa;

  }

  ::-webkit-scrollbar {
    display: none;
  }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="dist/css/style.min.css">
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

  <?php
  include('sidebar.php');
  include('header.php');
  include('modal/project_master.php');
  ?>
  <!-- Page wrapper  -->



</div>



<?php
include('footer.php');
?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>

<script>
  $(document).ready(function() {

    $('#assginuser').select2({
      placeholder: 'Select a Creative type',
      width: '100%'
    });
    $('#creative_type').select2({
      placeholder: 'Select a Creative type',
      width: '100%'
    });
  });
</script>
<script>
  <?Php if ($spacedesign == 1) { ?>
    document.getElementById('floor').style.display = 'block';
  <?php } ?>


  function showHideButtons(value) {
    const btn1 = document.getElementById('floor');


    if (value == 1) {
      btn1.style.display = 'block';

    } else if (value == 0) {
      btn1.style.display = 'none';

    } else {
      btn1.style.display = 'none';

    }
  }
</script>
