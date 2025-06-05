<?php
require_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnAdd"]))
{
    $countryname=$_POST["ddlcountry"];
    $statename=$_POST["txtstatename"];
   
     echo $sqlquery="insert into tbl_state(country_id,state_name)values('$countryname','$statename')";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
           echo "<script>alert('state Details Inserted Successfully');window.location='state.php'</script>";
         }
         else
         {
             echo "<script>alert('state Details Inserted Failed')</script>";
         }
         

    


}
?>