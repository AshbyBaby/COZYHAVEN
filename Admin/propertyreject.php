<?php
include_once("../dboperation.php");
$obj=new dboperation();


    
    $homeid=$_GET["homeid"];
   
      $sqlquery="update tbl_homedetails set status='Rejected' where home_id ='$homeid'";
       $result=$obj->executequery($sqlquery);
      if($result==1)
       {
        
         echo "<script>alert(' Details Inserted Successfully');window.location='propertyverification.php'</script>";
         }
         else
         {
            echo "<script>alert(' Details Inserted Failed')</script>";
         }
         

    



?>