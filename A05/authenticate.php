<?php
session_start();
include("conn.php"); // Include your database connection file

// Retrieve the username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Check for a matching record in the users table
$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$stmt = $stmt->get_result();

if ($result->num_rows > 0) {
    // If a match is found
    $user = $result->fetch_assoc();

    // Retrieve the user_id of the matching record
    $user_id = $user['user_id'];

    // Generate a session_id
    $session_id = session_create_id();

    // Set the user_id and session_id as session variables
    $_SESSION['user_id'] = $user_id;
    $_SESSION['session_id'] = $session_id;

    // Send the user_id, session_id, and current time to the login_sessions table
    $current_time = time();
    $query = "INSERT INTO login_sessions (user_id, session_id, last_access_time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iss', $user_id, $session_id, $current_time);
    $stmt->execute();

    // Redirect to admin.php
    header("Location: admin.php");
} else {
    // If no match is found, redirect back to the login page
    header("Location: login.php");
}