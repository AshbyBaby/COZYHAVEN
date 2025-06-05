<?php
include_once("../dboperation.php");
$obj=new dboperation();

    
    $ownerid=$_GET["ownerid"];
   
      $sqlquery="update tbl_homeowner set status='confirmed' where owner_id ='$ownerid'";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
         echo "<script>alert(' Details Inserted Successfully');window.location='ownerverification.php'</script>";
         }
         else
         {
            echo "<script>alert(' Details Inserted Failed')</script>";
         }
         

    



?>