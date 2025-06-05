<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery1="select  * from tbl_country ";
$result1 = $obj->executequery($sqlquery1);

?>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">COUNTRY DETAILS</h4>
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


                  <div class="table-responsive" id="stateid">
                   
                  </div>
                </di>
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
        // alert(disid);
        $.ajax({
          url: "getstates.php",
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