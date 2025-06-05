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
                                
      
                  <h4 class="card-title">HOME DETAILS</h4>
                  <p class="card-description">
                    
                  </p>

<?php

if(isset($_GET["hid"]))
{
    $id=$_GET["hid"];
    require_once("../dboperation.php");
    $obj=new dboperation();

     $sqlquery = "select * from tbl_homedetails h inner join tbl_homeowner c on h.owner_id=c.owner_id where h.home_id='$id'; ";
    $result=$obj->executequery($sqlquery);

$row=mysqli_fetch_array($result);

?>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">

                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Type</label>
                      <div class="col-sm-9">
                      <?php echo $row["type"];?>
                                             </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">HOME NAME</label>
                      <div class="col-sm-9">
                      <?php echo $row["Home_name"];?>
                                             </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">DESCRIPTION </label>
                      <div class="col-sm-9">
                        <?php echo $row["description"];?>
                    </div>
                  </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NO OF PERSONS</label>
                      <div class="col-sm-9">
                       <?php echo $row["noofperson"];?>
                      </div>
                  </div>
                    
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">RATE</label>
                      <div class="col-sm-9">
                       <?php echo $row["rate"];?>
                      </div>
</div>

<div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">OWNER NAME</label>
                      <div class="col-sm-9">
                       <?php echo $row["owner_name"];?>
                      </div>
</div>
                    
                    
                    
                   
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">IMAGE</label>
                      <div class="col-sm-9">
                      <img src="../upload/<?php echo $row["Image"];?>" width="70" height="70">

                      </div>
</div>
                    

                <!-- <form class="forms-sample" method="post" enctype="multipart/form-data"> -->
                  <?php
                if($row['type']=="city")
{
  $sql="select * from  tbl_city c inner join tbl_country co on c.country_id=co.country_id where c.city_id=$row[7]";
  $r=$obj->executequery($sql);

$row1=mysqli_fetch_array($r);
?>
<div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-labelC">Country</label>
                      <div class="col-sm-9">
                     <?php echo $row1["country_name"];?>
                    </div>
                     </div>
                     
                     <div></div>
                     <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-labelC">City</label>
                      <div class="col-sm-9">
                     <?php echo $row1["city_name"];?>
                    </div>
                     </div>
                     
                     <div></div>
<?php
}
else
{
  $sql="select * from  tbl_university u inner join tbl_city c  on u.city_id=c.city_id inner join tbl_country co on c.country_id=co.country_id where u.university_id=$row[7]";
  $r=$obj->executequery($sql);

  $row1=mysqli_fetch_array($r);
  ?>
  <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-labelC">Country</label>
                        <div class="col-sm-9">
                       <?php echo $row1["country_name"];?>
                      </div>
                       </div>
                       
                       <div></div>
                       <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-labelC">City</label>
                        <div class="col-sm-9">
                       <?php echo $row1["city_name"];?>
                      </div>
                       </div>
                       
                       <div></div>
                       <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-labelC">University</label>
                        <div class="col-sm-9">
                       <?php echo $row1["university_name"];?>
                      </div>
                       </div>
                       
                       <div></div>
                       <?php
}

?>
                 
                     
                     <!-- <td> -->
                    
    <a href="verifypro.php?hid=<?php echo $row["Home_id"]; ?>" onclick="return confirm('Are you sure you want to accept?');">
        <input type="button"name="btnVerify" class="btn btn-info btn-lg" value="VERIFY">
    </a>
    
    
    <a href="rejectpro.php?hid=<?php echo $row["Home_id"]; ?>" onclick="return confirm('Are you sure you want to reject?');">
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