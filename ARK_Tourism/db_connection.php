<?php

//mysql database connection to php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ark_tourism_db";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
