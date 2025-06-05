<?php
include_once ("../dboperation.php");
$obj = new dboperation();
if (isset($_POST["btnadd"])) {
     $countryname = $_POST['ddlcountry'];
     $cityname = $_POST['name'];
     $sql = "select * from tbl_city where city_name='$cityname'";
     $res = $obj->executequery($sql);
     $rows = mysqli_num_rows($res);
     if ($rows > 0) {

          echo "<script>alert('Already Exist');window.location='city.php'</script>";
     } else {
          echo $sqlquery = "INSERT INTO tbl_city(country_id,city_name)VALUES('$countryname','$cityname')";
          $result = $obj->executequery($sqlquery);
          if ($result == 1) {
               echo "<script>alert('Saved Successfully');window.location='city.php'</script>";
          } else {
               echo "<script>alert('Registration Failed');window.location='city.php'</script>";
          }
     }
}
?>