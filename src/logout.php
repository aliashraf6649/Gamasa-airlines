<?php
session_start();
session_unset();
session_destroy();
setcookie("from-to", $from_to_encode, time()-1000, "/");
setcookie("ticket", $ticket_encode,time()-1000,"/"); 
header('location: homepage.php');
exit;
?>
