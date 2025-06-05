<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnadd"]))
{
    $name=$_POST["txtdistrictname"];
    $districtid=$_POST["districtid"];
   
     echo $sqlquery="update tbl_district set district_name='$name' where district_id ='$districtid'";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
          echo "<script>alert('district Details Inserted Successfully');window.location='districtview.php'</script>";
         }
         else
         {
          echo "<script>alert(' district Details Inserted Failed')</script>";
         }
         

    


}
?>