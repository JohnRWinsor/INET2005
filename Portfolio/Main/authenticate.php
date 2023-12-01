<?php
// Replace these values with your actual database credentials
$host = "db";
$username = "root";
$password = "super_secret123?";
$database = "portfolio_db";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$username = $_POST['username'];
$password = $_POST['password'];

// Use prepared statements to prevent SQL injection
$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query returned a result
if ($result->num_rows > 0) {
    // Valid login, redirect to index.php
    header("Location: indexlogin.php");
    exit();
} else {
    // Invalid login, redirect to login page with an error message
    header("Location: login.php?error=1");
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>