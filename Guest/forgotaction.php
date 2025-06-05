<?php
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = substr(str_shuffle($characters), 0, $length);

    return $randomString;
}
?>


<?php
include_once("../dboperation.php");
$obj = new dboperation();
if (isset($_POST["recover-submit"])) {
    $username = $_POST["username"];
    $randomString = generateRandomString();

    $sqlquery = "select * from tbl_user where username='$username' ";
    $result = $obj->executequery($sqlquery);


    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $email = $row["email"];
        $sql2 = "update tbl_user set pass='$randomString' where username='$username'";
        $result = $obj->executequery($sql2);
        echo "<script>alert('Successfully reset your password. New password is send to your mail,please check it....');window.location='login.php' </script>";

        $bodyContent = "Dear $uname, Your New Password is:$randomString";
        $mailtoaddress = $email;
        require('../phpmailer.php');

    } else if (mysqli_num_rows($result) == 0) {
        $sqlquery = "select * from tbl_homeowner where username='$username'";
        $result = $obj->executequery($sqlquery);


        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $uname = $row["name"];
            $email = $row["email"];
            echo $sql2 = "update tbl_homeowner set pass='$randomString' where username='$username'";
            $result = $obj->executequery($sql2);
            $bodyContent = "Dear $uname, Your New Password is:$randomString";
            $mailtoaddress = $email;
            require('../phpmailer.php');
            echo "<script>alert('Successfully reset your password. New password is send to your mail,please check it....');window.location='login.php' </script>";

        }
    }
    // else if (mysqli_num_rows($result) == 0) {
//     echo $sqlquery = "select * from tblorphanage where username='$username'";
//     $result = $obj->executequery($sqlquery);
//     if (mysqli_num_rows($result) == 1) {
//         $row = mysqli_fetch_array($result);
//         $uname = $row["Orphanagename"];
//          $email = $row["Email"];
//         echo $sql2 = "update tblorphanage set password='$randomString' where username='$username'";
//         $result = $obj->executequery($sql2);
//         $bodyContent = "Dear $uname, Your New Password is:$randomString";
//         $mailtoaddress = $email;
//         require('phpmailer.php');
//     } 
// }
    else {


        echo "<script>window.location='login.php'</script>";

    }

}
?>