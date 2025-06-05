<?php
include_once("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["cityid"]))
{
  $cityid=$_GET["cityid"];

  $sqlquery="delete from tbl_city where city_id='$cityid'";
   $result=$obj->executequery($sqlquery);
   if($result==1) {
    echo"<script>alert('Deleted Successfully');window.location='cityview.php'</script>";
}
else
{
    echo "<script>alert('Deletion failed')</script>";
}

}
?>