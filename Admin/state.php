<?php
include_once ("header.php");
include_once ("../dboperation.php");

$obj=new dboperation();
$sql="select * from tbl_state";
$res=$obj->executequery($sql);
?>
<style>
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }
    .btn-rounded {
        border-radius: 50px;
    };
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">Add State</h4>
                       <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-rounded"  onclick='window.location.href="stateview.php" '>VIEW</button>
                        </div>
                        <?php
                        $sqlquery = "SELECT * FROM tbl_country";
                        $result = $obj->executequery($sqlquery);
                        ?>
                        <form class="forms-sample" method="post" action="stateaction.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="countrySelect" class="form-label">Country</label>
                                <select class="form-control form-control-sm" name="ddlcountry" id="countrySelect" >
                                    <option value="0">--SELECT--</option>
                                    <?php
                                    while ($display = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $display["country_id"] . '">' . $display["country_name"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stateName" class="form-label">State Name</label>
                                <input type="text" name="txtstatename" class="form-control" id="stateName" placeholder="Enter state name" required >
                            </div>
                            <div class="button-group">
                                <button type="submit" class="btn btn-primary" name="btnAdd">Save</button>
                                <a href="stateview.php" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>