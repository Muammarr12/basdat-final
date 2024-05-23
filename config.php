<?php
$servername = "localhost"; // Change this if your MariaDB server is hosted elsewhere
$username = "ammar"; // Change this to your MariaDB username
$password = "Ammarjhie128."; // Change this to your MariaDB password
$database = "kejuaraan_f1"; // Change this to the name of your MariaDB database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);}
