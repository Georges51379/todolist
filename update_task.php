<?php
// Database Connection File
require_once 'db/connection.php';

// Checking that the request method is only a POST request
if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("GET"))
{

	if(isset($_GET['taskToken']) && !empty($_GET['taskToken'])) // Be sure the task ID brought here is not an empty field
	{
		// Variable declaration
		$taskToken = trim(strip_tags($_GET['taskToken']));

		mysqli_query($con, "UPDATE `task` SET `status` = '".mysqli_real_escape_string($con, 'Completed')."' WHERE `taskToken` = '".mysqli_real_escape_string($con, $taskToken)."' limit 1") or die(mysqli_errno());

		echo "<script>window.location='dashboard.php'</script>";  // Redirect back to index.php page
	}
	else
	{
		echo "<script>window.location='dashboard.php'</script>";  // Redirect back to index.php page
	}
}
else
{
	echo "<script>window.location='dashboard.php'</script>";
	// Deny access if the request brought to this page is a GET REQUEST
}
?>
