<?php
session_start();
if(isset($_SESSION['user']))
	$user=$_SESSION['user'];
if(isset($_POST['logout']))
{
	session_destroy();
	header('location: homepage.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
	<link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
	
	<!--<script defer src="scripts/homepage.js"></script>-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/homepage.css">

	<!--<link rel="stylesheet" href="css/bootstrap.css">-->
	<title>Gamasa Airlines</title>
</head>
<body>
	<div class="navigation-bar">
		<nav>
		<ul>
			<li><h1 style="margin: 0;"><a href="homepage.php">Gamasa Airlines</a></h1><h5 style="margin: 0; text-align: end;">Flying is Easier With Us</h5></li>
			<?php 
			if(isset($user))
				echo '<span class="welcome-message">Welcome, '.$user['fname'].'!</span>';
			?>
			<span class="tabs">
				<li><a href="tickets.php"><i class="fa fa-book" aria-hidden="true"></i> Booked Tickets</a></li>
				<li><a href="feedback.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact us</a></li>
				<li><a href="#about"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a></li>
				<?php 
				if(isset($user))
				{
					echo '<li><a href="userprofile.php"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a></li>';
					echo '<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>';
				}
				else
					echo '<li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>';
				?>
			</span>
		</ul>
		</nav>
	</div>
	<div class="back-image"></div>
	<div class="worldmap"><img src="images/homepage-worldmap.png"/></div>
	<form action="" class="form">
			<fieldset class="form-outline">
			<label for="">From</label>
			<div class="input-box">
				<input type="text">
			</div>
			<label for="">To</label>
			<div class="input-box">
				<input type="text">
			</div>
			<label>Date</label>
			<div class="input-box">
				<input type="datetime-local">
			</div>
			<!--
			<button id="se" type="submit"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" id="sea">
			<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
			<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
			</svg></button>
			-->
			<button id="se" type="submit" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
			</fieldset>
	</form>
	<div class="container">
		<div class="recommended section">
			<h1 class="recommended title">Recommended Places To Visit Next Month</h1>
			<div class="swiffy-slider">
				<ul class="slider-container">
					<li>
						<img src="images/recommended locations/peru-machu-picchu.jpg"/><br/>
						<h2>Machu Picchu, Peru</h2><br/>
						<p></p>
					</li>
					<li>
						<img src="images/recommended locations/spain-costa-del-sol.jpg"/><br/>
						<h2>Costa Del Sol Beaches, Spain</h2><br/>
						<p></p>
					</li>
					<li>
						<img src="images/recommended locations/portugal-nazare-estremadura.jpg"/><br/>
						<h2>Nazar&#233; Estremadura, Portugal</h2><br/>
						<p></p>
					</li>
				</ul>
				<button type="button" class="slider-nav"></button>
				<button type="button" class="slider-nav slider-nav-next"></button>
				<div class="slider-indicators">
					<button class="active"></button>
					<button></button>
					<button></button>
				</div>
			</div>
		</div>
		<div class="about section">
			<h1 id="about" class="about title">About</h1>
			<p class="about content">
				In this website we are trying to simulate an airline booking system in a simple way.<br>
			Our goal is making this website accessable and friendly with any user,<br>
			it will be a big step in progressing the technology and making it easier for everyone.<br>
			</p>
		</div>
	</div>
	<div class="back-to-top">
		<a href="#" class="back-to-top-link"><i class="fa fa-angle-double-up" aria-hidden="true"></i> Back to Top</a>
		<!--<button id="btn-back-to-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i> Back to Top</button>-->
	</div>
</body>
</html>