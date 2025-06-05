<?php
include_once("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["districtid"]))
{
  $districtid=$_GET["districtid"];

  $sqlquery="delete from tbl_district where district_id='$districtid'";
   $result=$obj->executequery($sqlquery);
   if($result==1) {
    echo"<script>alert('Deleted Successfully');window.location='districtview.php'</script>";
}
else
{
    echo "<script>alert('Deletion failed')</script>";
}

}
?>