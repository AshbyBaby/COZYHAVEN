<?php
include("header.php");
include_once("../dboperation.php");
$obj = new dboperation();

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Daywise</title>
    </head>
   <body style="background-image:url(../Guest/images/account-bg.jpg)">
<form action="" method="POST">
<div class="logo">
              <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
                 </div>
      <div class="container" style="width:120%;margin-bottom: 5%;padding-top:0%" >
      <div class="col-md-12" style="box-shadow: 2px 2px 15px #1b93e1; border-radius:0px; top: 14px; margin-left:37px;background-color:white">
      <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;padding-top:2%">DATEWISE BOOKING</h2>
      <br>
       <div class="row">
    <div class="col-md-3" style="text-align:right">
          <label>From date:</label>
        </div>
    <div class="col-md-6">
          <input type="date" class="form-control" name="fromdate" style="width:500px;" required >
          </td>
        </div>
  </div>
      <br>
      <div class="row">
    <div class="col-md-3" style="text-align:right">
          <label>To date:</label>
        </div>
    <div class="col-md-6">
          <input type="date" class="form-control" name="todate"  style="width:500px;">
          </td>
        </div>
  </div>
      <br>
      <div class="row">
    <input type="submit" name="btnsubmit" value="Submit"  class="btn btn-primary" style="margin-left:63%;margin-bottom:2%">
  </div>

  <br>
  </form> 
  <form action="" method="POST">
    <?php

if(isset($_POST["btnsubmit"]))
{
	$fromdate=$_POST["fromdate"];
	$todate=$_POST["todate"]; 
	$_SESSION['fdate']=$fromdate;
	$_SESSION['tdate']=$todate;
	
	
	$s=1;
	?>

	 <div class="col-md-12" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:50px;margin-top:-15px;background-color:white">
 <br>
           <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">DATEWISE BOOKING REPORT</h2>
           <br>
       
      <div class="row">
          <div class="col-md-3" style="text-align:right">
          <label>From date:</label>
        </div>
    <div class="col-md-6">
          <input type="text" class="form-control" name="fromdate" readonly value="<?php echo $fromdate ?>" style="width:500px;">
          </td>
        </div>
  </div>
  <br>
    <div class="row">
    <div class="col-md-3" style="text-align:right">
          <label>To date:</label>
        </div>
    <div class="col-md-6">
          <input type="text" class="form-control" name="todate" readonly value="<?php echo $todate ?>" style="width:500px;">
          </td>
        </div>
  </div>
  <br>
  <div style="padding-bottom:4%">
      <table class="table table-hover" style="border: 2px solid #adaaaa;margin-left:4px; box-shadow: 3px 3px 11px #777777; padding-bottom:content;background-color:white">
      
      <th> No.</th>
    <th>Homename</th>    
    <th>noofperson</th>
    <th>rate</th>

    
    
    <?php


 $sql="SELECT count(*) as count,home_name,de.noofperson,de.rate FROM tbl_homedetails de inner join tbl_homerequest d on de.home_id=d.home_id  where
d.request_date >='$fromdate' and d.request_date <='$todate' group by d.home_id ";
                  $result = $obj->executequery($sql);

   while($display=mysqli_fetch_array($result))
	{
    echo "<tr>";
    echo"<td>".$s++."</td>";
    
    echo "<td>".$display["home_name"]."</td>";
    echo "<td>".$display["noofperson"]."</td>";
    echo "<td>".$display["rate"]."</td>";
    // echo "<td>".$display["Image"]."</td>";
    echo "</tr>";
	
	
	
	
	
  }
echo "</table>";;
}

?>
    </form>
</div>
  </div>
      </div>
      </div>
      
    <?php
include("footer.php");
?>
	</div>
