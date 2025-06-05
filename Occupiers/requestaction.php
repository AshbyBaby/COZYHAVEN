<?php
    session_start();
    include_once('../dboperation.php');
    $obj=new dboperation();
$user_id = $_SESSION['user_id'];

        
        $fromdate = $_POST['date'];
        $todate = $_POST['date'];
        $numpersons = $_POST['numpersons'];
        $home_id = $_POST['hid'];
        $regdate = date('Y-m-d');

        //query to insert
       echo $sqlquery = "INSERT INTO tbl_homerequest ( user_id , request_date , from_date , to_date , noofperson , home_id , status ) values ('$user_id','$regdate','$fromdate','$todate','$numpersons','$home_id','Requested' )";
        $result = $obj->executequery($sqlquery);
        if($result == 1)
        {
           echo"<script>alert('Request send  Successfully');window.location='index.php'</script>";
        }
        else
        {
           echo"<script>alert('Request  Failed')</script>";
        }
        
    
?>