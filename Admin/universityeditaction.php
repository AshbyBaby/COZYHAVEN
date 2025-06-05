<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnadd"]))
{
    $name=$_POST["txtuniversityname"];
    $universityid=$_POST["universityid"];
   
     echo $sqlquery="update tbl_university set university_name='$name' where university_id ='$universityid'";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
          echo "<script>alert('university Details Inserted Successfully');window.location='universityview.php'</script>";
         }
         else
         {
          echo "<script>alert(' university Details Inserted Failed')</script>";
         }
         

    


}
?>