<?php
include_once("../dboperation.php");
$obj = new dboperation();
  if(isset($_POST["btnadd"]))
    {
        $countryname=$_POST['name'];
         $sql ="select * from tbl_country where country_name='$countryname'";
        $res=$obj->executequery($sql);
        $rows = mysqli_num_rows($res);
        if($rows>0){
        
            echo "<script>alert('Already Exist');window.location='country.php'</script>";
        }else {
            $sqlquery="INSERT INTO tbl_country(country_name)VALUES('$countryname')";
            $result =$obj->executequery($sqlquery);
            if ($result == 1){
    echo "<script>alert('Saved Successfully');window.location='country.php'</script>";
}
else
{
   echo "<script>alert('Registration Failed');window.location='country.php'</script>";
   }
        }
    } 
?>