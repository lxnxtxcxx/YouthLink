<?php
session_start();

// Database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "youthlink";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the session
if (!isset($_SESSION['id'])) {
    echo "No user ID found in the session.";
    exit;
}

$id = $_SESSION['id'];

// Get updated data from AJAX request
$username = $_POST['username'];
$password = $_POST['password']; 

// Update user data in the database
$sql = "UPDATE admin_data SET  username='$username', password='$password' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully.";
} else {
    echo "Error updating profile: " . $conn->error;
}

// Close the database connection
$conn->close();
?>