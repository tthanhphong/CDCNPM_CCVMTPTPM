<?php 
    $mysqli = new mysqli("localhost","root","","web_mysqli");

    //CHECK CONNECTION
    if($mysqli->connect_error){
        echo "SQL Connection Failed!" . $mysqli->connect_error;
        exit();
    }
?>