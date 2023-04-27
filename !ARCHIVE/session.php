<?php 
session_start();
if(isset($_SESSION['user'])&&$_SESSION['user'])
{
	header('location:homepage.php');
	exit;
}
?>