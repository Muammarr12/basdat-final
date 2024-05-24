<?php
// Create connection    server       username password     nama database
$conn = mysqli_connect('localhost', 'ammar', 'Ammarjhie128.', 'kejuaraan_f1');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);}
