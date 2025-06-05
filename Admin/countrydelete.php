<?php
include_once("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["countryid"]))
{
  $countryid=$_GET["countryid"];
  $sqlquery="delete from tbl_country where country_id='$countryid'";
   $result=$obj->executequery($sqlquery);
   if($result==1) {
    echo"<script>alert('Deleted Successfully');window.location='countryview.php'</script>";
}
else
{
    echo "<script>alert('Deletion failed')</script>";
}

}
?>