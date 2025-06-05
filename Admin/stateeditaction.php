<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["btnadd"]))
{
    $name=$_POST["txtstatename"];
    $stateid=$_POST["stateid"];
   
      echo $sqlquery="update tbl_state set state_name='$name' where state_id ='$stateid'";
       $result=$obj->executequery($sqlquery);
       if($result==1)
       {
        
          echo "<script>alert('state Details Inserted Successfully');window.location='stateview.php'</script>";
         }
         else
         {
             echo "<script>alert('state Details Inserted Failed')</script>";
         }
         

    


}
?>