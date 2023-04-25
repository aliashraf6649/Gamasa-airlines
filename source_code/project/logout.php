<?php
session_start();
session_unset();
//TODO: CLEAR ALL SET COOKIES
session_destroy();
header('location: homepage.php');
exit;
?>
