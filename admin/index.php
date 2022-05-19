<?php
session_start();
// Database Connection File
require 'db/connection.php';
if(strlen($_SESSION['email'])==0){
	header('location:login-user.php');
}
?>

<html>
      <head>
        <!--META LINKS-->
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <title>To Do List | Admin</title>
        <link href="img/icons/logo.png" rel="shortcut icon">
        <link href="css/index.css" rel="stylesheet">
        <!--FONT AWESOME CDN SECTION-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--jQUERY CDN SECTION-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      </head>

      <body>
<?php include 'includes/sidenav.inc.php'; ?>
<?php
  $query= mysqli_query($con,"select * from project where status=1");
    $projectNumber= mysqli_num_rows($query)
 ?>
 <?php
     $queryUser= mysqli_query($con,"select * from user$ where userStatus=1");
       $usersNumber= mysqli_num_rows($queryUser);
  ?>
<!--3 BOXES FOR USERS PROJECTS INCOME FROM ADS-->
  <section>

    <div class="wrapper">
      <div class="content">
        <div class="title">users</div>
        <div class="number">
          <?php echo $usersNumber; ?>
        </div>
      </div>
    </div><!--END WRAPPER-->
&emsp;
    <div class="wrapper">
      <div class="content">
        <div class="title">projects</div>
        <div class="number">
          <?php echo $projectNumber; ?>
        </div>
      </div>
    </div><!--END WRAPPER-->
&emsp;
<?php
$query= mysqli_query($con,"select * from banners where status=1");

while($row=mysqli_fetch_array($query)){

$sum = $row['price'];
}
 ?>
    <div class="wrapper">
      <div class="content">
        <div class="title">income</div>
        <div class="number">
          <?php echo $sum; ?>
        </div>
      </div>
    </div><!--END WRAPPER-->
  </section>
<!--END OF 3 BOXES FOR USERS PROJECTS INCOME FROM ADS -->

<!--PIE CHART SECTION-->
<center>
<div id="piechart" style="width: 900px; height: 500px;"></div>
</center>
<script>
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<!--END PIE CHART section-->
      </body>
</html>
