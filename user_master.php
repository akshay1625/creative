<?php
include('head.php');
include('loader.php');
?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="dist/css/style.min.css">

<style>


</style>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <?php
    include('sidebar.php');
    include('header.php');
    include('modal/user_master.php');
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>


<script>
    $(document).ready(function() {
        $('.status-toggle').click(function() {
            var retVal = confirm("Are you sure you want to Change Status?");
            if (retVal == true) {
                var id = $(this).data('id');
                var dataString = 'userid=' + id;
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
    <?php
    if (isset($_GET['eid']))
        echo "
$('#informationtable').hide();
$('#informationform').show();

";
    ?>

    $(document).ready(function() {
        new DataTable('#myTable', {
            "info": false
        });
    });

    <?php


    if (isset($_GET['id'])) {
        echo " 
      const displayFeild = document.getElementById('informationform');
        const inputField = document.getElementById('informationtable');
        const btns = document.getElementById('adduser');

        if (displayFeild.style.display === 'none') {
            displayFeild.style.display = 'block';
            inputField.style.display = 'none';
            btns.style.display = 'none';
        } else {
            displayFeild.style.display = 'none';
            inputField.style.display = 'block';
            btns.style.display = 'block';
        }
    ";
    }
    if (!$allok || isset($_POST['eid'])) {
        echo " 
          const displayFeild = document.getElementById('informationform');
        const inputField = document.getElementById('informationtable');
        const btns = document.getElementById('adduser');

        if (displayFeild.style.display === 'none') {
            displayFeild.style.display = 'block';
            inputField.style.display = 'none';
            btns.style.display = 'none';
        } else {
            displayFeild.style.display = 'none';
            inputField.style.display = 'block';
            btns.style.display = 'block';
        }
    ";
    }

    ?>

    function changesit() {
        const displayFeild = document.getElementById('informationform');
        const inputField = document.getElementById('informationtable');
        const btns = document.getElementById('adduser');

        if (displayFeild.style.display === 'none') {
            displayFeild.style.display = 'block';
            inputField.style.display = 'none';
            btns.style.display = 'none';
        } else {
            displayFeild.style.display = 'none';
            inputField.style.display = 'block';
            btns.style.display = 'block';
        }
    }

    $(document).ready(function() {
        $('#userForm').submit(function(event) {
            event.preventDefault();

            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var emailId = $('#emailId').val();
            var mobileNo = $('#mobileNo').val();
            var password = $('#password').val();
            var role = $('#role').val();
            var pimg = $('#pimg').val();

            var errors = {};

            if (firstName === '') {
                errors.firstName = 'First name is required';
            }

            if (lastName === '') {
                errors.lastName = 'Last name is required';
            }

            if (!validateEmail(emailId)) {
                errors.emailId = 'Invalid email address';
            }

            if (!validateMobileNo(mobileNo)) {
                errors.mobileNo = 'Invalid mobile number';
            }
            <?php if (!isset($_GET['eid'])) { ?>
                if (password === '') {
                    errors.password = 'Password is required';
                }
            <?php } ?>

            if (role === '') {
                errors.role = 'Role is required';
            }

            if (pimg === '') {
                errors.pimg = 'Profile icon is required';
            }

            if (!isEmpty(errors)) {
                displayErrors(errors);
                return false;
            }

            // If no errors, submit the form
            $(this).unbind('submit').submit();
        });

        function validateEmail(email) {
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }

        function validateMobileNo(mobileNo) {
            var mobileNoRegex = /^[0-9]{10}$/;
            return mobileNoRegex.test(mobileNo);
        }

        function isEmpty(obj) {
            return Object.keys(obj).length === 0;
        }

        function displayErrors(errors) {
            $.each(errors, function(field, error) {
                $('#' + field + 'Error').text(error);
            });
        }
    });



    $(document).ready(function() {
        $('#emailId').on('blur', function() {
            var emailId = $(this).val();
            $.ajax({
                type: "POST",
                url: "modal/ajax_funtion.php",
                data: {
                    email: emailId
                },
                cache: false,
                success: function(data) {
                    if (data == 1) {
                        $('#emailIdError').text('Email already exists');
                    } else {
                        $('#emailIdError').text('');
                    }
                }
            });
        });
        $('#mobileNo').on('blur', function() {
            var mobile_no = $(this).val();
            $.ajax({
                type: "POST",
                url: "modal/ajax_funtion.php",
                data: {
                    mobile_no: mobile_no
                },
                cache: false,
                success: function(data) {
                    if (data == 1) {
                        $('#mobileNoError').text('Mobile No already exists');
                    } else {
                        $('#mobileNoError').text('');
                    }
                }
            });
        });
    });
</script>
<?php
include('footer.php');
?>