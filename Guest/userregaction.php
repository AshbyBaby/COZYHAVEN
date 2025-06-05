<?php
include_once ("../dboperation.php");
$obj = new dboperation();


    $name = $_POST["username"];
    $housename = $_POST["housename"];
    $pincode = $_POST["pincode"];
    $idproof = $_FILES["id_proof"]["name"];
     move_uploaded_file($_FILES["id_proof"]["tmp_name"], "../upload/" . $idproof);
    $phoneno = $_POST["phone"];
    $email = $_POST["email"];
    $photos = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $photos);
    $regdate = date('Y-m-d');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statename = $_POST["txtstatename"];
    $districtname = $_POST["txtdisname"];


      $sqlquery1 = "insert into tbl_user(name,housename,district_id,pincode,idproof,phone,email,image,regdate,username,password)values('$name','$housename','$districtname','$pincode','$idproof','$phoneno','$email','$photos','$regdate','$username','$password')";
    $result1 = $obj->executequery($sqlquery1);
    if ($result1 == 1) {
        echo "<script>alert('registration saved Successfully');</script>";

        $bodyContent="Dear $name, Your Registration is successful";
        $mailtoaddress=$email;
        require_once('../phpmailer.php');


    } else {
         echo "<script>alert('registration  Failed')</script>";
    }



?>