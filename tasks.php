<?php
session_start();
require 'db/connection.php';
if(strlen($_SESSION['email'])==0){
	header('location: index.php');
}
else {
$tid=intval($_GET['taskid']);

	if(isset($_POST['add']))
	{
		if( isset($_POST['tasks']) && !empty($_POST['tasks']) ) // Be sure the task brought here is not an empty field
		{
			// Variable declaration
			$task = trim(strip_tags(htmlspecialchars($_POST['tasks'])));

			// Save the task into the database
			mysqli_query($con, "insert into `task` (projectID, tasks, status) values($tid, '".mysqli_real_escape_string($con, $task)."', '".mysqli_real_escape_string($con, 'Pending')."')") or die(mysqli_errno());
			echo "<a href='tasks.php?<?php echo htmlentities $tid; ?>'></a>";  // Redirect back to index.php page
		}
		else
		{
			echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		}
	}

	if(isset($_POST['deleteproject'])){
		$query = mysqli_query ($con, "update project set status=0 where id='$tid'");
		header('location:index.php');
	}
}
	$projectQuery= mysqli_query($con, "select * from project where id='$tid'");
	$rw= mysqli_fetch_array($projectQuery);
 ?>
<html>
 	<head>
 <!--TITLE SECTION-->
     <title><?php echo htmlentities($rw['projectName']);?> | Tasks</title>
 <!--META LINKS-->
 		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
 <!--FONT AWESOME CDN SECTION-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!--jQUERY CDN SECTION-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!--ICON SECTION-->
 		<link href="img/icons/logo.png" rel="shortcut icon">
 <!--INDEX.CSS SECTION-->
 		<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>

  <body>

<header>
	<div class="project-title">
		<?php  echo htmlentities ($rw['projectName']); ?>
	</div>
</header>
<div class="backbtn">
	<a href="index.php" class="backlink"><i class="fa fa-arrow-left"></i></a>
</div>
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
<div class="project-description">
	<?php echo htmlentities ($rw['projectDescription']); ?>
</div>

<form class="form" method="post">
	<button class="deletebtn" name="deleteproject">delete project</button>
</form>
<br><br>
<?php $query= mysqli_query($con, "select * from banners where form='portrait'");
$row= mysqli_fetch_array($query); ?>

<div class="banner-landscape">
	<a href="<?php echo htmlentities($orw['url']);?>" target="_blank">
	<img class="img-ad-landscape" src="admin/banners/<?php echo htmlentities($row['image']); ?>"
	data-echo="admin/banners/<?php echo htmlentities($row['image']);?>">
</a>
	<br><br>
	<span class="comp-name">
		ad by <span class="compName"><?php echo htmlentities($row['companyName']);?></span>
	</span>
</div>
	<br><br><br><br><br>
    <div class="form_div">
        <form method="POST" class="form">
            <input type="text" class="form_input" name="tasks" required/>
            <button class="btn_add" name="add">Add Task</button>
        </form>
    </div>
    <br><br>
    <?php
    $query=mysqli_query($con, "SELECT * FROM task WHERE projectID=$tid");
    $rows=mysqli_num_rows($query);

    echo"<br><br>";
    	echo "You have:" ;
    	echo $rows;
    	echo " Tasks!!" ;
     ?>
    <br><br>
    <?php
    	$query=mysqli_query($con, "SELECT * FROM task WHERE projectID=$tid AND status='Completed'");
    	$statement=mysqli_num_rows($query);
    ?>
    <div class="completed-tasks">

    <?php
    echo"<br><br>";
    	echo "There is:" ;
    	echo $statement;
    	echo " Completed tasks!!" ;
     ?>
    </div>

    <?php
    $query=mysqli_query($con, "SELECT * FROM task WHERE projectID=$tid AND status='Pending'");
    $st=mysqli_num_rows($query);
    ?>
    <div class="uncompleted-tasks">
    <?php
    echo"<br><br>";
    echo "There is:" ;
    echo $st;
    echo " Pending tasks!!" ;
     ?>
    </div>
    			    <br /><br /><br />

              <table class="table" style="margin-bottom:0px !important;">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Task</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php

              // Check for all the task in the database and if there is task, get them
                  if( mysqli_num_rows( $query = mysqli_query($con, "select * from task where projectID=$tid")) )
                  {
                      $count = 1;
                // Fetch all the tasks brought from the database and display them below
                      while($row = mysqli_fetch_array($query) )
                      {
                          ?>
                          <tr>
                              <td><?php echo $count++?></td>
                              <td><?php echo $row['tasks']?></td>
                              <td><?php echo $row['status']?></td>
                              <td colspan="2">
                                  <?php
                                  if(isset($row['status']) && $row['status'] != "Completed"){
                                      echo '<a href="update_task.php?task_id='.$row['task_id'].'" <i class="fa fa-check" title="Complete Task"></i></a>&nbsp;&nbsp;';
                                  }
                                  ?>
                                   <a class="icon" href="delete_task.php?task_id=<?php echo $row['task_id']?>"><i class="fa fa-trash" title="Delete Task"></i></a>
                              </td>
                          </tr>
                          <?php
                      }
                  }
                  else
                  {
                      echo 'No tasks yet!';
                  }
                  ?>
                  </tbody>
              </table>
              </div>
              </center>

<?php include 'arrow_to_top.inc.php'; ?>
<?php include 'footer.php';?>
    </body>
</html>
