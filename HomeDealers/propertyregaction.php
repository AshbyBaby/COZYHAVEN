<?php
session_start();
include_once("../dboperation.php");
$obj=new dboperation();


    $name=$_POST["house_name"];
    $description=$_POST["description"];
    $persons=$_POST["noofperson"];
    $rate=$_POST["rate"];

    $uniname=$_POST["txtname"];
    $photos=$_FILES["Image"]["name"];
    move_uploaded_file($_FILES["Image"]["tmp_name"],"../upload/" .$photos);
    $ownerid= $_SESSION["ownerid"];
    if($uniname == "city")
    {
      $id=$_POST['txtcityname'];
    }
    else
    {
      $id=$_POST['txtuniname'];
    }
    
   
    
   
       $sqlquery1="insert into tbl_homedetails(Home_name,description,noofperson,rate,Image,owner_id,id,Status,type)values('$name','$description','$persons',' $rate','$photos', '$ownerid', '$id','Requested','$uniname')";
        $result1 = $obj->executequery($sqlquery1);
        if($result1 == 1)
        {
          echo"<script>alert('registration saved Successfully');window.location='propertyreg.php'</script>";
        }
        else
        {
           echo"<script>alert('registration  Failed')</script>";
        }
        
?>