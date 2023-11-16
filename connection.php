<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = "test"; // Replace with your database password
$dbname = "sangeet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>