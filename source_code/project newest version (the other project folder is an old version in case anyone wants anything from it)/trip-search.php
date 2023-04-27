<?php
session_start();
$errors = ['going' => '', 'return' => ''];   //intitalzing errors as empty
$connect = mysqli_connect('localhost', 'atya', 'atya', 'um'); //connecting to the database
if(!$connect){
  echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
}

$cookieValue = $_COOKIE["from-to-booking"];      //the cookie from the last page "Booking-Airlines.php" which includes the from and to countries
$from_to_data = json_decode($cookieValue, true); //decoding the script to return as array

$from = $from_to_data['from'];   //assigning the from value
$destination = $from_to_data['to'];   //assigning the to value
$type = $from_to_data['type'];  //assigning the type of booking 'one-way' or 'round'
$class = $from_to_data['class']; //assigning the class of the trip 'economic' or 'business' or 'first'


$parts = explode(" - ", $from);
$from_airport = $parts[0]; 
$from_country = $parts[1]; 

$Rparts = explode(" - ", $destination);
$destination_airport = $Rparts[0]; 
$destination_country = $Rparts[1]; 

$Tdata = "SELECT * FROM trips WHERE `from_airport` = '$from_airport' AND `to_airport` = '$destination_airport'";
$Rdata = "SELECT * FROM trips WHERE `to_airport` = '$from_airport' AND `from_airport` = '$destination_airport'"; //getting return data
 
$result = mysqli_query($connect, $Tdata);   
$rresult = mysqli_query($connect, $Rdata);  


//putting the data into array

$trips = mysqli_fetch_all($result);   //the result of going trips in array 
$Rtrips = mysqli_fetch_all($rresult); //the result of returning trips in array 




if (isset($_POST['submit']))  //if the submit button was pressed
{
  
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
      //if the 1 value ['from'] is = to our from country & value 3 ['destination'] is = to our destination country
      
      if($trip[1] == $from_airport and $trip[3] == $destination_airport)

        $trip_id = $trip[6];    //assign that trip id to variable called trip_id
        $date = $trip[4];
    }
////////////////////////////////////////////////
  $user = $_SESSION['user'];
  $userId = $user['id'];
  ///////////////////////////////////////////////
  $fullname = $user['fname']." ".$user['mname']." ".$user['lname'];
  // first we check if the user has already booked the ticket or not 
  $bookData = "SELECT * FROM bookings WHERE `user-id` = '$userId'";            
  $bresult = mysqli_query($connect, $bookData);
  $btrips = mysqli_fetch_all($bresult,MYSQLI_ASSOC); // the result of booked trips in array  

  foreach ($btrips as $btrip)
  {
    if (($btrip['trip-id'] == $trip_id))
    {
      $errors['going'] = "ticket already booked <br>";    // checks if ticket is already booked
    }
  }

  

  


  if ($type == 'Round')
  {    
    //if the type of our trip is round
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
        if($Rtrip[1] == $destination_airport and $Rtrip[3] == $from_airport)
        //if the returning country he choose = the going country in atrip ('destination' = value 3)
        //and
        // the going country he choose to go from = the returning country in a trip ('from' = value 1)
        {
          $Rtrip_id = $Rtrip[6]; //assign the retuning trip id in a variable called Rtrip_id 
          $Rdate = $Rtrip[4];
        }
      }
      $bookData = "SELECT * FROM bookings WHERE `user-id` = '$userId'";            
      $bresult = mysqli_query($connect, $bookData);
      $btrips = mysqli_fetch_all($bresult,MYSQLI_ASSOC); // the result of booked trips in array  
    
      // checks if ticket is already booked
      foreach ($btrips as $btrip)
      {
        if (($btrip['trip-id'] == $Rtrip_id))
        {
          $errors['return'] = "ticket already booked <br>";    
        }
      }

      if($Rdate <= $date) // compare depart date to return date
      {
        $errors['return'] = "return date cant be before or the same as the departing one <br>";
      }
    }
  }

  if (!array_filter($errors)) //if no errors occured during the form submission
  {

     //inserting the trip-id and user-id into the table of bookings
    $sql = "INSERT INTO bookings (`user-id`, `trip-id`,`from_`,`to_`,`date`) VALUES ('$userId', '$trip_id','$from_airport','$destination_airport','$date')"; 
    $insert_result = mysqli_query($connect, $sql);
    
    if($type =='Round')
    {
      //inserting the trip-id and user-id into the table of bookings
      $sql1 = "INSERT INTO bookings (`user-id`, `trip-id`,`from_`,`to_`,`date`) VALUES ('$userId', '$Rtrip_id','$destination_airport','$from_airport','$Rdate')";
      $insert_result = mysqli_query($connect, $sql1);
    }
    
    $ticket = ['username' =>$fullname,'userID' => $userId,'from' => $from_airport, 'to' => $destination_airport, 'type' => $type,'departID' => $trip_id, 'returnID' => $Rtrip_id
    , 'departDate' => $date, 'returnDate' => $Rdate, 'class' => $class];
    $ticket_encode = json_encode($ticket);
    // Set a cookie with an expiration time of "At end of session"
    setcookie("ticket", $ticket_encode,0,"/"); 
    header("Location: success.php");  //go to our success page
    exit();
  }  
}
















mysqli_free_result($result);
mysqli_free_result($rresult);
mysqli_close($connect);


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
<link rel="stylesheet" href="styles/style.css">
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
<?php if(empty ($trips)){ ?>
<div class = 'red-error'>Sorry there are no trips matching your search</div>
<?php } ?>
<?php foreach ($trips as $trip) { ?>
<option value = "<?php echo $trip[6]?>">
<div> 
<?php echo "$trip[1] -> ";?>
<?php echo $trip[3]."   " ;?>
<?php echo " / Date: " . $trip[4] . " / Time: " . $trip[5] . " / Price: " . $trip[7] . "$"; } ?>
</div>
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
<?php if(empty($Rtrips)){ ?>
<div class = 'red-error'>Sorry there are no trips matching your search</div>
<?php }?>
<?php foreach ($Rtrips as $Rtrip) { ?>
<option value = "<?php echo $Rtrip[6]?>">
<div> 
<?php echo "$Rtrip[1] -> ";?>
<?php echo $Rtrip[3]."   " ;?>
<?php echo " / Date: " . $Rtrip[4] . " / Time: " . $Rtrip[5] . " / Price: " . $Rtrip[7] . "$"; }} ?>
</div>
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