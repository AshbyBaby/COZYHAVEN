<?php
include_once("header.php");
?>
<styl>
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
<section class="hero-section">
        <div class="overlay"></div></section>
<section class="ftco-section" id="support-section">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 text-center heading-section ftco-animate mb-5">
          	<span class="subheading">Get instant help</span>
            <h2 class="mb-3"> Support</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services d-block text-center px-3 pb-4">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-home-repair"></span></div>
              <div class="media-body py-md-4">
                <h3>Quick Chat</h3>
                <button class="btn btn-primary py-1 px-2">Reply in 60 sec</button>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services d-block text-center px-3 pb-4">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-sales"></span></div>
              <div class="media-body py-md-4">
                <h3>Whatsapp</h3>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services d-block text-center px-3 pb-4">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-bank"></span></div>
              <div class="media-body py-md-4">
                <h3>contact no</h3>
                <p>+91 9961 6821 99</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services d-block text-center px-3 pb-4">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-team"></span></div>
              <div class="media-body py-md-4">
                <h3>Message</h3>
                <p>contact@cozyhaven2022.com</p>
              </div>
            </div>      
          </div>
          
    </section>
    <?php
            include_once ("footer.php");
            ?>