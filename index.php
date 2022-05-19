<?php
session_start();
// Database Connection File
require 'db/connection.php';
if(strlen($_SESSION['email'])==0){
	header('location:login-user.php');
}
else {
if(isset($_POST['add-project'])){
		$projectName= $_POST['projectName'];
		$projectDescription = $_POST['projectDescription'];
		$dueDate = $_POST['dueDate'];

		$query=mysqli_query($con, "insert into project (projectName, projectDescription, dueDate, status)
		values ('$projectName', '$projectDescription', '$dueDate', 1)");
}
}
$userQuery = mysqli_query($con,"SELECT * FROM usertable WHERE email = '".$_SESSION['email']."'");
$rws = mysqli_fetch_array($userQuery);
 ?>
<html>
	<head>
<!--TITLE SECTION-->
    <title><?php echo htmlentities($rws['name']); ?> | To Do List</title>
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
				<?php
				$query = mysqli_query($con, "select * from project where status=1");
				while($row= mysqli_fetch_array($query)){
				 ?>
					 <a class="header-link" href="tasks.php?taskid=<?php echo $row['id']; ?>"><?php echo htmlentities ($row['projectName']); ?>&emsp;
					 </a>
			 <?php
			 }
				  ?>
		 </header>
		 <div class="dark-div">
			 <button href="#" onclick="darkMode()" class="dark-mode-active"><i class="fa fa-user"></i></button>
		 </div>
	 <script>
		 function darkMode(){
			 var element = document.body;
			 element.classList.toggle("dark-mode-active");
	 }
	 </script>

<?php $query= mysqli_query($con,"select name from usertable where email='".$_SESSION['email']."'");
	$row=mysqli_fetch_array($query);
 ?>
<center>
	<div class="wlcm-div">
		<span class="wlcm-user">welcome,&nbsp;<?php echo $row['name'] ; ?></span><br>
		<a href="logout-user.php" class="logout">logout<i class="fa fa-sign-out"></i></a>
	</div>
	<marquee behavior="scroll" direction="right">
		this is the main page in which you can add different projects
	</marquee>
	<marquee behavior="scroll" direction="left">
		a reminder will notify you about the due date
	</marquee>
	<marquee class="special-marquee" direction="down" scrollamount="2" behavior="scroll" loop="-1">
		educational and helpful uses only allowed.
	</marquee>
<br><br><br>
<img class="notallowed-gif" src="img/not-allowed.gif">
<section>
	<div class="add_project">
		<form class="form" method="post">
			<input type="text" class="form_input" name="projectName" placeholder="enter the project name" required/><br><br>
			<input type="text" class="form_input" name="projectDescription" placeholder="enter the project description" required/><br><br>
			<input type="date" class="form_input" name="dueDate" placeholder="enter the due date of the project" required/><br><br>
			<button class="btn_add" name="add-project">Add project</button>
		</form>
	</div>
</section>
<br><br>
<?php $query= mysqli_query($con, "select * from banners where form='landscape'");
$row= mysqli_fetch_array($query); ?>

<div class="banner-landscape">
	<a href="<?php echo htmlentities($row['url']); ?>" target="_blank">
	<img class="img-ad-landscape" src="admin/banners/<?php echo htmlentities($row['image']); ?>"
	data-echo="admin/banners/<?php echo htmlentities($row['image']);?>">
</a>
	<br><br>
	<span class="comp-name">
		ad by <span class="compName"><?php echo htmlentities($row['companyName']);?></span>
	</span>
</div>
</center>

<?php include 'arrow_to_top.inc.php'; ?>
<?php include 'footer.php';?>

	</body>
</html>
