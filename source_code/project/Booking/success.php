<?php
include "../config.php";
if(!$database){
  echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
}

$cookieValue = $_COOKIE["ticket"];      //the cookie from the last page "trip-search.php" which includes the from and to countries
$ticket_data = json_decode($cookieValue, true); //decoding the script to return as array

$fromValue = $ticket_data['from'];   //assigning the from value
$toValue = $ticket_data['to'];   //assigning the to value
$type = $ticket_data['type'];  //assigning the type of booking 'one-way' or 'round'
$departID = $ticket_data['departID']; //assigning id of the depart trip
$departDate = $ticket_data['departDate']; //assigning the depart date of the first trip
$returnID = $ticket_data['returnID']; //assigning the id of the return trip
$returnDate = $ticket_data['returnDate']; //assigning the return date of the second trip
$class = $ticket_data['class']; // assigning the class prefered for the trip


//output user data (wait for wageh and ashraf)
echo "user data<br>";
echo "class: ".$class;
//output one way trip data
echo "<br><br>depart trip data<br>";
echo "from: ".$fromValue."<br>to: ".$toValue."<br>ID: ".$departID."<br>Date-Time: ".$departDate;

// optional output return trip data
if($type == 'Round')
{
    echo "<br><br>return trip data<br>";
    echo "from: ".$toValue."<br>to: ".$fromValue."<br>ID: ".$returnID."<br>Date-Time: ".$returnDate;
}
?>



<HTML>
<head>
<title> Flight booked successfully </title>
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
<h4>Flight booked successfully</h4>
</div>
</div>
<?php include "footer.php"; ?>