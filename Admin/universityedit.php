<?php
include_once("header.php");
include_once("../dboperation.php");
$obj=new dboperation();
 $id=$_GET['universityid'];
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> University Edit Form</h4>
                  <p class="card-description">
                    University Edit form layout
                  </p>
                  <form class="forms-sample" action=universityeditaction.php method="POST">
                    <?php
                     $sql="select * from tbl_university where university_id='$id'";
                        $res=$obj->executequery($sql) ;
                        while ($display =mysqli_fetch_array($res)){
                                ?>
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">University name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name='txtuniversityname' id="exampleInputUsername2" placeholder="university name" value="<?php echo $display['university_name']?>" >
                      </div>
                        </div>
                    <?php
                        }
                        ?>
                        <input type="hidden" name="universityid" value="<?php echo $id?>" >
                      
                    <button type="submit" name="btnadd" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  
                </div>
              </div>
            </div>

<?php
include_once("footer.php");
?>

