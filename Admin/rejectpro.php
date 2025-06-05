<?php
include_once("../dboperation.php");
$obj=new dboperation();


    $homeid=$_GET["hid"];
     
        $sqlquery1="update tbl_homedetails set status='Rejected' where home_id=$homeid";
        $result1 = $obj->executequery($sqlquery1);
        if($result1 == 1)
        {
           echo"<script>alert(' Details Updated Successfully');window.location='propertyverification.php'</script>";
        }
        else
        {
            echo"<script>alert(' Details Updation Failed')</script>";
        }

?>