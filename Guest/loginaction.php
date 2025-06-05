<?php
session_start();
include_once ("../dboperation.php");
$obj = new dboperation();
if (isset($_POST['LogIn'])) {
    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];
    // echo"username: ".$username;
    // echo"<br>password:".$username;

   echo  $query = "Select * from tbl_adminlogin where username='$username' and password='$password'";
    $res = $obj->executequery($query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        if ($row['password'] == "admin") {
            header("location:../Admin/index.php");
        }
    } else if (mysqli_num_rows($res) == 0) {
        $query = "Select * from tbl_user where binary Username='$username' and binary Password='$password'";
        $res = $obj->executequery($query);

        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_array($res);
            $_SESSION["username"] = $row["Username"];
            $_SESSION["user_id"] = $row["user_id"];
            header("location:../Occupiers/index.php");
        } else {
            $query = "Select * from tbl_homeowner where binary Username='$username' and binary Password='$password'";
            $res = $obj->executequery($query);

            if (mysqli_num_rows($res) == 1) {
                $row = mysqli_fetch_array($res);
                $_SESSION["username"] = $row["Username"];

                $_SESSION["ownerid"] = $row["owner_id"];

                $_SESSION["userid"] = $row["user_id"];


                header("location:../HomeDealers/index.php");
            } else {
                echo "<script>alert('invalid username or password');window.location='login.php'</script>";

            }

        }




    } else {
        echo "<script>alert('invalid username or password');window.location='login.php'</script>";

    }
}

?>