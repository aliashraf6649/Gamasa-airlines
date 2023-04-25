<!DOCTYPE html>
<?php
include "config.php";
$result=mysqli_query($database, "SELECT `comment` FROM `comments`");
$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
//echo $data[0]['comment'].'<br>';
//echo date('Y-m-d h:i:s');
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/test.css">
</head>
<body>
	<div class="container">
		<div class="lc">
			<div>
			1
			</div>
		</div>
		<div class="rc">
			<div>
			2
			</div>
		</div>
	</div>
</body>
</html>