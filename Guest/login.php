<?php
include_once("header.php");
?>

<style>
    /* Full height container for side login */
    .hero-wrap {
        display: flex;
        align-items: center;
        justify-content: flex-start; /* Align items to the left */
        height: 110vh; /* Full viewport height */
        background-image: url('images/bg_2.jpg');
        background-size: cover;
        background-position: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Dark overlay for contrast */
    }

    .login-container {
        position: relative;
        z-index: 1;
        background: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin-left: 2rem; /* Add margin to the left for spacing */
    }

    .login-container h3 {
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 0.375rem;
        padding: 0.75rem;
        border: 1px solid #ddd;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        border-radius: 0.375rem;
        padding: 0.75rem;
        width: 100%;
        margin-bottom: 1rem;
        display: block;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .social-login {
        text-align: center;
        margin-top: 1rem;
    }

    .social-login a {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #fff;
        color: #333;
        text-align: center;
        line-height: 40px;
        margin: 0 10px;
        font-size: 1.25rem;
        transition: background 0.3s;
    }

    .social-login a:hover {
        background: #e2e6ea;
    }

    .forgot-pass {
        display: block;
        text-align: center;
        color: #007bff;
        text-decoration: none;
        margin-top: 1rem;
    }

    .forgot-pass:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }

        .login-container h3 {
            font-size: 1.25rem;
        }
    }
</style>

<section class="hero-wrap">
    <div class="overlay"></div>
    <div class="login-container">
        <h3>Login Here</h3>
        <form action="loginaction.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="txtusername" required>
            </div>
            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="txtpassword" required>
            </div>
            <div class="d-flex mb-4 align-items-center justify-content-between">
                <label class="control control--checkbox mb-0">
                    <input type="checkbox" checked="checked">
                    <div class="control__indicator"></div>
                    <span class="caption">Remember me</span>
                </label>
                <a href="forgot.php" class="forgot-pass">Forgot Password?</a>
            </div>
            <input type="submit" value="Log In" name="LogIn" class="btn btn-primary">
            <span class="d-block text-muted mt-3">Or sign in with</span>
            <div class="social-login">
                <a href="#" class="facebook">
                    <span class="icon-facebook"></span>
                </a>
                <a href="#" class="twitter">
                    <span class="icon-twitter"></span>
                </a>
                <a href="#" class="google">
                    <span class="icon-google"></span>
                </a>
            </div>
        </form>
    </div>
</section>

<?php
include_once("footer.php");
?>