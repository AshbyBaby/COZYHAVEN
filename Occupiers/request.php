<?php
include_once("header.php");
$hid = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header-section {
            background-color: #4CAF50; /* Light green */
            color: white;
            padding: 1rem 0;
            text-align: center;
            margin-bottom: 2rem;
        }

        .header-section h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }

        .contact-section {
            padding: 3rem 0;
        }

        .contact-form {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            color: #333;
            font-weight: bold;
        }

        .contact-form .form-group label {
            font-weight: 600;
        }

        .contact-form .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: none;
            transition: border-color 0.3s;
        }

        .contact-form .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .contact-form .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .contact-form .btn-primary:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }
    </style>
</head>
<body>

<section class="header-section">
    <h1>Request Details</h1>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-form">
                    <h2 class="text-center">Request Details</h2>
                    <form action="requestaction.php" method="POST">
                        <div class="form-group">
                            <label for="fromdate">From Date</label>
                            <input class="form-control valid" name="date" id="date" type="date" placeholder="Enter Module" required <?php echo 'min="' . date('Y-m-d') . '"';?>>
                        </div>

                        <div class="form-group">
                            <label for="todate">To Date</label>
                            <input class="form-control valid" name="date" id="date" type="date" placeholder="Enter Module" required <?php echo 'min="' . date('Y-m-d') . '"';?>>
                        </div>

                        <div class="form-group">
                            <label for="numpersons">Number of Persons</label>
                            <input type="number" class="form-control" id="numpersons" name="numpersons" placeholder="Number of Persons" required>
                        </div>

                        <input type="hidden" name="hid" value="<?php echo htmlspecialchars($hid); ?>">
                        <div class="form-group text-center">
                            <input type="submit" value="Send Request" name="submit" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>