<?php
$errors = ['going' => '', 'return' => ''];   //intitalzing errors as empty
include "../config.php";
if(!$database){
  echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
}

$cookieValue = $_COOKIE["from-to"];      //the cookie from the last page "Booking-Airlines.php" which includes the from and to countries
$from_to_data = json_decode($cookieValue, true); //decoding the script to return as array

$fromValue = $from_to_data['from'];   //assigning the from value
$toValue = $from_to_data['to'];   //assigning the to value
$type = $from_to_data['type'];  //assigning the type of booking 'one-way' or 'round'
$class = $from_to_data['class'];

$Tdata = "SELECT * FROM trips WHERE `from` = '$fromValue' AND `to` = '$toValue'";  //getting the going trip data
$Rdata = "SELECT * FROM trips WHERE `to` = '$fromValue' AND `from` = '$toValue'"; //getting the returning data


$result = mysqli_query($database, $Tdata);   
$rresult = mysqli_query($database, $Rdata);  
 

//putting the data into arrayss

$trips = mysqli_fetch_all($result);   //the result of going trips in array 
$Rtrips = mysqli_fetch_all($rresult); //the result of returning trips in array 

//if(mysqli_num_rows($bresult) > 0 )
//{
//  $btrip = $btrips[0];
//  echo $btrip['from_']."<br>";
//  echo "<script>console.log(".$btrip['from_'].")</script>";
//}






if (isset($_POST['submit']))  //if the submit button was pressed
{

  $bookData = "SELECT * FROM bookings WHERE `user-id` = '700' AND
  `from_` = '$fromValue' AND `to_` = '$toValue'";   //insert user ID
  $bresult = mysqli_query($database, $bookData);
  $btrips = mysqli_fetch_all($bresult,MYSQLI_ASSOC); // the result of booked trips in array  

  foreach ($btrips as $btrip)
  {
    if (($btrip['from_'] == $fromValue) and ($btrip['to_'] == $toValue))
    {
      $errors['going'] = "ticket already booked <br>";
    }
  }
  if ($_POST['going'] == "")  //checking if the customer booked the going trip
  {
      $errors['going'] = "Please choose the going trip! <br>";  //if he didn't this error is assigned to pop at the screen afterwards
  }
  else
  {
      $going = $_POST['going']; //if he choose a trip it'll be assigned in a variable called going
  }
  
    
  foreach ($trips as $trip)   //for every element(array) in the 2-dimentional array called trips
    {
      //if the 0 value ['from'] is = to our from country & value 1 [''] is = to our  country
      if($trip[0] == $fromValue and $trip[1] == $toValue)
        $trip_id = $trip[3];    //assign that trip id to variable called trip_id
    }

    


  if ($type == 'Round'){    //if the type of our trip is round
    $bookData = "SELECT * FROM bookings WHERE `user-id` = '700' AND
    `from_` = '$toValue' AND `to_` = '$fromValue'";   //insert user ID
    $bresult = mysqli_query($database, $bookData);
    $btrips = mysqli_fetch_all($bresult,MYSQLI_ASSOC); // the result of booked trips in array  
    foreach ($btrips as $btrip)
    {
      if (($btrip['from_'] == $toValue) and ($btrip['to_'] == $fromValue))
      {
        $errors['return'] = "ticket already booked <br>";
      }
    }
  
  
    if (empty($_POST['return']))  //check if the customer booked a returning trip
  {
    //if he didn't this error is assigned to pop at the screen afterwards
      $errors['return'] = "Please choose the returning trip! <br>";
  }
  else //if he did book a returning trip
  {
      $return = $_POST['return'];  //that trip will be assigned in a variable called return
  foreach ($Rtrips as $Rtrip) //for every element(array) in the 2-dimentional array called Rtrips (returning trips)
  {
    

  if($Rtrip[1] == $fromValue and $Rtrip[0] == $toValue)
  //if the returning country he choose = the going country in atrip ('' = value 1)
  //and
  // the going country he choose to go from = the returning country in a trip ('from' = value 0)
  {
    $Rtrip_id = $Rtrip[3]; //assign the retuning trip id in a variable called Rtrip_id 
  }
  }

  if($Rtrip[2] <= $trip[2]) // compare depart date-time to return date-time
  {
    $errors['return'] = "return date cant be before or the same as the departing one <br>";
  }
 
  }
  }

  if (!array_filter($errors)) //if no errors occured during the form submission
  {

    //inserting the trip-id and user-id into the table of bookings

    $sql = "INSERT INTO bookings (`user-id`, `trip-id`,`from_`,`to_`,`date-time`) VALUES ('700', '$trip_id','$fromValue','$toValue','$trip[2]')"; 
    $insert_result = mysqli_query($database, $sql);

    if ($type == 'Round')  //if the type of our trip is round
    {
      //inserting the trip-id and user-id into the table of bookings

      $sql1 = "INSERT INTO bookings (`user-id`, `trip-id`,`from_`,`to_`,`date-time`) VALUES ('700', '$Rtrip_id','$toValue','$fromValue','$Rtrip[2]')";
      $insert_result = mysqli_query($database, $sql1);
    }



    $ticket = ['from' => $fromValue, 'to' => $toValue, 'type' => $type,'departID' => $trip_id, 'returnID' => $Rtrip_id, 'departDate' => $trip[2], 'returnDate' => $Rtrip[2], 'class' => $class];
    $ticket_encode = json_encode($ticket);
    setcookie("ticket", $ticket_encode, time()+3600); // Cookie expires in 1 hour
    header("Location: success.php");  //go to our success page
    exit();
  }  
}
















mysqli_free_result($result);
mysqli_free_result($rresult);
mysqli_close($database);


?>

<HTML>
<head>
<style>
        h4.header{
        font-family: 'Poppins', sans-serif;
        font-size: 40px;
        position: absolute;
        top: -60;
        left: 50%;
        transform: translateX(-50%);
        color:#251d1d;
        }
.choose1{
    height: 60px;
    position: absolute;
    top: 100px;
    left: -150px;
    margin-left: 50%;
}
.choose2{
    margin:  20px;
    padding-top: 20px;
    padding-bottom: 20px;
    position: absolute;
    bottom: 10px;
    left: 145px;
    
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
  <title> Flight </title>
</head>
<body>
<?php include "header.php"; ?>

<div class = 'background'>
<div class = 'container'>
<h4 class = 'header'>Choose a trip</h4>
<form action="trip-search.php" method = 'POST'>
<div class = 'choose1'>

<select id="going" class="trip" value = 'going' name = 'going'>
<option value="">
  Please select a Going Trip
</option>
<?php foreach ($trips as $trip) { ?>
<option value = "<?php echo $trip[3]?>"><div> <?php echo "$trip[0] -> ";?></div>
<?php echo $trip[1]."   " ;?>
<?php echo $trip[2] . "     "; 
      echo "Price: $trip[4]$";}?>
</option>
</select>
<div class = 'red-error'> <?php echo $errors['going']; ?> </div>
</div>
<?php if ($type != 'One-way') {?>
<div class = 'choose2'>

<select id="return" class="rtrip" value = 'return' name = 'return'>
<option value="">
  Please select a returning Trip
</option>
<?php foreach ($Rtrips as $Rtrip) { ?>
<option value = "<?php echo $Rtrip[3]?>"><div> <?php echo "$Rtrip[0] -> ";?></div>
<?php echo $Rtrip[1]."   " ;?>
<?php echo $Rtrip[2] . "     "; 
      echo "Price: $Rtrip[4]$";}} ?>
</option>
</select>
<div class = 'red-error'> <?php echo $errors['return']; ?> </div>
</div>
<div class = 'button_container'>
<input type='submit' name = 'submit' value = 'submit' class = "button">
</div>
</div>
</form>
</div>
<?php include "footer.php"; ?>
</body>

</HTML>