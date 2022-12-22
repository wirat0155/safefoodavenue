<?php
    $servername = "localhost";
    $username = "manpower";
    $password = "pEAwM0Dyg9";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=manpower", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?>