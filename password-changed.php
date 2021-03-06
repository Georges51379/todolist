<?php require_once "dataProcessing.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
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

<div class="container">
  <div class="row justify-content-center wrapper" id="user-otp-box">
    <div class="col-lg-10 my-auto effects-bg">
      <div class="row">
        <div class="col-lg-7 bg-white p-4">
          <h1 class="text-center font-weight-bold text-primary">code</h1>
          <hr class="my-3" />
            <?php
            if(isset($_SESSION['info'])){
                ?>
                <div class="success-div">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="index.php" class="px-3" method="POST">
                    <div class="form-group">
                        <input class="btn" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
