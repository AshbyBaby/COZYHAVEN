<?php
include_once ("header.php");
include_once ("../dboperation.php");

$obj=new dboperation();
$sql="select * from tbl_district";
$res=$obj->executequery($sql);
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">DISTRICT</h4>
                       <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-rounded mr-2"  onclick='window.location.href="districtview.php" '>VIEW</button>
                        </div>
                        <?php
                  require_once("../dboperation.php");
                  $obj=new dboperation();
                  $sqlquery="select * from tbl_country";
                  $result=$obj->executequery($sqlquery);
                  ?>
                        <form class="forms-sample" method="post" action="districtaction.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="ddlcountry" id="countryid">
                      
                       <option value="0">--SELECT--</option>
                       <?php
                       while($display=mysqli_fetch_array($result))
                       {
                          ?>
                          <option value="<?php echo $display["country_id"];?>">
                          <?php echo $display["country_name"];?></option>
                          <?php
                        
                       }
                       ?>
                       </select>
                        <?php
                  require_once("../dboperation.php");
                  $obj=new dboperation();
                  $sqlquery="select * from tbl_state";
                  $result=$obj->executequery($sqlquery);
                  ?>
                  </div>
                  </div>
                  
                        <form class="forms-sample" method="post" action="districtaction.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">State</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="txtstatename" id="stateid" required>
                      
                       <option value="0">--SELECT--</option>
                       <?php
                       while($display=mysqli_fetch_array($result))
                       {
                          ?>
                          <option value="<?php echo $display["state_id"];?>">
                          <?php echo $display["state_name"];?></option>
                          <?php
                        
                       }
                       ?>
                       

                       </select>
                       
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">District name</label>
                      <div class="col-sm-9">
                        <input type="text" name="txtdisname" class="form-control" id="exampleInputEmail2" placeholder="district_name" required >
                      </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2" name="btnAdd">Submit</button>
                    <button class="btn btn-light">Cancel</button>
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
      // alert('hi');
      $("#countryid").change(function () {
        var countryid = $(this).val();
        // alert(countryid);
        $.ajax({
          url: "getstate.php",
          method: "POST",
          data: {
            id: countryid
          },
          success: function (response) {
            $("#stateid").html(response);
          },
          error: function () {
            $("#stateid").html("Error occurred while getting location!");
          }
        });
      });
    });

      
    </script>