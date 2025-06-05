<?php
session_start();
include_once('../dboperation.php');
$obj = new dboperation();



$requestid = $_POST['requestid'];
$total_amount = $_POST['total_amount'];
$initialamount = intval($total_amount) / 2;
$regdate = date('Y-m-d');

//query to insert
echo $sqlquery = "INSERT INTO tbl_payment ( request_id,initial_amount,payment_date,status ) values ('$requestid','$initialamount','$regdate','Paid' )";
$result = $obj->executequery($sqlquery);
if ($result == 1) {
    $sql="update tbl_homerequest set status='Paid' where request_id=$requestid";
    $result = $obj->executequery($sql);
    echo "<script>alert('Paid Successfully');window.location='confirmation.php'</script>";
} else {
    echo "<script>alert('Request  Failed')</script>";
}


?>