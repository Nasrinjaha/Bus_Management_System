<?php
    include "../include/connection.php";
    $date = $_REQUEST['date'];
    $query = "SELECT distinct(bus.b_id), bus.b_number
    FROM bus, assigndriver
    WHERE bus.b_id NOT IN (SELECT b_id FROM assigndriver WHERE d_date = '$date')";
    $result = mysqli_query($con,$query); 
    $bus = [];
    while($row = mysqli_fetch_array($result)){
        $bus[]  = $row;
    }
    echo json_encode($bus);
?>