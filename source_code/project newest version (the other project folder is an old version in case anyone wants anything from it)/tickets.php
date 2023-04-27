<!DOCTYPE html>
<?php
include "config.php";
session_start();
if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
	$userid=$user['id'];
	$result=mysqli_query($database, "SELECT * FROM `bookings` WHERE `user-id`=$userid");
	// if(mysqli_num_rows($result)>0)
	// {
	// 	echo "Current Bookings: ".'<br>';
	// 	$bookings=mysqli_fetch_all($result, MYSQLI_ASSOC);
	// 	foreach($bookings as $booking)
	// 	{
	// 		echo '<div class="ticket">';
	// 		echo "From: ".$booking['from_'].'<br>';
	// 		echo "To: ".$booking['to_'].'<br>';
	// 		echo "Date: ".$booking['date'].'<br>';
	// 		echo '</div>';
	// 	}
	// }
	// else
	// 	echo "No Bookings Yet";
}
else
{
	header('location: login.php');
	exit;
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booked tickets</title>
	<link rel="stylesheet" href="styles/tickets.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class = "container">
	<a href="homepage.php" class="click-back"><i class="fa fa-arrow-left"></i> Go Back</a>
	<h1 class="container-title">Booked tickets</h1>
		<div class="firstline">
			<div class="name">
				<fieldset class="field">
					<legend class="field-title">Name</legend>
						<?php echo '<div class="field-content">'.$user['fname'].' '.$user['mname'].' '.$user['lname'].'</div>';?>
				</fieldset>
			</div>
			<div class="id">
				<fieldset class="field">
					<legend class="field-title">ID</legend>
						<?php echo '<div class="field-content id-content">'.$user['id'].'</div>';?>
				</fieldset>
			</div>
		</div>
	
		<div class = "tickets">
		<?php 
		if(mysqli_num_rows($result)>0)
		{
			echo '<h2 class = "container-title" style="margin-bottom:2%">Current bookings</h2>';
			$bookings=mysqli_fetch_all($result, MYSQLI_ASSOC);
			foreach($bookings as $booking)
			{
				echo '<div class="ticket">'.
					'<div class="from">'.
						'<div class="ticket-title">'.
							'From'.
						'</div>'.$booking['from_'].
					'</div>'.
					'<div class="to">'.
						'<div class="ticket-title">'.
							'To'.
						'</div>'.$booking['to_'].
					'</div>'.
					'<div class="date">'.
						'<div class="ticket-title">'.
							'Date'.
						'</div>'.$booking['date'].
					'</div>'.
				'</div>';
			}
		}
		else
			echo '<h2 class = "container-title">No Bookings Yet</h2>';
		?>
		</div>
	</div>
</body>
</html>