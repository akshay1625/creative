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

    .container {
        margin-top: 50px;
    }

    .form-group {
        margin-bottom: 20px;
        /* Increased margin for better spacing */
    }


    .table {
        font-size: 15px;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 5px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f0f0f0;
    }

    .table td {
        border-bottom: 1px solid #ddd;
    }

    .error {
        color: red;
        font-size: small;
    }

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        /* reduced width */
        height: 20px;
        /* reduced height */
    }

    .switch input[type="checkbox"] {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 20px;
        /* added border radius */

    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        /* reduced height */
        width: 16px;
        /* reduced width */
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;

    }

    input[type="checkbox"]:checked+.slider {
        background-color: #2196F3;
    }

    input[type="checkbox"]:checked+.slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }

    .slider.round {
        border-radius: 20px;
        /* added border radius */
    }

    .slider.round:before {
        border-radius: 50%;
        /* added border radius */
    }

    .project-row {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .project-row:hover {
        background-color: #f5f5f5;
    }

    /* Add some space between the project icons and text */
    .project-row img {
        margin-right: 10px;
    }

    /* Make the action buttons more prominent */
    .btn-sm {
        padding: 6px 12px;
        font-size: 14px;
    }

    .btn-sm:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>
<link rel="stylesheet" href="dist/css/style.min.css">
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <?php
    include('sidebar.php');
    include('header.php');
    ?>
    <!-- Page wrapper  -->

    <div class="page-wrapper">
        <!-- new entry -->
        <?php if (isset($_GET['edit'])) {
            include('modal/edit.php');
        } else {
            include('modal/master.php');
        } ?>
    </div>
</div>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    $(document).ready(function() {
        $('.status-toggle').click(function() {
            var retVal = confirm("Are you sure you want to Change Status?");
            if (retVal == true) {
                var id = $(this).data('id');
                var dataString = 'default_no=' + id;
                //alert(dataString);
                $.ajax({
                    type: "POST",
                    url: "modal/ajax_funtion.php",
                    data: dataString,
                    cache: false,
                    success: function(data) {
                        //alert(data);              
                    }
                });
            } else {
                window.location.href = "";
            }
        });
    });
</script>
<script>
<?php if(isset($_GET['ecid'])){?>
 const displayFeild = document.getElementById('displayfeild');
 const inputField = document.getElementById('input_field');
 displayFeild.style.display = 'none';
 inputField.style.display = 'block';
<?php } ?>

    function changesit() {

        const displayFeild = document.getElementById('displayfeild');
        const inputField = document.getElementById('input_field');

        if (displayFeild.style.display === 'none') {
            displayFeild.style.display = 'block';
            inputField.style.display = 'none';
        } else {
            displayFeild.style.display = 'none';
            inputField.style.display = 'block';
        }
    }

    $(document).ready(function() {
        $('#email').on('blur', function() {
            var email = $(this).val();
            $.ajax({
                type: "POST",
                url: "modal/ajax_funtion.php",
                data: {
                    email: email
                },
                cache: false,
                success: function(data) {
                    if (data == 1) {
                        $('#emailError').text('Email already exists');
                    } else {
                        $('#emailError').text('');
                    }
                }
            });
        });
    });



</script>

<?php
include('footer.php');
?>