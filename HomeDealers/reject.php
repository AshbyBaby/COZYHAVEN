<?php
include_once("../dboperation.php");
$obj=new dboperation();


    $requestid=$_GET["requestid"];
     
        $sqlquery1="update tbl_homerequest set status='Rejected' where request_id=$requestid";
        $result1 = $obj->executequery($sqlquery1);
        if($result1 == 1)
        {
           echo"<script>alert(' Rejected Successfully');window.location='requestview.php'</script>";
        }
        else
        {
            echo"<script>alert(' rejection Failed')</script>";
        }

?>