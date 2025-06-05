<?php
include("header.php");
include_once("../dboperation.php");
$obj= new dboperation();
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

        <h2></h2>DATEWISE BOOKING</h2>
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
          <input type="text" class="form-control" name="todate" readonly value="<?php echo $todate ?>" style="width:500px;" >
          </td>
        </div>
  </div>
  <br>
  <div style="padding-bottom:4%">
      <table class="table table-hover" style="border: 2px solid #adaaaa;margin-left:4px; box-shadow: 3px 3px 11px #777777; padding-bottom:content;background-color:white">
      
      <th> No.</th>
    <th>Restaurant</th>    
    <th>No of Booking</th>
    
    
    <?php


$sql="SELECT count(*) as count,r.Name from tblorder o INNER JOIN tblfoodquantity q on o.Quantity_id=q.Quantity_id 
INNER JOIN tblfooditem fi ON q.Item_id=fi.Item_id INNER JOIN tblrestaurant r ON fi.Restaurant_id=r.Restaurant_id where
o.Orderdate >='$fromdate' and o.Orderdate <='$todate' group by r.Restaurant_id ";
$res = $obj->executequery($sql);
while ($display = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo"<td>".$s++."</td>";
    
    echo "<td>".$display[1]."</td>";
    echo "<td>".$display["count"]."</td>";
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
      </div>

</body>
    </html>
    <?php
include("footer.php");
?>
	</div>



