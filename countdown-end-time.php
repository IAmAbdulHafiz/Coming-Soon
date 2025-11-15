<?php
header('Content-Type: application/json');
session_start();
include 'db.php';

// Check if connection exists
if (!isset($conn) || $conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . ($conn->connect_error ?? 'Unknown error')]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the end time to 60 hours from now in milliseconds
    $endTime = round(microtime(true) * 1000) + (60 * 60 * 60 * 1000);

    // Insert or update the end time in the database
    $sql = "REPLACE INTO countdown (id, end_time) VALUES (1, $endTime)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['endTime' => $endTime]);
    } else {
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }
} else {
    // Retrieve the end time from the database
    $sql = "SELECT end_time FROM countdown WHERE id = 1";
    $result = $conn->query($sql);
    
    if ($result === FALSE) {
        echo json_encode(['error' => 'Query failed: ' . $conn->error]);
        $conn->close();
        exit;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['endTime' => (int)$row['end_time']]);
    } else {
        echo json_encode(['endTime' => null]);
    }
}

$conn->close();
?>