<?php
session_start();
error_reporting(0);
include 'db/connection.php';

if(strlen($_SESSION['userToken']) == 0){
  header('location: index.php');
}
else{

$userQuery = mysqli_query($con, "SELECT name FROM usertable WHERE userToken = '".$_SESSION['userToken']."'");
$rw = mysqli_fetch_array($userQuery);

if(isset($_POST['addProject'])){

  $projectName = $_POST['projectName'];
  $projectDescription = $_POST['projectDescription'];
  $dueDate = $_POST['dueDate'];

  $hashedString = bin2hex(random_byte(20));
  $_SESSION['projectToken'] = $hashedString;

   mysqli_query($con, "INSERT INTO project(userToken, projectToken, projectName, projectDescription, dueDate, status)
                    VALUES('".$_SESSION['userToken']."', '".$_SESSION['projectToken']."', '$projectName', '$projectDescription', '$dueDate', 'active')");
  echo "alert('Project has been successfully addded!');";
}

 ?>

<html lang="en">
   <head>
      <!-- Meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- Fontawesome CSS CDN -->
   	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
      <title><?php echo htmlentities($rw['name']); ?> | Dashboard</title>
      <link href="img/icons/logo.png" rel="shortcut icon">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
            <a class="navbar-brand" href="dashboard.php"><?php echo htmlentities($rw['name']); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="dashboard.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="logout-user.php">logout</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>

      <!-- START Modal SECTION -->

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
            <input type="text" id="projectName" name="projectName" class="form-control rounded-0" placeholder="Project Name" required />
          </div>
          <div class="input-group input-group-lg form-group">
            <div class="input-group-prepend">
              <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
            </div>
            <input type="text" id="projectDescription" name="projectDescription" class="form-control rounded-0"  placeholder="Project Description" required autocomplete="off" />
          </div>

          <div class="input-group input-group-lg form-group">
            <div class="input-group-prepend">
              <span class="input-group-text rounded-0"><i class="fas fa-calendar fa-lg fa-fw"></i></span>
            </div>
            <input type="date" id="dueDate" name="dueDate" class="form-control rounded-0" placeholder="Due Date" required autocomplete="off" />
          </div>
          <div class="form-group">
            <input type="submit" name="addProject" id="addProject" value="Add Project" class="btn btn-primary btn-lg btn-block myBtn" />
          </div>
        </form>
      </div>

<!--END MODAL SECTION-->

<br><br><br>
    <div class="container grid">
        <?php
        $allProjectsQuery = mysqli_query($con, "SELECT * FROM project
                            WHERE userToken = '".$_SESSION['userToken']."' AND status = 'active'");
        while($rws = mysqli_fetch_array($allProjectsQuery)){
         ?>
         <div class="row">
          <div class="col">
          	<figure class="card card-product">
          		<div class="img-wrap"><img src="img/icons/logo.png"></div>
          		<figcaption class="info-wrap">
          				<h4 class="title"><a href="tasks.php?prjtk=<?php echo htmlentities($rws['projectToken']); ?>" class=""><?php echo htmlentities($rws['projectName']); ?></a></h4>
          				<p class="desc"><?php echo htmlentities($rws['projectDescription']); ?></p>
          		</figcaption>
          		<div class="bottom-wrap">
          			<div class="price-wrap h5">
          				<span class="price-new">Due Date: <?php echo htmlentities($rws['dueDate']);?></span>
          			</div> <!-- price-wrap.// -->
          		</div> <!-- bottom-wrap.// -->
          	</figure>
          </div>
        </div>
  <?php } ?>
</div>

      <!-- jQuery library -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <!-- Popper -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <!-- Latest compiled and minified Bootstrap JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>
<?php } ?>
