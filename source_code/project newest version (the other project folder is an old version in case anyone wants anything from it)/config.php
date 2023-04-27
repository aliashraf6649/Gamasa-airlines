<?php
$database=mysqli_connect('localhost', 'atya', 'atya', 'um');
if(!$database)
	echo 'error connecting to database: '.mysqli_connect_error();
?>