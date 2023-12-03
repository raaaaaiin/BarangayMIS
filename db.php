<?php
// Database configuration
$servername = "localhost";
$username = "naerlexc_root";
$password = "Marcraineer0089!";
$dbname = "naerlexc_barangaymis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8
mysqli_set_charset($conn, "utf8");

?>
