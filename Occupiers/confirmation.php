<?php
session_start();
include_once("header.php");
require_once("../dboperation.php");

$obj = new dboperation();
$s = 1;
?>
 <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            font-size: 16px;
            line-height: 26px;
            letter-spacing: 0.5px;
            color: #484848;
        }

        /* Popup Open button */
        .open-button {
            color: #FFF;
            background: #0066CC;
            padding: 10px;
            text-decoration: none;
            border: 1px solid #0157ad;
            border-radius: 3px;
        }

        .open-button:hover {
            background: #01478e;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.75);
            width: 100%;
            height: 100%;
            display: none;
        }

        /* Popup inner div */
        .popup-content {
            width: 700px;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 40px;
            margin-top: 100px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
            border-radius: 3px;
            background: #fff;
            position: relative;
        }

        /* Popup close button */
        .close-button {
            width: 25px;
            height: 25px;
            position: absolute;
            top: -10px;
            right: -10px;
            border-radius: 20px;
            background: rgba(0, 0, 0, 0.8);
            font-size: 20px;
            text-align: center;
            color: #fff;
            text-decoration: none;
        }

        .close-button:hover {
            background: rgba(0, 0, 0, 1);
        }

        @media screen and (max-width: 720px) {
            .popup-content {
                width: 90%;
            }
        }
    </style>
<section class="hero-wrap" style="background-image: url('images/bg_1.jpg'); height:80px;" data-stellar-background-ratio="0.5"></section>

<section class="ftco-section">
 
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-12 ">
            <h1>Confirmation Details</h1>
                    <?php
                    $uid = $_SESSION['user_id'];
                    $sqlquery = "SELECT * FROM tbl_homerequest h INNER JOIN tbl_homedetails v ON h.Home_id = v.Home_id WHERE h.user_id = $uid AND (h.status = 'Accept' OR h.status = 'Rejected')";
                    $result1 = $obj->executequery($sqlquery);
                    ?>
                    <button class="btn btn-primary btn-rounded mb-3"
                        onclick='window.location.href="index.php"'>BACK</button>
                    <div class="form-group row" id="r1">
                        <div class="col-sm-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SlNo</th>
                                        <th>Home Name</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>No of Persons</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($result1) == 0): ?>
                                        <tr>
                                            <td colspan="7" class="no-records">No records found</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $i = 1;
                                        while ($display = mysqli_fetch_array($result1)): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($i++); ?></td>
                                                <td><a href="homedetails.php?homeid=<?php echo htmlspecialchars($display['Home_id']); ?>"
                                                        class="text-decoration-none">
                                                        <?php echo htmlspecialchars($display["Home_name"]); ?>
                                                    </a></td>
                                                <td><?php echo htmlspecialchars($display["from_date"]); ?></td>
                                                <td><?php echo htmlspecialchars($display["to_date"]); ?></td>
                                                <td><?php echo htmlspecialchars($display["noofperson"]); ?></td>
                                                <td><?php echo htmlspecialchars($display["rate"]); ?></td>
                                                <td><?php echo htmlspecialchars($display["status"]); ?></td>
                                                <td>
                                                    <?php if ($display["status"] == "Accept"): ?>
                                                        <!-- <button type="button" class="btn btn-info btn-lg">Payment</button> -->
                                                        <button type="button" class="btn btn-primary open-button"
                                                            data-popup="popup-<?php echo $i; ?>">Payment</button>
                                                        <div class="popup" id="popup-<?php echo $i; ?>">
                                                            <div class="popup-content">
                                                                <form action="paymentaction.php" method="POST">

                                                                    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">
                                                                        Enter Card Details</h1>

                                                                    <div style="margin-bottom: 15px;">
                                                                        <label style="font-weight: bold; color: #555;">Card
                                                                            Number</label>
                                                                        <input type="text" name="cno" id="cno" class="form-control"
                                                                            placeholder="XXXX-XXXX-XXXX-XXXX" required
                                                                            style="padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
                                                                    </div>

                                                                    <div style="margin-bottom: 15px;">
                                                                        <label style="font-weight: bold; color: #555;">Card Holder
                                                                            Name</label>
                                                                        <input type="text" name="cname" id="cname"
                                                                            class="form-control" placeholder="Name on Card" required
                                                                            style="padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
                                                                    </div>

                                                                    <div style="margin-bottom: 15px;">
                                                                        <label style="font-weight: bold; color: #555;">Expiry
                                                                            Date</label>
                                                                        <input type="text" name="edate" id="edate"
                                                                            class="form-control" placeholder="MM/YY" required
                                                                            style="padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
                                                                    </div>

                                                                    <div style="margin-bottom: 20px;">
                                                                        <label style="font-weight: bold; color: #555;">CVV</label>
                                                                        <input type="password" name="cvv" id="cvv"
                                                                            class="form-control" placeholder="XXX" required
                                                                            style="padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
                                                                    </div>
                                                                    
                                                                    <div style="margin-bottom: 20px;">
                                                                        <label style="font-weight: bold; color: #555;">Initial Amount</label>
                                                                        <?php echo $display["rate"]/2;  ?>
                                                                              </div>
                                                                    <input type="hidden" name="total_amount"
                                                                        value="<?php echo $display["rate"];  ?>">
                                                                       
                                                                        <input type="hidden" name="requestid"
                                                                        value="<?php echo $display["request_id"];  ?>">   

                                                                    <button id="btnSubmit" name="btnsubmit" class="open-button"
                                                                        style="background-color: #0056b3; color: white; padding: 12px 20px; font-size: 18px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">Pay</button>

                                                                    <a class="close-button" popup-close="popup-1"
                                                                        href="javascript:void(0)"
                                                                        style="color: #777;margin-top: 10px; text-align: center;">X</a>

                                                                </form>
                                                                <!-- <form action="popupbaction.php" method="POST">
                                                            <input type="hidden" name="request_id" value="<?php //echo $display['request_id']; ?>">
                                                            <label for="remark">Remark</label>
                                                            <input type="text" name="Remark" id="remark">
                                                            <button type="submit" name="btnsubmit" class="open-button">Submit</button>
                                                        </form> -->
                                                                <!-- <a class="close-button" href="javascript:void(0)">x</a> -->
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                      

<?php
$date =date('Y-m-d');
  $sql="SELECT  * from tbl_homerequest r INNER JOIN tbl_payment p on r.request_id=p.request_id INNER JOIN tbl_homedetails h on h.home_id= r.home_id where r.status='paid' and r.user_id='$uid' and r. from_date >='$date'";  
$result2 = $obj->executequery($sql);
?>
  <h1>Paid Details</h1>

                            <table class="table ">
                              
                                <thead>
                                    <tr>
                                        <th>Sl.no</th>
                                        <th>Require Date</th>
                                        <th>Home Name</th>
                                        <th>Initial amount</th>
                                        <th>Payment status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php $i = 1;
                                        while ($display1 = mysqli_fetch_array($result2)){ ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($i++); ?></td>
                                                
                                                     <td>   <?php echo htmlspecialchars($display1["from_date"]); ?>
                                                    </td>
                                                    <td><?php echo htmlspecialchars($display1["Home_name"]); ?>  </td>
                                                <td><?php echo htmlspecialchars($display1["initial_amount"]); ?></td>
                                                <td><?php echo htmlspecialchars($display1["status"]); ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                            
</div>
            </div>
        </div>
        </div>
        </div>


    
</section>

<script src="../jquery-3.6.0.min.js"></script>
    <script>
        $(function () {
            // Open Popup
            $('.open-button').on('click', function () {
                var popup_id = $(this).data('popup');
                $('#' + popup_id).fadeIn(300);
            });

            // Close Popup
            $('.close-button').on('click', function () {
                $(this).closest('.popup').fadeOut(1000);
            });
        });
    </script>
    <?php include_once("footer.php"); 
    ?>
