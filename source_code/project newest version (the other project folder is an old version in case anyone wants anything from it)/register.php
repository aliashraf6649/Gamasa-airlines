<!DOCTYPE html>
<?php
require_once "config.php";
require_once "session.php";
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
	$fname=mysqli_real_escape_string($database ,trim($_POST['fname']));
	$mname=mysqli_real_escape_string($database ,trim($_POST['mname']));
	$lname=mysqli_real_escape_string($database ,trim($_POST['lname']));
	$bdate=mysqli_real_escape_string($database ,trim($_POST['bdate']));
	$natId=mysqli_real_escape_string($database ,trim($_POST['ssn']));
	$gender=trim($_POST['gender']);
	$email=mysqli_real_escape_string($database, trim($_POST['email']));
	$password=trim($_POST['pword1']);
	$confirm_password=trim($_POST['pword2']);
	$password_hash=md5($password);
	$founderrors=0;
	if(strlen($natId)<14)
	{
		$founderrors++;
		$error_ssn="*National ID must have at least 14 digits".'<br>';
	}
	$query="SELECT * FROM registered WHERE email = '$email'";
	$result=mysqli_query($database, $query);
	if(mysqli_num_rows($result)>0)
	{
		$founderrors++;
		$error_email="*User already exists".'<br>';
	}
	if(strlen($password)<8)
	{
		$founderrors++;
		$error_pwordlength="*Password must have at least 8 characters".'<br>';
	}
	if($password!=$confirm_password)
	{
		$founderrors++;
		$error_pwordmismatch="*Passwords don't match".'<br>';
	}
	if(!$founderrors)
	{
		mysqli_query($database, "INSERT INTO `registered`(`fname`, `mname`, `lname`, `bdate`, `natId`,`gender`, `email`, `pass`)
		VALUES ('$fname','$mname','$lname','$bdate','$natId','$gender','$email','$password_hash')");
		header('location: login.php');
	}
}
?>
<html lang="en">
<head>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<script defer src="scripts/register.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/register.css">
	<meta charset="UTF-8">
	<title>Sign Up</title>
</head>
<body>
<div class="slideshow">
	<div class="container">
		<div class="form">
			<a href="homepage.php" class="click-back text"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
			<h1 class="title">Register</h1>
			<h3 class="subtitle text">Please fill in the following data:</h3>
			<form name="form" id="form" class="input-boxes" action="" method="post">
				<div class="input-box">
					<input type="text" name="fname" class="form-control" placeholder="First Name">
				</div>
				<span class="error" id="fname">
					*Please Enter Your First Name
				</span>
				<div class="input-box">
					<input type="text" name="mname" class="form-control" placeholder="Middle Name">
				</div>
				<span class="error" id="mname">
					*Please Enter Your Middle Name
				</span>
				<div class="input-box">
					<input type="text" name="lname" class="form-control" placeholder="Last Name">
				</div>
				<span class="error" id="lname">
					*Please Enter Your Last Name
				</span>
				<div class="input-box">
					<input type="text" name="bdate" class="form-control" placeholder="Birth Date">
				</div>
				<span class="error" id="bdate">
					*Please Enter Your Birth-Date
				</span>
				<div class="input-box">
					<input type="text" name="ssn" class="form-control" placeholder="National ID">
				</div>
				<span class="error" id="ssn"
				<?php
				if(isset($error_ssn))
					echo 'style="color: red; visibility: revert;"';
				?>>*National ID Must Have at Least 14 Digits</span>
				<div class="gender-details">
					<input type="radio" name="gender" id="male" value="Male">
					<label for="male" id="mlabel" class="radiobutton male">
						<i class="fa fa-mars" aria-hidden="true"></i>
						<span class="gender-text male">Male</span>
					</label>
					<input type="radio" name="gender" id="female" value="Female">
					<label for="female" id="flabel" class="radiobutton female">
						<i class="fa fa-venus" aria-hidden="true"></i>
						<span class="gender-text female">Female</span>
					</label> 
				</div>
				<span class="error" id="error-gender">
					*Please Choose Your Gender
				</span>
				<div class="input-box">
					<input type="email" name="email" class="form-control" placeholder="Email Address">
				</div>
				<span class="error" id="email"
				<?php
				if(isset($error_email))
					echo 'style="color:red; visibility:revert;"';
				?>>*User Already Exists</span>
				<div class="input-box">
					<input type="password" name="pword1" class="form-control" placeholder="Password">
				</div>
				<span class="error" id="pword1"
				<?php
				if(isset($error_pwordlength))
					echo 'style="color:red; visibility:revert;"';
				?>>*Password Must Have at Least 8 Characters</span>
				<div class="input-box">
					<input type="password" name="pword2" class="form-control" placeholder="Password Confirmation">
				</div>
				<span class="error" id="pword2"
				<?php
				if(isset($error_pwordmismatch))
					echo 'style="color:red; visibility:revert;"';
				?>>*Passwords Don't Match</span>
				<button type="submit" name="submit" class="button input-box"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>
				<div class="text sign-up-text">Already have an account? <a href="login.php">Click Here to login.</a></div>
			</form>
		</div>
		<div class="cover">
			<img src="images/register-cover.jpg" alt="A cinematic image of the front of a plane">
			<div class="headline">
				<h1 class="headline-1">Gamasa Airlines </h1>
				<h2 class="headline-2">Fly with us</h2>
			</div>
		</div>
	</div>
</div>
</body>
</html>