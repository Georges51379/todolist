<?php require_once "dataProcessing.php"; ?>
<?php
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center wrapper" id="user-otp-box">
      <div class="col-lg-10 my-auto effects-bg">
        <div class="row">
          <div class="col-lg-7 bg-white p-4">
            <h1 class="text-center font-weight-bold text-primary">code</h1>
            <hr class="my-3" />
                <form class="px-3" action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
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
                        <span class="input-group-text rounded-0"><i class="far fa-number fa-lg fa-fw"></i></span>
                      </div>
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="check-reset-otp" id="check-reset-otp-btn" value="Reset OTP" class="btn btn-primary btn-lg btn-block myBtn" />
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>
