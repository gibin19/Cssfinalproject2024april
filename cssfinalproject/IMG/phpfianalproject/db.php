<?php
$servername = "localhost"; // Assuming your database server is running locally
$username = "your_username"; // Replace with your actual database username
$password = "your_password"; // Replace with your actual database password
$dbname = "your_database"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
