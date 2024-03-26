<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passion";

// create  a connection to the database

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection

if ($conn->connect_error){
    die("connection failed: " .$con->connect_error);

}

?>