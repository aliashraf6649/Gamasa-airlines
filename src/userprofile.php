<!DOCTYPE html>
<?php
require_once "config.php";
session_start();
$user=$_SESSION['user'];
if(isset($_POST['tickets']))
{
	header('location: tickets.php');
	exit;
}
if(isset($_POST['logout']))
{
	session_destroy();
	header('location: welcome.php');
	exit;
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Profile</title>
	<link rel="stylesheet" href="../styles/userprofile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!--<div class="header">
		<div class="title">User Profile</div>
	</div>-->
	<div class="container">
		<a href="homepage.php" class="click-back"><i class="fa fa-arrow-left"></i> Go Back</a>
		<h1 class="container-title">User Profile</h1>
		<div class="firstline">
			<div class="name">
				<fieldset class="field">
					<legend class="field-title">Name</legend>
						<?php echo '<div class="field-content">'.$user['fname'].' '.$user['mname'].' '.$user['lname'].'</div>';?>
				</fieldset>
			</div>
			<div class="id">
				<fieldset class="field">
					<legend class="field-title">ID</legend>
						<?php echo '<div class="field-content id-content">'.$user['id'].'</div>';?>
				</fieldset>
			</div>
		</div>
		<div class="secondline">
			<div class="birthdate">
				<fieldset class="field">
					<legend class="field-title">Birth Date</legend>
						<?php echo '<div class="field-content">'.$user['bdate'].'</div>';?>
				</fieldset>
			</div>
			<div class="gender">
				<fieldset class="field">
					<legend class="field-title">Gender</legend>
						<?php echo '<div class="field-content">'.$user['gender'].'</div>';?>
				</fieldset>
			</div>
		</div>
		<div class="email">
			<fieldset class="field">
				<legend class="field-title">Email Address</legend>
					<?php echo '<div class="field-content">'.$user['email'].'</div>';?>
			</fieldset>
		</div>
		<form action="" method="post">
		<button name="tickets" class="btn-tickets"><i class="fa fa-book" aria-hidden="true"></i> View Booked Tickets</button>
		<button name="logout" class="btn-logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</button>
		</form>
	</div>
</body>
</html>