<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnadd"]))
{
    $name=$_POST["txtcountryname"];
    $countryid=$_POST["countryid"];
   
      $sqlquery="update tbl_country set country_name='$name' where country_id ='$countryid'";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
         echo "<script>alert('country Details Inserted Successfully');window.location='countryview.php'</script>";
         }
         else
         {
            echo "<script>alert('country Details Inserted Failed')</script>";
         }
         

    


}
?>