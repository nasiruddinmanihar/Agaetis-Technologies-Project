<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'studentinfo';
$port = 3309;


$conn = new mysqli($host, $username, $password, $database, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>