<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$requestid = $_GET['requestid'];

 $sqlquery1 = "SELECT * FROM tbl_homerequest h 
              INNER JOIN tbl_homedetails n ON h.home_id = n.home_id 
              INNER JOIN tbl_user u ON h.user_id = u.user_id 
              INNER JOIN tbl_district d ON u.district_id = d.district_id 
              INNER JOIN tbl_state s ON s.state_id = d.state_id 
              INNER JOIN tbl_country c ON c.country_id = s.country_id 
              WHERE h.request_id = $requestid";
$result1 = $obj->executequery($sqlquery1);
$display = mysqli_fetch_array($result1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Styling */
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
            color: #ffffff;
        }

        .hero-section p {
            font-size: 1.1rem;
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

        /* Card and Table Styling */
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            margin-top: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            font-weight: 600;
            padding: 20px;
            border-radius: 12px 12px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-body img {
            max-width: 150px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .table-custom {
            margin-top: 20px;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-custom thead {
            background-color: #007bff;
            color: #ffffff;
        }

        .table-custom thead th {
            padding: 15px;
            text-align: left;
        }

        .table-custom tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .table-custom tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .btn-custom {
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 0.875rem;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-accept {
            background-color: #28a745;
            border: none;
            color: #ffffff;
        }

        .btn-reject {
            background-color: #dc3545;
            border: none;
            color: #ffffff;
        }

        .btn-accept:hover, .btn-reject:hover {
            opacity: 0.8;
        }

        .section-heading {
            margin-bottom: 20px;
            font-size: 2rem;
            font-weight: 700;
        }

        .section-content {
            font-size: 1.1rem;
        }

        .section-content h4 {
            margin-bottom: 10px;
            font-weight: 600;
        }

        .section-content img {
            margin-bottom: 15px;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .hero-section {
                padding: 50px 0;
            }

            .card-body {
                padding: 15px;
            }

            .card-body img {
                max-width: 100px;
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
            <p><a href="#" class="btn btn-light">Search Places</a></p>
        </div>
    </section>

    <!-- Request Details Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Request Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../upload/<?php echo $display['Image']; ?>" alt="Home Image">
                        </div>
                        <div class="col-md-6">
                            <h4><b>Home Name:</b> <?php echo $display['Home_name']; ?></h4>
                            <h4><b>Number of Persons:</b> <?php echo $display['noofperson']; ?></h4>
                            <h4><b>Rate:</b> <?php echo $display['rate']; ?></h4>
                            <h4><b>Description:</b> <?php echo $display['description']; ?></h4>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>User Name:</b> <?php echo $display['name']; ?></h4>
                            <h4><b>House Name:</b> <?php echo $display['housename']; ?></h4>
                            <h4><b>Pincode:</b> <?php echo $display['pincode']; ?></h4>
                            <h4><b>ID Proof:</b> <img src="../upload/<?php echo $display['idproof']; ?>" alt="ID Proof"></h4>
                            <h4><b>Phone Number:</b> <?php echo $display['phone']; ?></h4>
                            <h4><b>Email:</b> <?php echo $display['Email']; ?></h4>
                            <h4><b>Image:</b> <img src="../upload/<?php echo $display['image']; ?>" alt="User Image"></h4>
                            <h4><b>Country:</b> <?php echo $display['country_name']; ?></h4>
                            <h4><b>State:</b> <?php echo $display['state_name']; ?></h4>
                            <h4><b>District:</b> <?php echo $display['District_name']; ?></h4>
                        </div>
                        <div class="col-md-6">
                            <h4><b>Request Date:</b> <?php echo $display['request_date']; ?></h4>
                            <h4><b>From Date:</b> <?php echo $display['from_date']; ?></h4>
                            <h4><b>To Date:</b> <?php echo $display['to_date']; ?></h4>
                            <h4><b>No. of Persons:</b> <?php echo $display['noofperson']; ?></h4>
                            <a href="accept.php?requestid=<?php echo $display['request_id']; ?>" class="btn btn-custom btn-accept" onclick="return confirm('Are you sure you want to accept?');">ACCEPT</a>
                            <a href="reject.php?requestid=<?php echo $display['request_id']; ?>" class="btn btn-custom btn-reject" onclick="return confirm('Are you sure you want to reject?');">REJECT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
    
</body>
</html>