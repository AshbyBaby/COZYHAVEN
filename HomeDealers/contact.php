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
<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Get in Touch</h2>
            <p>If you have any queries,feel free to contact us. Fill your information to get in touch with our team.</p>
          </div>
        </div>

        <div class="row block-9">
          <div class="col-md-7 order-md-last d-flex ftco-animate">
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-5 d-flex">
          	<div class="row d-flex contact-info mb-5">
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-map-signs"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Address</h3>
				            <p>40 E Main St # 1215 Newark 19711-4639</p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-phone2"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Contact Number</h3>
				            <p><a href="tel://1234567920">+91 9961 6821 99</a></p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-paper-plane"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Email Address</h3>
				            <p><a href="mailto:info@yoursite.com">cozyhaven2022@gmail.com</a></p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-globe"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Website</h3>
				            <p><a href="#">cozyhavensite.com</a></p>
			            </div>
			          </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>
    <?php
            include_once ("footer.php");
            ?>