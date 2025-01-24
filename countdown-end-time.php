<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the end time to 8 days from now in milliseconds
    $endTime = round(microtime(true) * 1000) + (8 * 24 * 60 * 60 * 1000);

    // Insert or update the end time in the database
    $sql = "REPLACE INTO countdown (id, end_time) VALUES (1, $endTime)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['endTime' => $endTime]);
    } else {
        echo json_encode(['error' => $conn->error]);
    }
} else {
    // Retrieve the end time from the database
    $sql = "SELECT end_time FROM countdown WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['endTime' => $row['end_time']]);
    } else {
        echo json_encode(['endTime' => null]);
    }
}

$conn->close();
?>