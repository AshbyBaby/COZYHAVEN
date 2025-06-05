<?php
include_once ("../dboperation.php");
$obj = new dboperation();


    $name = $_POST["ownername"];
    $housename = $_POST["house_name"];
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
    $countryname = $_POST["ddlcountry"];
    $cityname = $_POST["txtcityname"];


    $sqlquery1 = "insert into tbl_homeowner(name,housename,city_id,pincode,idproof,phone,email,image,regdate,username,password,status)values('$name','$housename','$cityname','$pincode','$idproof','$phoneno','$email','$photos','$regdate','$username','$password','Requested')";
    $result1 = $obj->executequery($sqlquery1);
    if ($result1 == 1) {
        echo "<script>alert('registration saved Successfully');</script>";
    } else {
        echo "<script>alert('registration  Failed')</script>";
    }



?>