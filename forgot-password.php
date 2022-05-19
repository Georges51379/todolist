<?php require_once "dataProcessing.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2>Forgot Password</h2>
                    <p>Enter your email address</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="error-div">
                                <?php
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn" type="submit" name="forgotpwd" value="Continue">
                    </div>
                </form>
            </div>
        </div>
</center>
</body>
</html>
