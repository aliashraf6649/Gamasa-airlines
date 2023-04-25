<?php
include "config.php";
session_start();
if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
	$userid=$user['id'];
	echo "Full Name:".$user['fname'].' '.$user['mname'].' '.$user['lname'].'<br>';
	echo "Profile ID: ".$user['id'].'<br>';
	echo "Email Address: ".$user['email'].'<br>';
	echo "Birth Date: ".$user['bdate'].'<br>';
	echo "Gender: ".$user['gender'].'<br>';
	$result=mysqli_query($database, "SELECT * FROM `bookings` WHERE `user-id`=$userid");
	if(mysqli_num_rows($result)>0)
	{
		echo "Current Bookings: ".'<br>';
		$bookings=mysqli_fetch_all($result, MYSQLI_ASSOC);
		foreach($bookings as $booking)
		{
			echo '<div class="ticket">';
			echo "From: ".$booking['from_'].'<br>';
			echo "To: ".$booking['to_'].'<br>';
			echo "Date: ".$booking['date-time'].'<br>';
			echo '</div>';
		}
	}
	else
		echo "No Bookings Yet";
}
else
{
	header('location: login.php');
	exit;
}
?>