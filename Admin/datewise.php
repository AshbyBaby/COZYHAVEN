<?php
require_once("../dboperation.php");
$obj = new dboperation();
$date = $_POST["date"];

$sqlquery = "select * from tbl_payment p inner join tbl_homerequest r on p.request_id=r.request_id 
inner join tbl_user c on r.user_id=c.user_id
inner join tbl_homedetails n on r.Home_id=n.Home_id
inner join tbl_homeowner s on n.owner_id=s.owner_id 
             WHERE p.payment_date = '$date'";

$result = $obj->executequery($sqlquery);
$i = 1;
$t = 0;
?>

<table class="table card-table">
    <thead>
        <tr>
            <th>SI NO:</th>
            <th>Home Name</th>
            <th>Required Date</th>
            <th>Rate</th>
            <th>Initial Amount</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        <?php if (mysqli_num_rows($result) > 0) { // Check if there are results ?>
            <?php while ($display = mysqli_fetch_array($result)) { ?>
                <tr>   
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $display["Home_name"]; ?></td>  
                    <td><?php echo $display["from_date"]; ?></td>    
                    <td><?php echo $display["rate"]; ?></td>
                    <td><?php echo $display["initial_amount"]; ?></td>
                    <?php $t += $display["initial_amount"]; ?> <!-- Calculate total -->
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4" style="text-align:right;"><strong>TOTAL:</strong></td>
                <td><strong><?php echo $t; ?></strong></td> <!-- Display total -->
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="5" style="text-align:center;">No records found for the selected date.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>