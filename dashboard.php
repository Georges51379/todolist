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

 ?>

<html lang="en">
   <head>
      <!-- Meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                     <a class="nav-link" href="projects.php">add project</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="logout-user.php">logout</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
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
