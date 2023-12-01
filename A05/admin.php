<?php
session_start();
include("conn.php"); // Include your database connection file

// Retrieve the user_id and session_id from the browser session
$user_id = $_SESSION['user_id'];
$session_id = $_SESSION['session_id'];

// Check for a matching record in the login_sessions table
$query = "SELECT * FROM login_sessions WHERE user_id = ? AND session_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('is', $user_id, $session_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // If a match is found, update the time stored in the login_sessions table
    $current_time = time();
    $query = "UPDATE login_sessions SET last_access_time = ? WHERE user_id = ? AND session_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iis', $current_time, $user_id, $session_id);
    $stmt->execute();

    // Show a welcome message
    echo "Welcome back!";
} else {
    // If a matching record is not found, redirect back to the login page
    header("Location: login.php");
}