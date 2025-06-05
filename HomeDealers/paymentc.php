<?php
session_start();
include_once("header.php");
require_once("../dboperation.php");

$obj = new dboperation();
$uid=$_SESSION['ownerid'];
$s = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../jquery-3.6.0.min.js"></script>
    <style>
        /* Hero Section */
        .hero-section {
            position: relative;
            color: white;
            text-align: center;
            padding: 80px 0;
            background: url('images/bg_1.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .hero-section p {
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: #d3d3d3;
        }

        .hero-section .btn {
            border-radius: 25px;
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s, color 0.3s;
        }

        .hero-section .btn:hover {
            background-color: #000000;
            color: #ffffff;
        }

        /* Form and Table Section */
        .form-section {
            padding: 60px 0;
            background-color: #f9f9f9;
        }

        .form-section .container {
            max-width: 1200px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #4CAF50; /* Changed to a green shade */
            color: #ffffff;
            font-weight: 600;
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .form-section input[type="date"] {
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 10px;
            width: 100%;
        }

        .table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table thead th {
            background-color: #343a40; /* Dark gray */
            color: #ffffff;
            text-align: center;
            font-weight: 600;
            padding: 12px;
            border-bottom: 2px solid #212529;
        }

        .table tbody tr {
            transition: background-color 0.3s;
        }

        .table tbody tr:hover {
            background-color: #e9ecef; /* Light gray */
        }

        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }

        .table img {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .table .btn {
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 0.875rem;
            transition: background-color 0.3s, color 0.3s;
        }

        .table .btn-info {
            background-color: #17a2b8;
            border: none;
            color: #ffffff;
        }

        .table .btn-info:hover {
            background-color: #138496;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section h2 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="overlay"></div>
        <div class="container">
        <h2>Choose Your Dream House</h2>
            <p>We can manage your dream building. A small river named Duden flows by their place.</p>
        </div>
    </section>

    <section class="form-section">
    <h1><center>PAID DETAILS</center></h1>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    payment details
                </div>
                <div class="card-body">
                    <!-- <input type="date" name="date" id="date" class="form-control mb-4"> -->
                    <table class="table table-striped">
                 
                              
                              <thead>
                                  <tr>
                                      <th>Sl.no</th>
                                      <th>Require Date</th>
                                      <th>Home Name</th>
                                      <th>Customer Name</th>
                                      <th>Email</th>
                                      <th>Initial amount</th>
                                      <th>Payment status </th>
                                  </tr>
                              </thead>
                        <tbody id="details">
                        <?php

$date=date('Y-m-d');
$oid=$_SESSION['ownerid'];
$sqlquery1="SELECT  * from tbl_homerequest r INNER JOIN tbl_payment p on r.request_id=p.request_id INNER JOIN tbl_homedetails h on h.Home_id= r.Home_id inner join tbl_user u on u.user_id=r.user_id where r.status='paid' and h.owner_id='$oid' and r. to_date >='$date'";
$result1 = $obj->executequery($sqlquery1);

?>
                
                <?php
                        $i = 1;
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $display["from_date"];?></td>
                            <td><?php echo $display["Home_name"];?></td>
                            <td><?php echo $display["name"];?></td>
                            <td><?php echo $display["Email"];?></td>
                            <td><?php echo $display["initial_amount"];?></td>
                            <td><?php echo $display["status"];?></td>
                            
                           
                       
                         
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#date").change(function () {
                var date = $(this).val();
                $.ajax({
                    url: "getpayment.php",
                    method: "POST",
                    data: { date: date },
                    success: function (response) {
                        $("#details").html(response);
                    },
                    error: function () {
                        $("#details").html("<tr><td colspan='7' class='text-center text-danger'>Error occurred while getting data!</td></tr>");
                    }
                });
            });
        });
    </script>

<?php include_once("footer.php"); ?>

