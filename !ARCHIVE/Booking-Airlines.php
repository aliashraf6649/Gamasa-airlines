<?php

#get sends data in th url
#post sends data in the request header (HIDDEN)
$errors = array('class' => '', 'from' => '', 'to' => '','type' => '');   //to initialize array for errors to be put in
$from = $email = $destination = '';  //declaring them by default as empty strings
$conn = mysqli_connect('localhost', 'ali', 'alif2004', 'gamasa_airlines') or die($conn);
if(isset($_POST['submit'])){  //if submit was pushed
    if (empty($_POST['class']))  
    {
        $errors['class'] = "Please choose the class you're flying by! <br>"; 
    }

    else{
        $class = $_POST['class'];
    }

    if (empty($_POST['to']))
    {
        $errors['to'] = "Please enter a Destination <br>";
    }
    
    else
    {
        $toAirport=trim($_POST['to']);                    
        $toQuery="SELECT * FROM airport WHERE  `airport_name` = '$toAirport'";     
        $toResult=mysqli_query($conn, $toQuery);                                
        
        if(mysqli_num_rows($toResult) == 0 )
        {
            $errors['to'] = "destination is not an airport".'<br>';
        }
        if($_POST['from'] == $_POST['to'])
        {
            $errors['to'] = "from should not be the same as destination <br>";
        }
    }

    if (empty($_POST['from']))
    {
        $errors['from'] = "Please enter the depart country <br>";
    }

    else
    {
        $fromAirport=trim($_POST['from']);
        $fromQuery="SELECT * FROM airport WHERE airport_name = '$fromAirport'"; 
        $fromResult=mysqli_query($conn, $fromQuery);

        if(mysqli_num_rows($fromResult) == 0 )
        {
            $errors['from'] = "from is not an airport".'<br>';
        }
        if($_POST['from'] == $_POST['to'])
        $errors['from'] = "from should not be the same as destination <br>";
    }

    if (empty($_POST['type']))  
    {
        $errors['type'] = "Please choose the trip type you're flying by! <br>"; 
    }

    else
    {
        $type = $_POST['type'];
    }

    if (!array_filter($errors))
    {
        $from_to_type = ['from' => $_POST['from'], 'to' => $_POST['to'], 'type' => $_POST['type']];
        $from_to_encode = json_encode($from_to_type);
        setcookie("from-to-booking", $from_to_encode, time()+3600); // Cookie expires in 1 hour

        header("Location: trip-search.php");
        exit();
    }
}
?>

<html>
<?php include "header.php"; ?>
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
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="autocompletecall.js"></script>
</head>
<div class = 'background'>
<div class = 'container'>
<h4 class = 'header'>Book a flight</h4>
<form action="Booking-Airlines.php"  method = "POST">
    <div class = "labels">Your Class</div><br>
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
    <div class = 'red-error'> <?php echo $errors['class']; ?> </div>

    <label class = 'labels'>From:</label>
    <input type = 'text' id="from" name = 'from'>
    <div class = 'red-error'> <?php echo $errors['from']; ?> </div>


    <label class = 'labels'>Destination:</label>
    <input type = 'text' id ="to" name = 'to'>
    <div class = 'red-error'> <?php echo $errors['to']; ?> </div>
    
    

    <div class = "labels">Trip type</div><br>
    <label class = 'items'>
    <input type="radio" name="type" value="One-way">
    One way
    </label><br>
    <label class = 'items'>
    <input type="radio" name="type" value="Round">
    Round
    </label><br>
    <div class = 'red-error'> <?php echo $errors['type']; ?> </div>

<div class = 'button_container'>
<input type='submit' name = 'submit' value = 'submit' class = "button">
</div>
</form>
</div>
</div>

<?php include "footer.php"; ?>
</html>