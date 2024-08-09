<?php
// Include header files
include('head.php');
include('loader.php');
?>

<!-- Styles -->
<style>
  body {
    font-family: Rubik, sans-serif;
    background-color: #f8f9fa;
    padding: 0%;
    margin: 0%;
  }

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="dist/css/style.min.css">
<!-- Main wrapper -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <?php
    // Include sbar and header
    include('sidebar.php');
    include('header.php');
    ?>

    <!-- Page wrapper -->
    <div class="page-wrapper">
        <div class="card m-3">
            <div class="card-body " >
                <h5 class="text-dark"><strong>Role Pages Right</strong></h5>
                <div class="container p-1">
                    <form>
                        <div class="form-group" style="width: 350px;display: none;" >
                            <label for="role" class="col-form-label">Select Role</label>
                            <select id="role" name="role" class="form-control">
                                <option value="">-- Select Role --</option>
                                <option <?php if (isset($_GET['id'])) {
                                            echo "selected";
                                        } ?> value="admin">Admin</option>
                                <option <?php if (isset($_GET['id'])) {
                                            echo "selected";
                                        } ?> value="degisner">Degisner</option>
                                <option <?php if (isset($_GET['id'])) {
                                            echo "selected";
                                        } ?> value="code">Code</option>
                            </select>
                        </div>


                        <!-- Assign rights section -->
                        <div id="assign-rights">
                            <div class="row mb-2">
                                <div class="col-3 text-left">Role Right</div>
                                <div class="col-2 text-center">Block</div>
                                <div class="col-2 text-center">View</div>
                                <div class="col-2 text-center">Edit</div>
                                <div class="col-2 text-center">Full</div>
                            </div>
                            <div class="row  align-items-center  mb-2">
                                <label class=" text- text-left col-3">User Master Pages</label>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="user_master" value="1" checked class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="user_master" value="2" class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="user_master" value="3" class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="user_master" value="4"class="form-check">
                                </div>
                                <hr>
                            </div>
                            <div class="row  align-items-center  mb-2">
                                <label class=" text- text-left col-3">Customer Master Pages</label>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="customer" value="1" checked class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="customer" value="2" class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="customer" value="3" class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="customer" value="4" class="form-check">
                                </div>
                                <hr>
                            </div>
                            <div class="row  align-items-center  mb-2">
                                <label class=" text- text-left col-3">Project type Pages</label>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="project" value="1" checked class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="project" value="2" class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="project" value="3" class="form-check">
                                </div>
                                <div class=" col-2 d-flex justify-content-center">
                                    <input type="radio" name="project" value="4" class="form-check">
                                </div>
                                <hr>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="location.href='role_master.php';">Assign it!</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->


<?php
// Include footer
include('footer.php');
?>