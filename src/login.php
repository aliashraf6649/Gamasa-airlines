<!DOCTYPE html>
<?php
require_once "config.php";
require_once "session.php";
$error=false;
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['submit']))
{
	$email=mysqli_real_escape_string($database, trim($_POST['email']));
	$password=trim($_POST['pword']);
	$password_hash=md5($password);
	$query="SELECT * FROM `registered` WHERE email='$email'";
	$result=mysqli_query($database, $query);
	if(mysqli_num_rows($result)>0)
	{
		$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
		$user=$data[0];
		if($password_hash==$user['pass'])
		{
			$_SESSION['user']=$user;
			header("location: homepage.php");
			exit;
		}
		else
			$error=true;
	}
	else
		$error=true;
}
?>
<html lang="en">
<head>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script defer src="../scripts/login.js"></script>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<body>
<div class="slideshow">
	<div class="container">
		<div class="cover">
			<div class="back-btn"><a href="homepage.php" class="click-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a></div>
			<img src="../images/forms/login-cover.jpg" alt="A cinematic image of an airplane">
			<div class="headline">
				<h1 class="headline-1">Gamasa Airlines </h1>
				<h2 class="headline-2">Fly with us</h2>
			</div>
		</div>
		<div class="form">
			<h1 class="title">Login</h1>
				<span class="subtitle text">Please fill in your email and password.</span>
				<form name="form" id="form" class="input-boxes" action="" method="post">
					<div class="input-box">
						<input type="email" name="email" placeholder="Enter your Email Address" class="form-control">
					</div>
					<span class="error" id="email">*Please Enter A Valid Email Address</span>
					<div class="input-box">
						<input type="password" name="pword" placeholder="Enter your Password" class="form-control">
					</div>
					<span class="error" id="pword"
					<?php
					if($error)
						echo 'style="visibility: revert; color: red;"';
					?>>
					*invalid email or password
					</span>
					<button type="submit" name="submit" class="button input-box"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</button>
					<div class="text">Don't have an account? <a href="register.php">Register Now!</a></div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>