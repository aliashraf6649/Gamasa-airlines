<?php
$database=mysqli_connect('localhost', 'root', '', 'users');
if(!$database)
	echo 'error connecting to database: '.mysqli_connect_error();
?>