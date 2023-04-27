<?php

$conn = mysqli_connect('localhost', 'ali', 'alif2004' , 'gamasa_airlines') or die($conn); 

function get_airport($conn , $term){    
    $query = "SELECT * FROM airport WHERE airport_name LIKE '%".$term."%' ORDER BY airport_name ASC";
    $result = mysqli_query($conn, $query);    
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data;    
}

if (isset($_GET['term'])) {
    $getairport = get_airport($conn, $_GET['term']);
    $airportList = array();
    foreach($getairport as $airport){
        $airportList[] = $airport['airport_name'];
    }
    echo json_encode($airportList);

}


?>