<?php
session_start();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	include 'dbconfig.php';
?>
<?php
 $rm_id = $_SESSION['rm_id'];
?>
