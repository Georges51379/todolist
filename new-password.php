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

  <center>
    <div class="wrapper">
            <div class="form-div">
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
                    <div class="form-group">
                        <input class="form-control" id="password" type="password" onblur="checkPassword()" name="password" placeholder="Create new password" required>
                        <br><span id="passwordAvailability"></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="btn" id="btn" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
</center>

</body>
</html>
