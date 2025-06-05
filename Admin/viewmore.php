<?php
include_once("header.php");
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <div class="d-flex justify-content-end">
                      
                       </div>
                        <div class="table-responsive" style="padding-left:80px;">
                            <table class="table table-striped">
                                <thead>
                                    
                                </thead>
                                <tbody>
                                
      
                  <h4 class="card-title">OWNER DETAILS</h4>
                  <p class="card-description">
                    
                  </p>

<?php

if(isset($_GET["ownerid"]))
{
    $id=$_GET["ownerid"];
    require_once("../dboperation.php");
    $obj=new dboperation();
    $sqlquery="select * from tbl_homeowner h inner join tbl_city c on h.city_id=c.city_id inner join tbl_country co on c.country_id=co.country_id  where h.owner_id='$id' ";
    $result=$obj->executequery($sqlquery);



$row=mysqli_fetch_array($result);
?>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">

             
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">OWNER NAME</label>
                      <div class="col-sm-9">
                      <?php echo $row["owner_name"];?>
                                             </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> HOUSE NAME</label>
                      <div class="col-sm-9">
                        <?php echo $row["housename"];?>
                    </div>
                  </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">PINCODE</label>
                      <div class="col-sm-9">
                       <?php echo $row["pincode"];?>
                      </div>
                  </div>
                    
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">ID PROOF</label>
                      <div class="col-sm-9">
                      <img src="../upload/<?php echo $row["idproof"];?>" width="70" height="70">
                        
                      </div>
</div>
                    
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">PHONE NUMBER</label>
                      <div class="col-sm-9">
                        <?php echo $row["phone"];?>
                      </div>
</div>
                    
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <?php echo $row["email"];?>
                      </div>
</div>
                    
                   
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">IMAGE</label>
                      <div class="col-sm-9">
                      <img src="../upload/<?php echo $row["image"];?>" width="70" height="70">

                      </div>
</div>
                    

                <!-- <form class="forms-sample" method="post" enctype="multipart/form-data"> -->

                  <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                      <?php echo $row["country_name"];?>


                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-labelC">City</label>
                      <div class="col-sm-9">
                     <?php echo $row["city_name"];?>
                    </div>
                     </div>
                     
                     <div>
                     <!-- <td> -->
                    
    <a href="verify.php?ownerid=<?php echo $row["owner_id"]; ?>" onclick="return confirm('Are you sure you want to accept?');">
        <input type="button"name="btnVerify" class="btn btn-info btn-lg" value="VERIFY">
    </a>
    
    
    <a href="reject.php?ownerid=<?php echo $row["owner_id"]; ?>" onclick="return confirm('Are you sure you want to reject?');">
        <input type="button" name="btnReject" class="btn btn-danger btn-lg" value="REJECT">
    </a>
</div>
<!-- </td> -->
</form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>


                    

                    

        <?php
}
              include_once("footer.php");
        ?>