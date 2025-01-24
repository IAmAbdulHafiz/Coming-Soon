<?php
$servername = "localhost";
$username = "u377886847_nlisghana";
$password = "NLISghana@2025";
$dbname = "u377886847_nlisghana"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>