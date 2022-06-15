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
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/style.css">

<script>
  function checkPassword(){
    jQuery.ajax({
      url: "check/check-password.php",
      data: 'password=' +$("#password").val(),
      type: "POST",
      success:function(data){
        $("#passwordAvailability").html(data);
      },
      error:function(){}
    });
  }
</script>

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
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="success-div">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                        <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                      </div>
                      <input type="password" id="password" name="password" onblur="checkPassword()" class="form-control rounded-0" minlength="5" placeholder="Password" required />
                      <br><span id="passwordAvailability"></span>
                    </div>
                    <div class="input-group input-group-lg form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                      </div>
                      <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
                    </div>
                    <div class="form-group">
                      <input type="submit" name="change-password" id="change-password-btn" value="Change Password" class="btn btn-primary btn-lg btn-block myBtn" />
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
