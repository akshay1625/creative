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
    include('modal/customer_master_list.php');
    ?>
    <!-- Page wrapper  -->


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
</script>

<?php
include('footer.php');
?>