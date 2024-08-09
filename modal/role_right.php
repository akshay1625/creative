<!-- Styles -->
<style>
    body {
        font-family: Rubik, sans-serif;
    }

    .radio-group {
        display: flex;
        justify-content: space-between;
        width: 250px;
        /* Adjust the width as needed */
    }

    .form-check {
        align-items: center;
    }
</style>

<!-- Main wrapper -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">  <h3 class=" text-dark ">Assign Role</h3></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Page wrapper -->
                <div class="page-wrapper">
                   
                            <div class="container p-0">
                                <form>
                                    <div class="form-group" style="width: 350px;">
                                        <label for="role" class="col-form-label">Select Role:</label>
                                        <select id="role" name="role" class="form-control" onchange="showAssignRights()">
                                            <option value="">-- Select Role --</option>
                                            <option value="admin">Admin</option>
                                            <option value="moderator">Moderator</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>


                                    <!-- Assign rights section -->
                                    <div id="assign-rights" style="display: none;">
                                        <h3 class="mt-4">Assign Rights:</h3>
                                        <div class="form-check d-flex justify-content-between m-2">
                                            <label class="form-check-label">User Master</label>
                                            <div class="radio-group">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="user_master" value="show" class="form-check-input">
                                                    <label class="form-check-label">Show</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="user_master" value="hide" class="form-check-input">
                                                    <label class="form-check-label">Hide</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-check d-flex justify-content-between m-2">
                                            <label class="form-check-label">Customer Master</label>
                                            <div class="radio-group">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="customer_master" value="show" class="form-check-input">
                                                    <label class="form-check-label">Show</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="customer_master" value="hide" class="form-check-input">
                                                    <label class="form-check-label">Hide</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-check d-flex justify-content-between m-2">
                                            <label class="form-check-label">Project Master</label>
                                            <div class="radio-group">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="project_master" value="show" class="form-check-input">
                                                    <label class="form-check-label">Show</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="project_master" value="hide" class="form-check-input">
                                                    <label class="form-check-label">Hide</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Assign Rights</button>
                                    </div>
                                </form>
                            </div>
                       
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    function showAssignRights() {
        var role = document.getElementById("role").value;
        var assignRightsDiv = document.getElementById("assign-rights");
        if (role) {
            assignRightsDiv.style.display = "block";
        } else {
            assignRightsDiv.style.display = "none";
        }
    }
</script>