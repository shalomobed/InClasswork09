<?php
$host = "localhost";
$user = "sobed1";
$pass = "sobed1";
$dbname = "sobed1";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>