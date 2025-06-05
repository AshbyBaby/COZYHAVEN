<?php
require_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnadd"]))
{
    $countryname=$_POST["ddlcountry"];
    $cityname=$_POST["txtcityname"];
    $universityname=$_POST["txtuniversity"];
   
       $sqlquery="insert into tbl_university(city_id,university_name)values('$cityname','$universityname')";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
           echo "<script>alert('university Details Inserted Successfully');window.location='universityview.php'</script>";
         }
         else
         {
             echo "<script>alert('university Details Inserted Failed')</script>";
         }
         

    


}
?>