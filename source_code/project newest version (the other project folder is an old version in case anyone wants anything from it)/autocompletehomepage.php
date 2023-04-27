<?php

$dbhost = 'localhost';
$dbuser = 'atya';
$dbpass = 'atya';
$db = 'um';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 

function get_airport($conn , $term){    
    $query = "SELECT * FROM airport WHERE country LIKE '%".$term."%' ORDER BY country ASC";
    $result = mysqli_query($conn, $query);    
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data;    
}

if (isset($_GET['term'])) {
    $getairport = get_airport($conn, $_GET['term']);
    $airportList = array();
    foreach($getairport as $airport){
        $airportList[] = $airport['country'];
    }
    echo json_encode($airportList);

}


?>