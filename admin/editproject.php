<?php
session_start();
include('db/connection.php');
$id = intval($_GET['id']);
date_default_timezone_set('Asia/Beirut');
$currentTime = date('d-m-Y h:i:s A', time() );


if(isset($_POST['editproject'])){
  $projectName= $_POST['projectName'];
  $projectDescription= $_POST['projectDescription'];
  $status= $_POST['status'];

  $query= mysqli_query($con, "update project set projectName='$projectName', projectDescription='$projectDescription', status='$status', updateDate='$currentTime' where id='$id'");
  echo"project updated!";
  header('location:project.php');
}
?>

<html>
    <head>
      <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
      <title>To Do List | Admin Project</title>
      <link href="img/icons/logo.png" rel="shortcut icon">
      <!--FONT AWESOME CDN SECTION-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>

      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>

    </head>

    <body>
<?php include 'includes/sidenav.inc.php'; ?>
<center>
<form class="admin_form" name="insertproduct" method="post" enctype="multipart/form-data">
<?php $query= mysqli_query($con, "select * from project where id ='$id'");
$cnt=1;
while($row=mysqli_fetch_array($query)){
 ?>

 <div class="adminform_div">
   <label class="adminform_label" for="basicinput">project Name</label><br>
   <input type="text" name="projectName"  placeholder="Enter Project Name" value="<?php echo htmlentities($row['projectName']);?>" class="adminform_input" >
 </div>

 <div class="adminform_div">
   <label class="adminform_label" for="basicinput">project description</label><br>
   <textarea  name="projectDescription"  placeholder="Enter project Description" rows="6" class="adminform_textarea">
     <?php echo htmlentities($row['projectDescription']);?>
   </textarea>
</div>

<div class="adminform_div">
  <label class="adminform_label" for="basicinput">status</label><br>
  <input type="text" name="status"  placeholder="Enter status" value="<?php echo htmlentities($row['status']);?>" class="adminform_input" >
</div>

<?php $cnt++; } ?>
<div class="adminform_div">
  <button type="submit" name="editproject" class="adminform_btn">Update</button>
</div>
</form>
</center>
    </body>
</html>
