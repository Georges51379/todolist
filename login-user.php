<?php require_once "dataProcessing.php"; ?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
  <div class="dark-div">
    <button href="#" onclick="darkMode()" class="dark-mode-active"><i class="fa fa-user"></i></button>
  </div>
<script>
  function darkMode(){
    var element = document.body;
    element.classList.toggle("dark-mode-active");
}
</script>

    <center>
    <div class="wrapper">
        <div class="form-div">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2>Login Form</h2>
                    <p>Login with your email and password.</p>
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
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <br>
                    <div class="link"><a class="link-a forgot" href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="btn" type="submit" name="login" value="Login">
                    </div><br>
                    <div class="link">Not yet a member? <a class="link-a" href="signup-user.php">Signup now</a></div>
                </form>
        </div>
    </div>
</center>
  </body>
</html>
