<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the end time to 1 week from now
    $endTime = round(microtime(true) * 1000) + (7 * 24 * 60 * 60 * 1000); // 1 week from now in milliseconds

    // Insert or update the end time in the database
    $sql = "REPLACE INTO countdown (id, end_time) VALUES (1, $endTime)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['endTime' => $endTime]);
    } else {
        echo json_encode(['error' => $conn->error]);
    }
} else {
    // Get the end time
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