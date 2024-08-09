<?php
include('include/project_master.php');
?>

<div class="page-wrapper">
    <div class="container-fluid p-0 ">
        <div class="card m-3 row">
            <div class=" card-body col-12">
                <h5 class=" text-dark"><strong>Project</strong></h5>

                <form id="customerForm" method="post"  role="form" enctype="multipart/form-data" class="mb-5" style="border-top: 1px solid black ; padding-top:15px;">

                    <div class="form-row">
                        <div class="form-group col-3">
                            <label class="text-dark" for="projecttitle">Project Title</label>
                            <input type="text" value="<?php echo $projecttitle; ?>" class="form-control" id="projecttitle" name="projecttitle">
                            <span class="error" id="projecttitleError"></span>
                        </div>
                        <div class="form-group col-3">
                            <label class="text-dark" for="companyName">Customer Name</label>
                            <select class="form-control" id="companyName" name="companyName">
                                <?php company($sql, $companyName); ?>
                            </select>
                            <span class="error" id="companyNameError"></span>
                        </div>

                        <div class="form-group col-3">
                            <label class="text-dark" for="projecttag">Project tag</label>
                            <input type="text" value="<?php echo $projecttag; ?>" class="form-control" id="projecttag" name="projecttag">
                            <span class="error" id="projecttagError"></span>
                        </div>

                        <div class="form-group col-3">
                            <label class="text-dark" for="creative_type">Creative type</label>
                            <select class="form-select" aria-label="Default select example" id="creative_type" name="creative_type[]" multiple="multiple">
                                <?php creative($sql, $creative_type) ?>
                            </select>
                            <span class="error" id="creative_typeError"></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="information">Project Information</label>
                        <textarea class="form-control" id="information" name="information" rows="3"><?php echo $information ?></textarea>
                        <span class="error" id="informationError"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label class="text-dark" for="projecttype">Project Type</label>
                            <select class="form-control" id="projecttype" name="projecttype">
                                <?php projecttypes($sql, $projecttype) ?>
                            </select>
                            <span class="error" id="projecttypeError"></span>
                        </div>
                        <div class="form-group col-3">
                            <label class="text-dark" for="cost">Project Cost</label>
                            <input type="text" value="<?php echo $cost ?>" class="form-control" id="cost" name="cost">
                            <span class="error" id="costError"></span>
                        </div>

                        <div class="form-group col-3">
                            <label class="text-dark" for="assginuser">Assign User</label>
                            <select class="form-select select2 " aria-label="Default select example" id="assginuser" name="assginuser[]" multiple="multiple">
                                <?php userlist($sql, $assginuser) ?>
                            </select>
                            <span class="error" id="assginuserError"></span>
                        </div>
                        <div class="form-group col-3 ">
                            <label class="text-dark" for="spacedesign">Is this is a Space Design</label>
                            <select class="form-control" id="spacedesign" name="spacedesign" onchange="showHideButtons(this.value)">
                                <!-- Add options here -->
                                    <option value="" >Select a option</option>
                                <!-- You can add more options like this -->
                                    <option value="1" <?php if($spacedesign == 1){ echo "selected"; }?> >Yes</option>
                                    <option value="0" <?php if($spacedesign == 0){ echo "selected"; }?> >No</option>

                            </select>
                            <span class="error" id="spacedesignError"></span>
                        </div>

                        <div class="form-group col-3" id="floor" style="display: none;">
                            <label class="text-dark" for="">No of Floor</label>
                            <input type="text" value="<?php echo $floor; ?>" class="form-control" id="floor" name="floor">
                            <span class="error" id="floorError"></span>
                        </div>
                    </div>
                    <div class=" mt-3 d-flex justify-content-end">
                        <input type="hidden" name="eid" value="<?php echo $eid ; ?>">
                        <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
