<?php
include_once("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["universityid"]))
{
  $universityid=$_GET["universityid"];

  $sqlquery="delete from tbl_university where university_id='$universityid'";
   $result=$obj->executequery($sqlquery);
   if($result==1) {
    echo"<script>alert('Deleted Successfully');window.location='universityview.php'</script>";
}
else
{
    echo "<script>alert('Deletion failed')</script>";
}

}
?>

