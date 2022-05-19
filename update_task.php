<?php
// Database Connection File
require_once 'db/connection.php';

// Checking that the request method is only a POST request
if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("GET"))
{

	if(isset($_GET['task_id']) && !empty($_GET['task_id'])) // Be sure the task ID brought here is not an empty field
	{
		// Variable declaration
		$task_id = trim(strip_tags($_GET['task_id']));

		mysqli_query($con, "update `task` set `status` = '".mysqli_real_escape_string($con, 'Completed')."' where `task_id` = '".mysqli_real_escape_string($con, $task_id)."' limit 1") or die(mysqli_errno());

		echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
	}
	else
	{
		echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
	}
}
else
{
	echo "<script>window.location='index.php'</script>";
	// Deny access if the request brought to this page is a GET REQUEST
}
?>
