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
$fullName = $_POST['fullName'];
$username = $_POST['username'];
$organization = $_POST['organization'];
$vicariate = $_POST['vicariate'];
$parish = $_POST['parish'];
$email = $_POST['email'];
$contactNumber = $_POST['contactNumber'];
$password = $_POST['password']; // Hash the password before storing it in the database

// Update user data in the database
$sql = "UPDATE user_data SET name='$fullName', username='$username', organization='$organization', vicariate='$vicariate', parish='$parish', email='$email', cnumber='$contactNumber', password='$password' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully.";
} else {
    echo "Error updating profile: " . $conn->error;
}

// Close the database connection
$conn->close();
?>