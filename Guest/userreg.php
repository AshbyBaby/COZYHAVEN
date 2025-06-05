<?php include_once ("header.php");
require_once ("../dboperation.php");
$obj = new dboperation();
$sqlquery = "select * from tbl_country";
$result = $obj->executequery($sqlquery);

?>


<section class="ftco-intro img" id="about-section" style="background-image: url(images/bg_1.jpg);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 text-center">
        <h2>Choose Your Dream House</h2>
        <p>We can manage your dream building A small river named Duden flows by their place</p>
        <p class="mb-0"><a href="#" class="btn btn-white px-4 py-3">Search Places</a></p>
      </div>
    </div>
  </div>
</section>


<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row no-gutters d-flex">
      <div class="col-md-6 col-lg-5 d-flex">
        <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/about.jpg);">
        </div>
      </div>
      <div class="col-md-6 col-lg-7 px-lg-5 py-md-5">
        <div class="py-md-5">
          <div class="row justify-content-start pb-3">
            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
              <!-- <div class="col-md-7 order-md-last d-flex ftco-animate"> -->
              <form class="forms-sample" method="POST" action="userregaction.php" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="User Name" required >
                </div>
                <div class="form-group">
                  <input type="text" name="housename" class="form-control" placeholder="House Name" required >
                </div>
                <div class="form-group">
                  <input type="text" name="pincode" class="form-control" placeholder="Pincode" required>
                </div>
                <div class="form-group">
                  Id proof <input type="file" name="id_proof" class="form-control" id="exampleInputMobile"
                    placeholder="choose file" required>
                </div>
                <div class="form-group">
                  <input type="text" name="phone" class="form-control" placeholder="phone"  required >
                </div>
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="email"  required>
                </div>
                <div class="form-group">
                  Image <input type="file" name="image" class="form-control" id="exampleInputMobile"
                    placeholder="choose file" required>
                </div>
                <div class="form-group">
                <input class="form-control valid" name="date" id="date" type="text"value="<?php echo date('Y-m-d')?>" placeholder="Enter Module" required <?php echo 'min="' . date('Y-m-d') . '"';?>>
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="username">
                </div>
                <div class="form-group">
                  <input type="text" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                            <label for="countryid">Country</label>
                            <?php
                            require_once("../dboperation.php");
                            $obj = new dboperation();
                            $sqlquery = "SELECT * FROM tbl_country";
                            $result = $obj->executequery($sqlquery);
                            ?>
                            <select class="form-control" name="ddlcountry" id="countryid" >
                                <option value="0">--SELECT--</option>
                                <?php while ($display = mysqli_fetch_array($result)) { ?>
                                    <option value="<?php echo $display["country_id"]; ?>">
                                        <?php echo $display["country_name"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">State</label>
                  <div class="col-sm-9">
                    <select class="form-control form-control-sm" name="txtstatename" id="stateid">
                    <?php
                   echo $sqlquery1 = "select * from tbl_state";
                    $result1 = $obj->executequery($sqlquery1);
                    ?>
                      <option value="0">--SELECT--</option>
                      <?php
                      while ($display = mysqli_fetch_array($result1)) {
                        ?>
                        <option value="<?php echo $display["state_id"] ?>"><?php echo $display["state_name"] ?>
                        </option>
                        <?php

                      }
                      ?>


                    </select>


                    <?php
                    $sqlquery1 = "select * from tbl_district";
                    $result1 = $obj->executequery($sqlquery1);
                    ?>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">District</label>
                  <div class="col-sm-9">
                    <select class="form-control form-control-sm" name="txtdisname" id="disid">

                      <option value="0">--SELECT--</option>
                      <?php
                      while ($display1 = mysqli_fetch_array($result1)) {
                        ?>
                        <option value="<?php echo $display1["district_id"]; ?>">
                          <?php echo $display1["district_name"]; ?>
                        </option>
                        <?php

                      }
                      ?>
                    </select>

                  </div>
                </div>


                <div class="form-group">
                  <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary py-3 px-5" /> -->
                   <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </div>
              </form>

            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>



<?php
include_once ("footer.php");
?>

<script src="../jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // alert('hi');
    $("#stateid").change(function () {
      var stateid = $(this).val();
      // alert(stateid);
      $.ajax({
        url: "getdistrict.php",
        method: "POST",
        data: {
          id: stateid
        },
        success: function (response) {
          $("#disid").html(response);
        },
        error: function () {
          $("#disid").html("Error occurred while getting location!");
        }
      });
    });
  });
  </script>

<script src="../jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // alert('hi');
      $("#countryid").change(function () {
        var countryid = $(this).val();
        // alert(countryid);
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
</script>