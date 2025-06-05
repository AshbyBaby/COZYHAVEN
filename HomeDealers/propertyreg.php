<?php
     include_once ("header.php");
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
</div>
		</section>
    <html>
      <head>
        <style>
          input.size{
            width:20px;
            height:20px;
          }

        </style>
      </head>
    </html>

		
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
			          <class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <!-- <div class="col-md-7 order-md-last d-flex ftco-animate"> -->
                <form class="forms-sample" method="post" action="propertyregaction.php" enctype="multipart/form-data">
            
              <div class="form-group">
             HOME NAME <input type="text" class="form-control" name="house_name" placeholder="home_Name" required >
              </div>
              <div class="form-group">
              DESCRIPTION:<br>
<textarea rows="4" cols="58" name="description" placeholder="description...">
</textarea>

              </div>
              <div class="form-group">
               NO OF PERSONS <input type="text" class="form-control" name="noofperson" placeholder="persons">
              </div>
              <div class="form-group">
              RATE  <input type="text"  name="rate" class="form-control" id="exampleInputMobile" placeholder="rate">
              </div>
              
              <div class="form-group">
               IMAGE  <input type="file"  name="Image" class="form-control" id="exampleInputMobile" placeholder="choose file">
              </div>
              <div>
                <center>
                City <input type="radio" name="txtname" class="size" id="txtcityid" value="city" >
                University <input type="radio" name="txtname" class="size" id="txtuniid" value="university"></center>
              </div>
              
             
                       <?php
                  require_once("../dboperation.php");
                  $obj=new dboperation();
                  $sqlquery="select * from tbl_country";
                  $result=$obj->executequery($sqlquery);
                  ?>
                       
                    <div class="form-group row" id="r1" >
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="ddlcountry" id="countryid">
                      
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
                  
                       
                    <div class="form-group row" id="r2">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="txtcityname" id="cityid">
                      
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

                     
                     <?php
                  require_once("../dboperation.php");
                  $obj=new dboperation();
                  $sqlquery="select * from tbl_university";
                  $result=$obj->executequery($sqlquery);
                  ?>
                  </div>
                  </div>
                     <div class="form-group row" id="r3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">University</label>
                      <div class="col-sm-9">
                      <select class="form-control form-control-sm" name="txtuniname" id="uniid">
                      
                       <option value="0">--SELECT--</option>
                       <?php
                       while($display=mysqli_fetch_array($result))
                       {
                          ?>
                          <option value="<?php echo $display["university_id"];?>">
                          <?php echo $display["university_name"];?></option>
                          <?php
                        
                       }
                       ?>
                       </select>

                     </div>
                     </div>
                     
              
              <div class="form-group">
                <input type="submit" value="Register" class="btn btn-primary py-3 px-5">
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
include_once("footer.php");
?>
<script src="../jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {

      $("#r1").hide();
      $("#r2").hide();
      $("#r3").hide();
      $("#txtcityid").click(function(){
        $("#r1").show();
        $("#r2").show();
      });
      $("#txtuniid").click(function(){
        $("#r1").show();
        $("#r2").show();
        $("#r3").show();
      });
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
            $("#uniid").html("Error occurred while getting location!");
          }
        });
      });


      $("#cityid").change(function () {
        var stateid = $(this).val();
        // alert(countryid);
        $.ajax({
          url: "getuniversity.php",
          method: "POST",
          data: {
            id: stateid
          },
          success: function (response) {
            $("#uniid").html(response);
          },
          error: function () {
            $("#uniid").html("Error occurred while getting location!");
          }
        });
      });
    });
    </script>