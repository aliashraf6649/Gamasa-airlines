<?php
require_once "config.php";

function get_airport($database , $term){    
    $query = "SELECT * FROM airport WHERE country LIKE '%".$term."%' ORDER BY country ASC";
    $result = mysqli_query($database, $query);    
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data;    
}

if (isset($_GET['term'])) {
    $getairport = get_airport($database, $_GET['term']);
    $airportList = array();
    foreach($getairport as $airport){
        $airportList[] = $airport['country'];
    }
    echo json_encode($airportList);
}
?>