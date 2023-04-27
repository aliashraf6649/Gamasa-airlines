<!DOCTYPE html>
<?php
require_once "config.php";
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($database, trim($_POST['fullname']));
	$email=mysqli_real_escape_string($database, trim($_POST['email']));
	$comment=mysqli_real_escape_string($database, trim($_POST['comment']));
	$date=date('Y-m-d h:i:s');
	$query="INSERT INTO `comments`(`fullname`, `email`, `comment`, `date-added`) VALUES ('$name','$email','$comment','$date')";
	mysqli_query($database, $query);
	$affirmation="*Comment Successfully Submitted! Thanks For Writing!";
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script defer src="scripts/feedback.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/feedback.css">
	<title>Contact us</title>
</head>
<body>
	<div class=container>
		<a href="homepage.php" class="click-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
		<h1 class=title>Contact us</h1>
		<div class=text>
			<form name="form" id="form" class="form" action="" method="post">
			<div class="input-boxes">
				<div class="input-box">
					<input type="text" name="fullname" class="form-control" placeholder="Full name">
				</div>
				<span class="error" id="fullname">*Please Enter Your Full Name</span>
				<div class="input-box">
					<input type="email" name="email" class="form-control" placeholder="Email Address">
				</div>
				<span class="error" id="email">*Please Enter A Valid Email Address</span>
				<div class="input-box">
					<textarea name="comment" class="input-box comment form-control" placeholder="Please Write A Comment"></textarea>
				</div>
				<span class="error" id="comment">*Please Write Any Comments/Complaints/Feedback</span>
				<button type="submit" name="submit" class="btn-form-submit"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
				<?php 
				if(isset($affirmation))
					echo '<span class="affirm">'.$affirmation.'</span>';
				?>
			</div>
			</form>
		</div>
	</div>
	
</body>
</html>