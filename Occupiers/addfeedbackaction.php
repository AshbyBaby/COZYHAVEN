<?php
session_start();
include_once ("../dboperation.php");
$obj = new dboperation();
$feedback = $_POST["feedback"];
$rating = $_POST["rating"];
$homeid = $_POST["homeid"];
$type=$_POST['type'];
$date = date('y-m-d');
$cid = $_SESSION["user_id"];

echo $sqlquery1 = "insert into tbl_feedback(rating,feedback,home_id,user_id,date)values('$rating','$feedback','$homeid','$cid','$date')";
$result1 = $obj->executequery($sqlquery1);
if ($result1 == 1) {
    echo "<script>alert('Feedback  Inserted Succesfully');window.location='singleview.php?hid=".$homeid."&type=".$type."'</script>";
} else {
    echo "<script>alert('Insertion Failed')</script>";
}


?>

