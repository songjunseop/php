<?php
    $host = "localhost";
    $user = "jun8044";
    $pass = "wnstjq5894!";
    $db = "jun8044";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    // if(mysqli_connect_errno()){
    //     echo "DATABASE Connect False";
    // } else {
    //     echo "DATABASE Connect True";
    // }
?>