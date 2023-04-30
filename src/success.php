
<?php
session_start();
require_once "config.php";
$cookieValue = $_COOKIE["ticket"];      //the cookie from the last page "trip-search.php" which includes the from and to countries
$ticket_data = json_decode($cookieValue, true); //decoding the script to return as array
$user = $_SESSION['user'];


$username = $ticket_data['username']; 
$userid = $ticket_data['userID']; 
$fromValue = $ticket_data['from'];   //assigning the from value
$toValue = $ticket_data['to'];   //assigning the to value
$type = $ticket_data['type'];  //assigning the type of booking 'one-way' or 'round'
$departID = $ticket_data['departID']; //assigning id of the depart trip
$departDate = $ticket_data['departDate']; //assigning the depart date of the first trip
$returnID = $ticket_data['returnID']; //assigning the id of the return trip
$returnDate = $ticket_data['returnDate']; //assigning the return date of the second trip
$class = $ticket_data['class']; // assigning the class prefered for the trip
?>


<HTML>
<head>
<title> Flight booked successfully </title>
<link rel='stylesheet' href ='../styles/success.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<li><a href="homepage.php#about"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a></li>
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
<h1>easter egg to lower the words :)</h1>
<h1>Flight booked successfully</h1>
<div class = 'container'>
    <ul>
        <h3>User data</h3>
        <?php
        echo "<li>user name: $username </li>
            <li>user ID: $userid</li>";
        ?>
    </ul>
</div>
<div class = 'container'>
    <ul>
        <h3>Departing trip ticket data</h3>
        <?php
        echo "<li>From: $fromValue </li>
            <li>To: $toValue</li>
            <li>Date: $departDate</li>
            <li>ID: $departID</li>
            <li>Class: $class</li>";
        ?>
    </ul>
</div>
<?php
    if($type == 'Round')
    {
        echo "<div class = 'container'>
            <ul>
                <h3>Returning trip ticket data</h3>
                <li>From: $toValue </li>
                    <li>To: $fromValue</li>
                    <li>Date: $returnDate</li>
                    <li>ID: $returnID</li>
                    <li>Class: $class</li>
            </ul>
        </div>";
    }
?>
</body>
</HTML>
