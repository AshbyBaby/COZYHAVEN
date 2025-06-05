<?php
include_once("header.php");
include_once("../dboperation.php");
$obj=new dboperation();

?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Country Edit Form</h4>
                  <p class="card-description">
                    Country Edit form layout
                  </p>
                
                  <?php
                  if(isset($_GET['countryid']))
                  {
                    $countryid=$_GET["countryid"];
                    include_once("../dboperation.php");
                    $obj=new dboperation();
                    $sqlquery="select * from tbl_country where country_id=$countryid";
                    $result=$obj->executequery($sqlquery);
                   
                    while($display=mysqli_fetch_array($result)){

          ?>
                 <form class="forms-sample" action="countryeditaction.php" method="POST">
                    
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">country name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name='txtcountryname' id="exampleInputUsername2" placeholder="country name" value="<?php echo $display['country_name']?>" >
                      </div>
                        </div>
                    <input type="hidden" class="form-control" id="exampleInputUsername2" name="countryid" value="<?php echo $display['country_id']?>">
                    <button type="submit"  class="btn btn-primary mr-2" name="btnadd" >Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  
                </div>
              </div>
            </div>

<?php
                  }}
include_once("footer.php");
?>

