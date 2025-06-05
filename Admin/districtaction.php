<?php
require_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnAdd"]))
{
    $countryname=$_POST["ddlcountry"];
    $statename=$_POST["txtstatename"];
    $districtname=$_POST["txtdisname"];
   
         $sqlquery="insert into tbl_district(state_id,district_name)values('$statename','$districtname')";
       $result=$obj->executequery($sqlquery);
        // if($rows==0)
    // {
        
    //     echo "<script>alert('Already Exist');window.location='districtaction.php'</script>";
    // }
       if($result==1)
       {
        
           echo "<script>alert('District Details Inserted Successfully');window.location='district.php'</script>";
         }
         else
         {
             echo "<script>alert('District Details Inserted Failed')</script>";
         }
         
}
?>