<?php
include "config.php";
session_start();
$userid=$_SESSION['userid'];
$user=$_SESSION['user'];

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
		echo "From: ".$booking['from_'].'<br>';
		echo "To: ".$booking['to_'].'<br>';
		echo "Date: ".$booking['date-time'].'<br>';
		echo '<br>';
	}
}
else
	echo "No Bookings Yet";
?>