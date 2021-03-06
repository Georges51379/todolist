<?php
require_once "dataProcessing.php";

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup</title>
		<!-- Bootstrap 4 CSS CDN -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
	 <!-- Fontawesome CSS CDN -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
		<link href="img/icons/logo.png" rel="shortcut icon">
  </head>

  <body>
    <div class="container">
      <!-- Login Form Start -->
      <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-10 my-auto effects-bg">
          <div class="row">
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Sign in</h1>
              <hr class="my-3" />
              <form action="#" method="post" class="px-3" id="login-form">
								<?php
								if(count($errors) > 0){
										?>
										<div class="error-div">
												<?php
												foreach($errors as $showerror){
														echo $showerror;
												}
												?>
										</div>
										<?php
								}
								?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="password" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required autocomplete="off" />
                </div>
                <div class="form-group clearfix">
                  <div class="forgot float-right">
                    <a href="#" id="forgot-link">Forgot Password?</a>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="login" id="login-btn" value="Sign In" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center bg-img p-4">
              <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
              <hr class="my-3 bg-light myHr" />
              <p class="text-center font-weight-bolder text-light lead">Fill in your infomation to access this application. Have fun!</p>
              <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End -->
      <!-- Registration Form Start -->
      <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
        <div class="col-lg-10 my-auto effects-bg">
          <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center bg-img p-4">
              <h1 class="text-center font-weight-bold text-white">Hello User!</h1>
              <hr class="my-4 bg-light myHr" />
              <p class="text-center font-weight-bolder text-light lead">To use this application, please fill in the fields.</p>
              <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</button>
            </div>
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
              <hr class="my-3" />
              <form action="index.php" method="post" class="px-3" id="register-form">
								<?php
								if(count($errors) == 1){
										?>
										<div class="alert alert-danger text-center">
												<?php
												foreach($errors as $showerror){
														echo $showerror;
												}
												?>
										</div>
										<?php
								}elseif(count($errors) > 1){
										?>
										<div class="alert alert-danger">
												<?php
												foreach($errors as $showerror){
														?>
														<li><?php echo $showerror; ?></li>
														<?php
												}
												?>
										</div>
										<?php
								}
								?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="name" name="name" class="form-control rounded-0" placeholder="Full Name" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                  </div>
                  <input type="email" id="remail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
                </div>
                <div class="form-group">
                  <div id="passError" class="text-danger font-weight-bolder"></div>
                </div>
                <div class="form-group">
                  <input type="submit" name="signup" id="register-btn" value="Sign Up" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Registration Form End -->
      <!-- Forgot Password Form Start -->
      <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
        <div class="col-lg-10 my-auto effects-bg">
          <div class="row">
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
              <hr class="my-3" />
              <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
              <form action="#" method="post" class="px-3" id="forgot-form">
                <div id="forgotAlert"></div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
                  </div>
                  <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="form-group">
                  <input type="submit" name="forgotpwd" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center bg-img p-4">
              <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
              <hr class="my-4 bg-light myHr" />
              <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Forgot Password Form End -->
    </div>

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>
