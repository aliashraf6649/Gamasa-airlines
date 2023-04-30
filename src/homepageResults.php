<?php
session_start();
require_once "config.php";
$cookieValue = $_COOKIE["from-to"];
$from_to_data = json_decode($cookieValue, true);
if(isset($_SESSION['user']))
    $user = $_SESSION['user'];

$from_country = $from_to_data['from'];
$destination_country =$from_to_data['to'];
$type = $from_to_data['type']; //One-way or Round
$class = $from_to_data['class'];

$Tdata = "SELECT * FROM trips WHERE `departing_country` = '$from_country' AND `destination_country` = '$destination_country' ";  //getting the going trip data
$Rdata = "SELECT * FROM trips WHERE `destination_country` = '$from_country' AND `departing_country` = '$destination_country' ";
$result = mysqli_query($database, $Tdata);   
$rresult = mysqli_query($database, $Rdata);  

$trips = mysqli_fetch_all($result,MYSQLI_ASSOC);   //the result of going trips in array 
$Rtrips = mysqli_fetch_all($rresult,MYSQLI_ASSOC); //the result of returning trips in array 

if(isset($_POST['submit']))  //if submit was pushed
{ 
    foreach ($trips as $trip)
    {
        $from_to_type = ['from' =>$trip['from_airport'] , 'to' => $trip['to_airport'],
        'type' => $type, 'class' => $class];
        $from_to_encode = json_encode($from_to_type);
        setcookie("from-to", $from_to_encode,0,"/"); // Cookie expires as soon session ends IE; user logs out
        header("Location: trip-search.php");
    }
}

?>

<HTML>
<head>
    <title> Results </title>
    <link rel ='stylesheet' href='../styles/homepageresults.css'>
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
			<li><a href="feedback.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contact us</a></li>
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
<div class = 'container'>
    <ul>
        
        <h2 class ='title'>Going trips</h2>
        <?php 
            if (empty($trips))
                echo "Sorry there are no available trips!";
            foreach ($trips as $trip)
            {
                echo "<li><h4>From -> $trip[departing_country] (Airport:  $trip[from_airport])</h4></li>
                <li><h4>To -> $trip[destination_country] (Airport:  $trip[to_airport])</h4></li>
                <li><h4>Date: $trip[date] </h4></li>
                <li><h4>Time: $trip[time] </h4></li>
                <li><h4>Price: $trip[price]$</h4></li>";
            }
        ?>
        
    </ul>
</div>
<?php
    if ($type =='Round'){
?>
<div class = 'container'>
    <ul>
    
        
        <h2 class ='title'>Retuning trips</h2>
        <?php 
        if (empty($Rtrips))
            echo "Sorry there are no available trips!";
        foreach ($Rtrips as $Rtrip)
        {
            echo 
            "<li><h4>From -> $Rtrip[departing_country] (Airport:  $Rtrip[from_airport])</h4></li>
            <li><h4>To -> $Rtrip[destination_country]  (Airport:  $Rtrip[to_airport] )</h4></li>
            <li><h4>Date: $Rtrip[date]</h4></li>
            <li><h4>Time: $Rtrip[time]</h4></li>
            <li><h4>Price: $Rtrip[price]$</h4></li>";
        }    
        ?>
    </ul>
</div>
<?php
}
?>

<?php
    if(isset($_SESSION['user']))
    {//if there's an array called user set in global session array
        echo '<form name="form" action="" method ="POST">
        <button type="submit" name="submit">book now</button></form>';
    }
    else
        echo '<button onclick="backToSign()">Book now</button>';
?>

<?php //include "footer.php"; ?>


<script>
    function backToSign()
    {
        alert("User should be signed in!");
        window.location.href = "login.php";

    }
</script>


