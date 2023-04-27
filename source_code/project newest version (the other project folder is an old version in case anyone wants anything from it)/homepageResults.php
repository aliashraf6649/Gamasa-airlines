<?php
$cookieValue = $_COOKIE["from-to"];
$from_to_data = json_decode($cookieValue, true);

$from_country = $from_to_data['from'];
$destination_country =$from_to_data['to'];
$depDate = $from_to_data['ddate'];
$type = $from_to_data['type']; //One-way or Round
if ($type == "Round")
{
    $retDate = $from_to_data['rdate'];
}

$connect = mysqli_connect('localhost', 'atya', 'atya', 'um') or die($connect);
$Tdata = "SELECT * FROM trips WHERE `departing_country` = '$from_country' AND `destination_country` = '$destination_country' AND `date` = '$depDate'";  //getting the going trip data
$Rdata = "SELECT * FROM trips WHERE `destination_country` = '$from_country' AND `departing_country` = '$destination_country' AND `date` > '$depDate' ";
$result = mysqli_query($connect, $Tdata);   
$rresult = mysqli_query($connect, $Rdata);  

$trips = mysqli_fetch_all($result);   //the result of going trips in array 
$Rtrips = mysqli_fetch_all($rresult); //the result of returning trips in array 


?>

<HTML>
<head>
<title> Results </title>
<style>
    .white_box{
        background-color: white;
    }
</style>
</head>
<body>
<?php include "header.php"; ?>
<div class = 'background'>
<div class = 'white_box'>
<h1>Results:</h1>
<ul>
<h2>Going trips</h2>
<?php if (empty($trips)){ echo "Sorry there are no available trips!";} ?>
<?php $i =1;?>
<?php foreach ($trips as $trip){?>
<li>    
<div>

    <h3>Trip <?php echo $i;?></h3>
    <h4>From -> <?php echo $trip[0] . " (Airport: " . $trip[1] . ")"; #where 0 is the departing country and 1 is departing airport?></h4>
    <h4>To-> <?php echo $trip[2] . " (Airport: " . $trip[3] . ")"; #where 2 is the destination country and 3 is destination airport?> </h4>
    <h4>Date: <?php echo $trip[4];?> </h4>
    <h4>Time: <?php echo $trip[5];?></h4>
    <h4>Price = <?php echo $trip[7] . "$";?></h4>
</div>
</li>
    <?php $i++; } ?>
</ul>
<ul>
<h2>Retuning trips</h2>
<?php if (empty($Rtrips)){ echo "Sorry there are no available trips!";} ?>
<?php $j =1;?>
<?php foreach ($Rtrips as $Rtrip){?>
<li>    
<div>

    <h3>Trip <?php echo $j;?></h3>
    <h4>From -> <?php echo $Rtrip[0] . " (Airport: " . $Rtrip[1] . ")"; #where 0 is the departing country and 1 is departing airport?></h4>
    <h4>To-> <?php echo $Rtrip[2] . " (Airport: " . $Rtrip[3] . ")"; #where 2 is the destination country and 3 is destination airport?> </h4>
    <h4>Date: <?php echo $Rtrip[4];?> </h4>
    <h4>Time:<?php echo $Rtrip[5];?></h4>
    <h4>Price = <?php echo $Rtrip[7] . "$";?></h4>
</div>
</li>
    <?php $j++; } ?>
</ul>

<a href = 'Booking-Airlines.php'><button>Book now</button></a>
</div>
</div>
<?php include "footer.php"; ?>
