<?php
include_once("header.php");
include_once("../dboperation.php");
$obj=new dboperation();
$sql="select * from tbl_university";
$res=$obj->executequery($sql);
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">University</h4>
                       <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-rounded mr-2"  onclick='window.location.href="universityview.php" '>VIEW</button>
                        </div>
                        <?php
                  require_once("../dboperation.php");
                  $obj=new dboperation();
                  $sqlquery="select * from tbl_country";
                  $result=$obj->executequery($sqlquery);
                  ?>
                        <form class="forms-sample" method="post" action="universityaction.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="ddlcountry" id="countryid"required>
                      
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
                  $sqlquery="select * from tbl_city";
                  $result=$obj->executequery($sqlquery);
                  ?>
                  </div>
                  </div>
                  
                        <form class="forms-sample" method="post" action="universityction.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="txtcityname" id="cityid"required>
                      
                       <option value="0">--SELECT--</option>
                       <?php
                       while($display=mysqli_fetch_array($result))
                       {
                          ?>
                          <option value="<?php echo $display["city_id"];?>">
                          <?php echo $display["city_name"];?></option>
                          <?php
                        
                       }
                       ?>
                       </select>

                     </div>
                     </div>
                     
                     
                       <form class="forms-sample">
                            <div class="form-group row">
                                <label for="exampleInputName1" class="col-sm-3 col-form-label" >University name</label>
                                <input type="text" name="txtuniversity" class="form-control" id="exampleInputName1" placeholder="Name" required>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" name="btnadd">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <?php
            include_once ("footer.php");
            ?>
            
<script src="../jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // alert('hi');
      $("#countryid").change(function () {
        var countryid = $(this).val();
        // alert(countryid);
        $.ajax({
          url: "getcities.php",
          method: "POST",
          data: {
            id: countryid
          },
          success: function (response) {
            $("#cityid").html(response);
          },
          error: function () {
            $("#cityid").html("Error occurred while getting location!");
          }
        });
      });
    });

      
    </script>