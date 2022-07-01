<?php
session_start();
include("db/connection.php");
$_SESSION['td_email']=="";
$_SESSION['userToken']== "";
session_unset();
session_destroy();
header('location: index.php');
?>
