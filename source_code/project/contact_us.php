<?php
include "config.php";
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
	$name=trim($_POST['fullname']);
	$email=trim($_POST['email']);
	$comment=trim($_POST['comment']);
	$comment=mysqli_real_escape_string($database, $comment);//remove any special characters that the user might write
	$query="INSERT INTO `comments`(`fullname`, `email`, `comment`) VALUES ('$name','$email','$comment')";
	mysqli_query($database, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="contact_us.css">
    <title>Contact us</title>
</head>
<body>
    <div class=container>
        <h2 class=title>Contact us</h2>
        <div class=text>
            <div class=form>
                <form action="" method="post">
                <div class="input-boxes">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your full name" name="fullname" class="form-control" required>
                    </div>
                    <div class = "input-box">
                        <input type="email" placeholder="Enter your email" name="email" class="form-control" required>
                    </div>
                    <div class = "input-box">
                        <!--<input type="text" placeholder="Enter your comment" name="comment" class="form-control" required>-->
						<textarea placeholder="Enter your comment" name="comment" class="comment" required></textarea>
                    </div>
					<div class="button input-box">
						<input type="submit" name="submit" class="btn-form-submit" value="Submit">
					</div>
                </div>
                </form>
				<button name="back" class="btn-form-back" onclick="window.location.href='welcome.php'" action="welcome.php">Go Back</button>
            </div>
        </div>
    </div>
    
</body>
</html>