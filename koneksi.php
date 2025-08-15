<?php
    $hostname = "LocalHost";
    $username = "root";
    $password = "";
    $database = "absensiDigital";

    $db = mysqli_connect( $hostname, $username, $password, $database);

    if (!$db){
        die('Could not connect: ' . mysqli_connect_error());
    }
?>
