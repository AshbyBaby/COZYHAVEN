<?php
include_once("header.php");
?>
<style>
    /* General styles */
    body {
        background-color: #f4f7fa;
        /* Soft background color */
        font-family: 'Arial', sans-serif;
        /* Clean font */
        margin: 0;
        /* Remove default margin */
    }

    /* Center the content */
    .content-wrapper {
        display: flex;
        justify-content: center;
        /* Center horizontally */
        align-items: flex-start;
        /* Align to the top */
        height: 100vh;
        /* Full height */
        padding: 1rem;
        /* Small padding for responsiveness */
    }

    /* Card styling */
    .card {
        background-color: #ffffff;
        /* White background */
        border-radius: 12px;
        /* Soft rounded corners */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        /* Deeper shadow */
        padding: 2rem;
        /* Inner padding */
        width: 100%;
        /* Full width */
        max-width: 500px;
        /* Maximum width for the card */
        margin-top: 50px;
        /* Add margin to move the card down */
    }

    /* Title styling */
    .card-title {
        font-size: 1.8rem;
        /* Larger title size */
        margin-bottom: 1.5rem;
        /* Space below title */
        text-align: center;
        /* Center title */
        color: #333;
        /* Darker text for contrast */
    }

    /* Form control styles */
    .form-control {
        border: 1px solid #ced4da;
        /* Light gray border */
        border-radius: 8px;
        /* Slightly rounded corners */
        padding: 0.75rem;
        /* Padding */
        width: 100%;
        /* Full width */
        margin-bottom: 1rem;
        /* Space below input */
        transition: border-color 0.3s;
        /* Smooth transition */
        font-size: 1rem;
        /* Consistent font size */
    }

    .form-control:focus {
        border-color: #007bff;
        /* Focus border color */
        outline: none;
        /* Remove default outline */
    }

    /* Button styles */
    .btn {
        border-radius: 0.375rem;
        padding: 0.5rem 1rem;
        min-width: 100px;
        /* Ensure buttons are not too wide */
        font-size: 0.875rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        /* Darker shade on hover */
    }

    .btn-light {
        background-color: #f8f9fa;
        /* Light button color */
        color: #495057;
        /* Dark text */
    }

    .btn-light:hover {
        background-color: #e2e6ea;
        /* Darker shade on hover */
    }

    /* Button group */
    .button-group {
        display: flex;
        justify-content: center;
        /* Center buttons horizontally */
        gap: 1rem;
        /* Space between buttons */
        margin-top: 1.5rem;
        /* Space above the buttons */
    }

    .d-flex-justify-end {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 1.5rem;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <h4 class="card-title">Add Country</h4>
            <!-- VIEW Button aligned to the right -->
            <div class="d-flex-justify-end">
                <button class="btn btn-primary" onclick='window.location.href="countryview.php"'>VIEW</button>
            </div>

            <form method="post" action="countryaction.php">

                <div class="form-group">
                    <label for="countryName">Country Name</label>
                    <input type="text" name="name" class="form-control" id="countryName"
                        placeholder="Enter country name" required>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary" name="btnadd">Submit</button>
                    <a href="somepage.php" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
            <?php
            include_once ("footer.php");
            ?>