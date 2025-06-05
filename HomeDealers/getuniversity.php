<?php
require_once ("../dboperation.php");

$obj = new dboperation();

if (isset($_POST["id"])) {
    $cityid = $_POST["id"];

    // Query to fetch universities based on city id
    $sqlquery_universities = "SELECT * FROM tbl_university WHERE city_id = '$cityid'";
    $result_universities = $obj->executequery($sqlquery_universities);

    // Generate options for the dropdown
    echo '<option value="0">Select University</option>';
    while ($display = mysqli_fetch_array($result_universities)) {
        echo '<option value="' . $display['university_id'] . '">' . $display['university_name'] . '</option>';
    }
} else {
    echo '<option>Error: No city ID received</option>';
}
?>