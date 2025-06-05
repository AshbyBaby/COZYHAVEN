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
<section class="ftco-section testimony-section" id="client-section">
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Read testimonials</span>
            <h2 class="mb-4">What Client Says</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">"Experience was amazing!! I'm going to plymouth College of Art. Great prices & the rent durations are negotiable. Also as an art student i do appreciate the website design-its clear,visible & well placed."</p>
                    <p class="name">Simon Langer</p>
                    <span class="position">Plymouth College of Art</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">"The best service I could ask for an international student. Awesome, great follow-up services that helped me throughout the process from start to the end. Thanks to Amber for a great facility!”</p>
                    <p class="name">Paveeneech</p>
                    <span class="position">Imperial College Business School</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">“I am going to study at UCL and Supreet from Cozyhaven did an excellent job in helping me. I do not have doubt to recommend Supreet as a student helper. I hope to receive his help in future. The room is in an excellent location.”</p>
                    <p class="name">Roberto Antonia</p>
                    <span class="position">University College London</span>
                  </div>
                </div>
              </div>
              
          </div>
        </div>
      </div>
    </section>
    <?php include_once("footer.php"); 
    ?>