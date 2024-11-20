<?php
$servername = "localhost";
$username = "u948335622_katech";
$password = "Katech@2024";
$dbname = "u948335622_countdown_db"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>