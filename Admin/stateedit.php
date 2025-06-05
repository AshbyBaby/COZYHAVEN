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
                  <h4 class="card-title"> State Edit Form</h4>
                  <p class="card-description">
                    State Edit form layout
                  </p>
                
                  <?php
                  if(isset($_GET['stateid']))
                  {
                    $stateid=$_GET["stateid"];
                    
                    $sqlquery="select * from tbl_state where state_id=$stateid";
                    $result=$obj->executequery($sqlquery);
                   
                    while($display=mysqli_fetch_array($result)){

          ?>
                 <form class="forms-sample" action="stateeditaction.php" method="POST">
                    
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">State name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name='txtstatename' id="exampleInputUsername2" placeholder="state name" value="<?php echo $display['state_name']?>" >
                      </div>
                        </div>
                    <input type="hidden" class="form-control" id="exampleInputUsername2" name="stateid" value="<?php echo $display['state_id']?>">
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

