<?php
include_once ("header.php");
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="    margin-left: 258px;">
                    <div class="card-body">
                        <h4 class="card-title">City </h4>
                       <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-rounded mr-2"  onclick='window.location.href="cityview.php" '>VIEW</button>
                        </div>
                        <?php
                  require_once("../dboperation.php");
                  $obj=new dboperation();
                  $sqlquery="select * from tbl_country";
                  $result=$obj->executequery($sqlquery);
                  ?>
                        <form class="forms-sample" method="post" action="cityaction.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="ddlcountry"required>
                      
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
                       
                        
                      </div>
                    </div>
                        <form class="forms-sample"  method="POST" action="cityaction.php" >
                            <div class="form-group">
                                <label for="exampleInputName1">City Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required >
                            </div>
                           
                            <button type="submit" name="btnadd" class="btn btn-primary mr-2" >Submit</button>
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