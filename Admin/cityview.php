<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery1="select  * from tbl_country ";
$result1 = $obj->executequery($sqlquery1);

?>
<?php
include_once ("header.php");
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <div class="d-flex justify-content-end">
                      
                       </div>
                        
                                <tbody>
                               
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CITY DETAILS</h4>
                  <p class="card-description">
                    
                  </p>

<select class="form-control" id="countryid"><option>--select--</option>

<?php
                       while($display=mysqli_fetch_array($result1))
                       {
                          ?>
                          <option value="<?php echo $display["country_id"];?>">
                          <?php echo $display["country_name"];?></option>
                          <?php
                        
                       }
                       ?>
                       </select>


                  <div class="table-responsive" id="cityid">
                   
                  </div>
                </di>
              </div>
            </div>
</div>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include_once ("footer.php");
?>



<?php
include_once("footer.php");
?>
<script src="../jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // alert('hi');
      $("#countryid").change(function () {
        var countryid = $(this).val();
        // alert(disid);
        $.ajax({
          url: "getcity.php",
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