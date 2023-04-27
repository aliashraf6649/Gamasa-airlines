<!DOCTYPE html>
<?php
require_once "config.php";
session_start();
if(isset($_SESSION["user"]))
{
	echo "Welcome, ".$_SESSION["user"]["fname"].'<br>';
}
else
{
	echo "You're not logged in!".'<br>';
}
?>
<html>
<head>
	<title>Gamasa Airlines</title>
</head>
<body>
	<a href="register.php">Sign up</a><br>
	<a href="login.php">Sign in</a><br>
	<a href="userprofile.php">User Profile</a><br>
	<a href="feedback.php">Contact us</a><br>
</body>
</html>