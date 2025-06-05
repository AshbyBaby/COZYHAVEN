<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnadd"]))
{
    $name=$_POST["txtcityname"];
    $cityid=$_POST["cityid"];
   
     echo $sqlquery="update tbl_city set city_name='$name' where city_id ='$cityid'";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
          echo "<script>alert('city Details Inserted Successfully');window.location='cityview.php'</script>";
         }
         else
         {
          echo "<script>alert('city Details Inserted Failed')</script>";
         }
         

    


}
?>