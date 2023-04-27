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



$errors = array('class' => '', 'from' => '', 'to' => '', 'type' => '', 'ddate' =>'', 'rdate' => '');   //to initialize array for errors to be put in
$from = $email = $destination = '';  //declaring them by default as empty strings
$conn = mysqli_connect('localhost', 'ali', 'alif2004', 'gamasa_airlines') or die($conn);

if(isset($_POST['submit']))  //if submit was pushed
{ 
    //still awaiting class to be added
    if (empty($_POST['class']))  
    {
        $errors['class'] = "Please choose the class you're flying by! <br> <br>"; 
    }
    
    else
    {
        $class = $_POST['class'];
    }

    if (empty($_POST['to']))
    {
        $errors['to'] = "Please enter the destination country <br> <br>";
    }
    
    else
    {
        $toCountry=trim($_POST['to']);                    
        $toQuery="SELECT * FROM airport WHERE country = '$toCountry'";     
        $toResult=mysqli_query($conn, $toQuery);                                
        
        if(mysqli_num_rows($toResult) == 0 )
        {
            $errors['to'] = "'".$_POST['to']."' is not a country".'<br> <br>';
        }
        if($_POST['from'] == $_POST['to'])
        {
            $errors['to'] = "departing country should not be the same as the destination country  <br> <br>";
        }

        

    }

    if (empty($_POST['from']))
    {
        $errors['from'] = "Please enter the departing country <br> <br>";
    }

    else
    {
        $fromCountry=trim($_POST['from']);
        $fromQuery="SELECT * FROM airport WHERE country = '$fromCountry'"; 
        $fromResult=mysqli_query($conn, $fromQuery);

        if(mysqli_num_rows($fromResult) == 0 )
        {
            $errors['from'] = "'".$_POST['from']."' is not an country".'<br> <br>';
        }
        if($_POST['from'] == $_POST['to'])
        $errors['from'] = "departing country should not be the same as destination country <br> <br>";
    }

    if (empty($_POST['type']))  
    {
        $errors['type'] = "Please choose the trip type you're flying by! <br>"; 
    }

	if (empty($_POST['ddate']))  
    {
        $errors['ddate'] = "Please choose the departing date! <br>"; 
    }

	if(!empty($_POST['type']))
    {
        if($_POST['type'] =='Round')
	    {
		if(empty($_POST['rdate']))
		{
			$errors['rdate'] = "Please choose the return date! <br>"; 
		}
		else if ($_POST['ddate'] >= $_POST['rdate'])
		{
			$errors['ddate'] = "depart date should not be the same as or later than retrun date <br>"; 
			$errors['rdate'] = "return date should not be the same as or earlier than the depart date <br>"; 
		}
	    }
    }
    if (!array_filter($errors))
    {
        $from_to_type = ['from' => $_POST['from'], 'to' => $_POST['to'],
		'type' => $_POST['type'], 'class' => $_POST['class'], 'ddate' => $_POST['ddate'], 'rdate' => $_POST['rdate']];
        $from_to_encode = json_encode($from_to_type);
        setcookie("from-to", $from_to_encode, time()+3600); // Cookie expires in 1 hour

        header("Location: homepageResults.php");
        exit();
    } 

}

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>                      <!--edit by omar atya-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/imagemapster/1.5.4/jquery.imagemapster.min.js"></script>
	<script defer type="text/javascript"  src="scripts/worldmap.js"></script>
	<script defer type="text/javascript" src="scripts/homepage.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">
	<script src="autocompletecallhomepage.js"></script>
	<script src="returndateslide.js"></script> <!--edit-->

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
    	<area target="" href="" onclick="country(title)" alt="Egypt" title="Egypt" coords="2005,1222,1905,1225,1901,1106,1923,1106,1948,1097,1967,1100,1970,1134,1951,1122,1964,1136,1977,1162" shape="poly">
    	<area target="" href="" onclick="country(title)" alt="Saudi Arabia" id="" title="Saudi Arabia" coords="2048,1255,2089,1252,2114,1233,2146,1227,2167,1205,2155,1189,2136,1189,2114,1167,2108,1142,2092,1123,2067,1133,2014,1101,1995,1111,1986,1130,1989,1151,2017,1198,2017,1217,2033,1223,2039,1239" shape="poly">
    	<area target="" href="" onclick="country(title)" alt="Spain " title="Spain " coords="1607,1042,1607,1017,1610,989,1582,976,1595,957,1645,967,1667,976,1692,976,1670,995,1660,1011,1664,1029,1651,1039,1623,1045" shape="poly">
    	<area target="" href="" onclick="country(title)" alt="Portugal" title="Portugal" coords="1582,979,1604,989,1604,1039,1582,1045,1576,1017,1573,995" shape="poly">
    	<area target="" href="" onclick="country(title)" alt="Peru" title="Peru" coords="1044,1618,1044,1646,1038,1674,1022,1702,978,1668,956,1608,941,1561,959,1546,994,1508,1019,1521,1041,1524,1041,1546,1009,1558,1006,1583,1016,1602" shape="poly">
    	<area target="" href="" onclick="country(title)" alt="India" title="India" coords="2371,1352,2349,1317,2315,1230,2315,1205,2302,1214,2283,1192,2308,1176,2296,1151,2308,1136,2336,1101,2327,1079,2330,1061,2352,1054,2365,1070,2377,1089,2371,1108,2383,1123,2415,1151,2437,1154,2462,1170,2468,1195,2446,1201,2424,1223,2408,1245,2390,1264,2387,1295,2383,1317,2396,1355,2418,1367,2399,1374" shape="poly">
		<area target=""  onclick="country(title)" alt="USA" title="United States" href="" a coords="811,1215,789,1196,773,1177,761,1196,742,1168,720,1149,698,1162,676,1146,645,1149,617,1130,592,1068,589,1021,592,980,592,962,614,952,867,965,995,1005,1054,1009,1057,1027,1029,1040,1020,1055,1007,1074,1001,1093,995,1118,970,1130,957,1146,957,1165,964,1187,967,1209,961,1230,939,1187,929,1171,904,1165,886,1180,864,1180,842,1177,820,1193"  shape="poly">
		<area target="" onclick="country(title)" href="" alt="Netherlands" title="Netherlands" coords="1714,873,1698,870,1682,870,1698,851,1704,842,1726,845" shape="poly">
    	<area target="" onclick="country(title)" href="" alt="Australia" title="Australia" coords="2681,1705,2681,1727,2687,1749,2678,1758,2706,1833,2696,1846,2721,1858,2746,1846,2784,1843,2797,1824,2828,1824,2850,1821,2875,1830,2890,1846,2897,1846,2909,1855,2925,1868,2937,1890,2962,1896,2978,1899,2991,1949,3009,1949,3016,1921,3025,1887,3028,1852,3038,1824,3047,1780,3041,1730,3000,1683,2969,1658,2959,1617,2934,1570,2919,1642,2875,1617,2881,1596,2887,1589,2853,1586,2831,1586,2815,1602,2812,1621,2790,1608,2771,1633,2756,1646,2750,1671,2734,1674,2712,1687,2690,1696" shape="poly">
    	<area target="" onclick="country(title)" href="" alt="New Zealand" title="New Zealand" coords="3269,1796,3307,1821,3329,1830,3316,1846,3316,1871,3304,1902,3288,1921,3275,1949,3253,1959,3241,1940,3257,1924,3282,1890,3285,1852,3291,1834" shape="poly">
    	<area target="" onclick="country(title)" href="" alt="Turkey" title="Turkey" coords="2055,1033,2027,1033,2011,1039,1983,1042,1961,1042,1942,1036,1926,1045,1911,1036,1901,1020,1895,998,1917,983,1936,989,1951,979,1977,976,1998,986,2027,986,2052,992,2070,1008" shape="poly">
    	<area target="" onclick="country(title)" href="" alt="United Arab Emirates" title="United Arab Emirates" coords="2164,1195,2146,1189,2108,1167,2142,1173,2158,1164,2177,1180" shape="poly">
	</map>
	</div>
	<form name="form" id="form" action="" class="form" method ="POST">
			<fieldset class="form-outline">

			<label for="labels">From</label>
			<div class="input-box" >
				<input type="text" id="from" name = 'from'>
                <div> <?php echo $errors['from']; ?> </div> <!--edit by omar atya-->
			</div>

			<label for="labels">To</label>
			<div class="input-box">
				<input type="text" id="to" name = 'to'>
                <div> <?php echo $errors['to']; ?> </div> <!--edit by omar atya-->
			</div>
			
            <br><div class = "labels">Your Class</div>
            <label class = 'items'>
            <input type="radio" name="class" value="Economy">
            Economy
            </label><br>
            <label class = 'items'>
            <input type="radio" name="class" value="Business">
            Business
            </label><br>
            <label class = 'items'>
            <input type="radio" name="class" value="First">
            First
            </label><br>
            <div> <?php echo $errors['class']; ?> </div><br>


			<div class = "labels">Trip type</div>
			<label class = 'items'>
			<input type="radio" id='O' name="type" value="One-way">
			One way
			</label><br>
			<label class = 'items'>
			<input type="radio" id='R' name="type" value="Round">
			Round
			</label><br>
			<div> <?php echo $errors['type']; ?> </div><br>


			<label>Depart Date</label>
			<div id='o'>
			<div class="input-box">
				<input type="date" name="ddate" min = "<?php echo date('Y-m-d'); ?>">
				<div> <?php echo $errors['ddate']; ?> </div>
			</div></div><br>

			<div id='r'>
			<label>Return Date</label>
			<div class="input-box">
				<input type="date" name="rdate" min = "<?php echo date('Y-m-d'); ?>">
				<div> <?php echo $errors['rdate']; ?> </div>
			</div></div><br>
			

			<!--
			<button id="se" type="submit"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" id="sea">
			<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
			<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
			</svg></button>
			-->
			<button id="se" type="submit" class="btn-search" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			</fieldset>
	</form>
	<div class="container">
		<div class="recommended section">
			<h1 class="recommended title">Recommended Places To Visit This Month</h1>
			<div class="slideshow-container">
	<div class="mySlides fade">
		<a href="" class="slide-link">
			<div class="numbertext">1 / 3</div>
			<img src="images/recommended locations/peru-machu-picchu.jpg" alt="The Citadel of Machu Picchu"/>
			<h3 class="slideshow title">Machu Picchu, Peru</h3>
		</a>
		<!--<p class="slideshow-text">The citadel of Machu Picchu is an iconic symbol of pre-Columbian Peru located in the Eastern Cordillera of southern Peru on a mountain ridge.
		It is the most familiar icon of the Inca Empire, often referred to as the "Lost City of the Incas".
		In 2007, Machu Picchu was voted one of the New Seven Wonders of the World in a worldwide internet poll. 
		</p>-->
	</div>
	<div class="mySlides fade">
		<a href="" class="slide-link">
			<div class="numbertext">2 / 3</div>
			<img src="images/recommended locations/spain-costa-del-sol.jpg" alt="Costa del Sol Beach"/>
			<h3 class="slideshow title">Costa del Sol Beaches, Spain</h3>
		</a>
		<!--<p class="slideshow-text">The Costa del Sol, meaning "Coast of the Sun" is a region in the south of Spain,
		located on the coast of the Mediterranean Sea. It is known for its beautiful sandy beaches with warm clear waters of which there are dozens to choose from,
		so you're bound to find one that suits your preferences. Whether you're looking for a quiet secluded spot or a lively beach with water sports, you'll find plenty of options.
		</p>-->
	</div>
	<div class="mySlides fade">
		<a href="" class="slide-link">
			<div class="numbertext">3 / 3</div>
			<img src="images/recommended locations/portugal-nazare-estremadura.jpg" alt="Nazare Estremadura"/>
			<h3 class="slideshow title">Nazar&#233; Estremadura, Portugal</h3>
		</a>
		<!--<p class="slideshow-text">Nazar&#233; is a town on the Atlantic coast of Portugal, located in Estremadura.
		It is known for its beatiful beaches, world-class surfing, and traditional fishing heritage.
		The main beach in Nazar&#233; is Praia da Nazar&#233;, which is home to the famous Nazar&#233; Canyon that creates some of the biggest waves in the world.
		In addition to its beaches, Nazar&#233; also has a historic center with charming narrow streets, traditional houses and an iconic lighthouse that offers stunning views of the coastline. 
		</p>-->
	</div>
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<div style="text-align:center">
	<span class="dot" onclick="currentSlide(1)"></span>
	<span class="dot" onclick="currentSlide(2)"></span>
	<span class="dot" onclick="currentSlide(3)"></span>
</div>
<br>
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
	</script>
</body>
</html>
