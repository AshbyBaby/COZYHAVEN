<?php
include_once("header.php");
include_once("../dboperation.php");

$obj = new dboperation();
$sql = "SELECT * FROM tbl_country";
$result = $obj->executequery($sql);
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">Add Districts</h4>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-rounded"
                                onclick='window.location.href="districtview.php" '>VIEW</button>
                        </div>

                        <form class="forms-sample" method="post" action="districtaction.php"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="countryid" class="col-sm-3 col-form-label form-label">Country</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="ddlcountry" id="countryid">
                                        <option value="0">--SELECT--</option>
                                        <?php
                                        while ($display = mysqli_fetch_array($result)) {
                                            echo '<option value="' . $display["country_id"] . '">' . $display["country_name"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stateid" class="col-sm-3 col-form-label form-label">State</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="txtstatename" id="stateid">
                                        <option value="0">--SELECT--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label form-label">District
                                    Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="txtdisname" class="form-control" id="exampleInputEmail2"
                                        placeholder="Enter district name" required>
                                </div>
                            </div>

                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary" name="btnAdd">Save</button>
                                <a href="districtview.php" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once("footer.php");
        ?>

        <script src="../jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#countryid").change(function () {
                    var countryid = $(this).val();
                    $.ajax({
                        url: "getstate.php",
                        method: "POST",
                        data: { id: countryid },
                        success: function (response) {
                            $("#stateid").html(response);
                        },
                        error: function () {
                            $("#stateid").html("<option>Error occurred while getting states!</option>");
                        }
                    });
                });
            });
        </script>