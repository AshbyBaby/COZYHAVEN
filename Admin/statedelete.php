<?php
include_once("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["stateid"]))
{
  $stateid=$_GET["stateid"];

  $sqlquery="delete from tbl_state where state_id='$stateid'";
   $result=$obj->executequery($sqlquery);
   if($result==1) {
    echo"<script>alert('Deleted Successfully');window.location='stateview.php'</script>";
}
else
{
    echo "<script>alert('Deletion failed')</script>";
}

}
?>