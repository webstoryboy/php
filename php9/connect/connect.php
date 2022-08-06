<?php
    $host = "localhost";
    $user = "richclub8";
    $pass = "Forever0!";
    $db = "richclub8";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if( mysqli_connect_errno() ){
        echo "DATABASE connect False";
    } else {
        //echo "DATABASE connect True";
    }
?>