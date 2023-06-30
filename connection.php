<?php

    $host = "localhost";
    $port = 4000;
    $username = "root";
    $password = "";
    $dbname = "carseller";

    try {
        $connection = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    } catch (Exception $e) {
        echo $e->getMessage();
    }