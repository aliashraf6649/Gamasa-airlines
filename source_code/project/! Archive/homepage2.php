<!DOCTYPE html>
<?php
$cool=array('Cairo'=>'airport');
$javacool=json_encode($cool);
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/imagemapster/1.5.4/jquery.imagemapster.min.js"></script>
	<script defer type="text/javascript"  src="scripts/worldmap.js"></script>
	<script defer type="text/javascript" src="scripts/homepage.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">

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
	<div class="worldmap">
	<img src="images/homepage-worldmap.png" id="worldmap" usemap="#imagemap"/>
	<map name="imagemap">
		<area shape="poly" coords="1904, 1102, 1904, 1220, 2004, 1220, 1987, 1194, 1987, 1185, 1970, 1146, 1955, 1119, 1972, 1141, 1977, 1125, 1970 , 1100, 1943, ,1100, 1925, 1100" href="" alt="Cairo Airport" onclick="country('Cairo International Airport')">
	</map>
	</div>
	<form action="" class="form">
			<fieldset class="form-outline">
			<label for="">From</label>
			<div class="input-box">
				<input type="text" id="input-from">
			</div>
			<label for="">To</label>
			<div class="input-box">
				<input type="text" id="input-to">
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
			<h1 class="recommended title">Recommended Places To Visit This Month</h1>
			<div class="slideshow-container">
				<div class="mySlides fade">
					<div class="numbertext">1 / 3</div>
					<img src="images/recommended locations/peru-machu-picchu.jpg" alt="The Citadel of Machu Picchu"/>
					<h3 class="slideshow title">Machu Picchu, Peru</h3>
					<p class="slideshow-text">The citadel of Machu Picchu is an iconic symbol of pre-Columbian Peru located in the Eastern Cordillera of southern Peru on a mountain ridge.
					It is the most familiar icon of the Inca Empire, often referred to as the "Lost City of the Incas".
					In 2007, Machu Picchu was voted one of the New Seven Wonders of the World in a worldwide internet poll. 
					</p>
				</div>
				<div class="mySlides fade">
					<div class="numbertext">2 / 3</div>
					<img src="images/recommended locations/spain-costa-del-sol.jpg" alt="Costa del Sol Beach"/>
					<h3 class="slideshow title">Costa del Sol Beaches, Spain</h3>
					<p class="slideshow-text">The Costa del Sol, meaning "Coast of the Sun" is a region in the south of Spain,
					located on the coast of the Mediterranean Sea. It is known for its beautiful sandy beaches with warm clear waters of which there are dozens to choose from,
					so you're bound to find one that suits your preferences. Whether you're looking for a quiet secluded spot or a lively beach with water sports, you'll find plenty of options.
					</p>
				</div>
				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
					<img src="images/recommended locations/portugal-nazare-estremadura.jpg" alt="Nazare Estremadura"/>
					<h3 class="slideshow title">Nazar&#233; Estremadura, Portugal</h3>
					<p class="slideshow-text">Nazar&#233; is a town on the Atlantic coast of Portugal, located in Estremadura.
					It is known for its beatiful beaches, world-class surfing, and traditional fishing heritage.
					The main beach in Nazar&#233; is Praia da Nazar&#233;, which is home to the famous Nazar&#233; Canyon that creates some of the biggest waves in the world.
					In addition to its beaches, Nazar&#233; also has a historic center with charming narrow streets, traditional houses and an iconic lighthouse that offers stunning views of the coastline. 

					</p>
				</div>
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
			</div>
			<br/>
		</div>
	</div>
	<div class="container">
		<div class="about section">
			<h1 id="about" class="about title">About</h1>
			<p class="about content">
				In this website we are trying to simulate an airline booking system in a simple way.<br>
			Our goal is making this website accessable and friendly with any user,<br>
			it will be a big step in progressing the technology and making it easier for everyone.<br>
			</p>
		</div>
	</div>
	</div class="back-to-top">
		<a href="#top" class="back-to-top-link"><i class="fa fa-angle-double-up" aria-hidden="true"></i> Back to Top</a>
		<!--<button id="btn-back-to-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i> Back to Top</button>-->
	</div>
	<script>
		var javacool=JSON.parse('<?php echo $javacool;?>');
		console.log(javacool);
		from=document.getElementById('input-from');
		to=document.getElementById('input-to');
		function country(selected)
		{
			if(!from.value)
				from.value=selected;
			else if(from.value && !to.value)
				to.value=selected;
		}
	</script>
</body>
</html>