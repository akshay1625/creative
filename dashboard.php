<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('head.php');
include('loader.php');


?>


<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="dist/css/style.min.css">


<!-- Main wrapper - style you can find in pages.scss -->

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <?php
    include('sidebar.php');
    include('header.php');
    ?>
    <!-- Page wrapper  -->

    <div class="page-wrapper">

        <!-- Container fluid  -->

        <div class="container-fluid">

            <!-- Start First Cards -->

            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">236</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Project</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup class="set-doller"></sup>18,306</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pending Task
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Approved</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="pocket"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Rejected</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="x-square"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End First Cards -->

            <!-- Start Top Leader Table -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title">Project</h4>
                                <div class="ml-auto">
                                    <div class="dropdown sub-dropdown">
                                        <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                            <a class="dropdown-item" href="#">Insert</a>
                                            <a class="dropdown-item" href="#">Update</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap v-middle mb-0">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="border-0 font-14 font-weight-medium text-muted">User
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted px-2">Project
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                Status
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                Task
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-top-0 px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="mr-3"><img src="assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                                                            Gover</h5>
                                                        <span class="text-muted font-14">hgover@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">Elite Admin</td>

                                            <td class="border-top-0 text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="In Testing"></i></td>
                                            <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                35
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="mr-3"><img src="assets/images/users/widget-table-pic2.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Daniel
                                                            Kristeen
                                                        </h5>
                                                        <span class="text-muted font-14">Kristeen@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted px-2 py-4 font-14">Real Homes WP Theme</td>

                                            <td class="text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="Done"></i>
                                            </td>
                                            <td class="text-center text-muted font-weight-medium px-2 py-4">32</td>

                                        </tr>
                                        <tr>
                                            <td class="px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="mr-3"><img src="assets/images/users/widget-table-pic3.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Julian
                                                            Josephs
                                                        </h5>
                                                        <span class="text-muted font-14">Josephs@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted px-2 py-4 font-14">MedicalPro WP Theme</td>

                                            <td class="text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="Done"></i>
                                            </td>
                                            <td class="text-center text-muted font-weight-medium px-2 py-4">29</td>

                                        </tr>
                                        <tr>
                                            <td class="px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="mr-3"><img src="assets/images/users/widget-table-pic4.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Jan
                                                            Petrovic
                                                        </h5>
                                                        <span class="text-muted font-14">hgover@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted px-2 py-4 font-14">Hosting Press HTML</td>

                                            <td class="text-center px-2 py-4"><i class="fa fa-circle text-danger font-12" data-toggle="tooltip" data-placement="top" title="In Progress"></i></td>
                                            <td class="text-center text-muted font-weight-medium px-2 py-4">23</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Top Leader Table -->

        </div>

        <!-- End Container fluid  -->

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<?php
include('footer.php');
?>
