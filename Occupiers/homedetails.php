<?php
session_start();
include_once("header.php");
require_once("../dboperation.php");

$obj = new dboperation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Details</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section */
        .hero-wrap {
            background-image: url('images/bg_1.jpg');
            background-size: cover;
            background-position: center;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 1px 1px 2px black;
            margin-bottom: 30px;
        }

        .hero-wrap h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }

        /* Table Styling */
        .table {
            margin: 20px 0;
        }

        .table thead th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
        }

        .btn-info {
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-info:hover {
            background-color: #0056b3;
        }

        /* Custom Container */
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Image Styling */
        .img-thumbnail {
            height: 100px;
            width: 100px;
            object-fit: cover;
        }

        /* Responsive Design */
        @media (max-width: 767px) {
            .hero-wrap {
                height: 60px;
            }

            .hero-wrap h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <section class="hero-wrap">
        <h1>Home Details</h1>
    </section>
    <button class="btn btn-primary btn-rounded mb-3"
    onclick='window.location.href="confirmation.php"'>BACK</button>
    <section class="ftco-section">
        <div class="container container-custom">
           
                <?php
                $hid = $_GET['homeid'];
                 $sqlquery = "SELECT * FROM tbl_homedetails h INNER JOIN tbl_homeowner o ON o.owner_id = h.owner_id INNER JOIN tbl_city c on c.city_id=o.city_id WHERE Home_id = 17";
                $result1 = $obj->executequery($sqlquery);
                ?>

                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                        <div class="form-group row" id="r1">
                            <div class="col-sm-12">
                                
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>Image</th>
                                            <th>Home Name</th>
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>No of Persons</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($display = mysqli_fetch_array($result1)) { ?>
                                            <tr>
                                                <td><img src="../upload/<?php echo $display["Image"]; ?>"
                                                        class="img-thumbnail" alt="Home Image"></td>
                                                <td><?php echo $display["home_name"] ?></td>
                                                <td><?php echo $display["description"]; ?></td>
                                                <td><?php echo $display["rate"] ?></td>
                                                <td><?php echo $display["noofperson"]; ?></td>
                                                <td>
                                                    <?php if ($display["status"] == "Accept"): ?>
                                                        <input type="button" class="btn btn-info btn-lg" value="Payment">
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                       
                                    </tbody>

                                </table>
                                <br>
                                <br>
                                <table class="table table-striped">
                                    <thead>

                                        <tr>

                                            <th>Owner Name</th>
                                            <th>House Name</th>
                                            <th>City</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                            <tr>

                                                <td><?php echo $display["name"]; ?></td>
                                                <td><?php echo $display["housename"]; ?></td>
                                                <td><?php echo $display["city_name"]; ?></td>
                                                <td><?php echo $display["phone"]; ?></td>
                                                <td><?php echo $display["email"]; ?></td>
                                                <td><img src="../upload/<?php echo $display["image"]; ?>"
                                                        class="img-thumbnail" alt="Home Image"></td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row" id="details"></div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>