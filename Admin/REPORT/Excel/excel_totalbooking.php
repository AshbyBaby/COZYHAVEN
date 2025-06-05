<?php
include 'excel_controller.php';
$homedealer = new DBController();
$productResult = $homedealer->runQuery("SELECT * FROM tbl_homerequest INNER JOIN tbl_payment ON tbl_homerequest.request_id=tbl_payment.request_id INNER JOIN tbl_homedetails ON tbl_homerequest.Home_id=tbl_homedetails.Home_id");

  
    $filename = "Export_homeexcel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>
