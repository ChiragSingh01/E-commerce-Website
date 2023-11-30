<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'acmegrade_pro';

$conn = new mysqli($host, $username, $password, $dbname, 3307);

if ($conn->connect_error) {
    die('Connection Error: ' . $conn->connect_error);
}


?>