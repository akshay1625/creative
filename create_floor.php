<?php
include('head.php');
include('loader.php');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="dist/css/style.min.css">
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <?php
    include('sidebar.php');
    include('header.php');
    ?>
    <!-- Page wrapper  -->

    <div class="page-wrapper">
        <!-- new entry -->


        <div class="container-fluid p-0 ">
            <div class="card m-3 row">
                <div class=" card-body col-12">
                    <h5 class=" text-dark"><strong>Create Floor</strong></h5>
                    <hr>
                    <!-- //create a form with single inpur -->
                    <form action="create_floor.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="floor_name" class=" col-2 col-sm-2 col-form-label">No of Floor</label>
                            <div class="col-sm-10 col-2 row">
                                <input type="text" class="form-control w-25" id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                <button type="button" id="ADD" class=" btn btn-primary " style="width: 50px;font-size: 25px;padding: 0;" name="floor_name">+</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class=" row m-1 " id="floor">
            
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>

<?php
include('footer.php');
?>

<script>
   
        $('#ADD').click(function() {
            var floorCount = parseInt($('#floor_name').val());
            $('#ADD').hide()
       
            if (floorCount > 0) {
                for (var i = 1; i <= floorCount; i++) {
                    $('#floor').append(`
                     <div class="col-4">
                    <div class="card">
                        <div class=" card-body ">
                            <div class="row">
                                <h5 class=" col-10 text-dark"><strong>Floor : 1 Wall</strong></h5>
                                <button type="button" class=" btn btn-primary col-2 " style="width: 50px;font-size: 25px;padding: 0;" name="floor_name">+</button>
                            </div>

                            <form action="create_floor.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control " id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                <div class="form-group">
                                    <label for="floor_name" class=" form-label">Wall : 1</label>
                                    <input type="text" class="form-control " id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                </div>
                                <button type="button" class=" btn btn-sm btn-primary " name="floor_name">Submit Floor</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-4     ">
                    <div class="card">
                        <div class=" card-body ">
                            <div class="row">
                                <h5 class=" col-10 text-dark"><strong>Floor : 1 Glass</strong></h5>
                                <button type="button" class=" btn btn-primary col-2 " style="width: 50px;font-size: 25px;padding: 0;" name="floor_name">+</button>
                            </div>

                            <form action="create_floor.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control " id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                <div class="form-group">
                                    <label for="floor_name" class=" form-label">Glass : 1</label>
                                    <input type="text" class="form-control " id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                </div>
                                <button type="button" class=" btn btn-sm btn-primary " name="floor_name">Submit Floor</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-4     ">
                    <div class="card">
                        <div class=" card-body ">
                            <div class="row">
                                <h5 class=" col-10 text-dark"><strong>Floor : 1 Columne</strong></h5>
                                <button type="button" class=" btn btn-primary col-2 " style="width: 50px;font-size: 25px;padding: 0;" name="floor_name">+</button>
                            </div>

                            <form action="create_floor.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control " id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                <div class="form-group">
                                    <label for="floor_name" class=" form-label">Columne : 1</label>
                                    <input type="text" class="form-control " id="floor_name" name="floor_name" placeholder="Enter Floor Name">
                                </div>
                                <button type="button" class=" btn btn-sm btn-primary " name="floor_name">Submit Floor</button>
                            </form>
                        </div>
                    </div>

                </div>
                    `);
                }
            } else {
                alert('Please enter a valid number of floors');
            }
        });

</script>