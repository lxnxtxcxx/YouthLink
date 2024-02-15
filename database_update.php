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
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$vicariate = $_POST['vicariate'];
$parish = $_POST['parish'];
$email = $_POST['email'];
$contactNumber = $_POST['contactNumber'];
$password = $_POST['password']; // Hash the password before storing it in the database

// Update user data in the database
$stmt = $conn->prepare("UPDATE user_data SET firstname=?, lastname=?, vicariate=?, parish=?, email=?, cnumber=?, password=? WHERE id=?");
$stmt->bind_param("sssssssi", $firstname, $lastname, $vicariate, $parish, $email, $contactNumber, $password, $id);

$stmt->execute();

if ($stmt->error) {
    echo "Error updating profile: " . $conn->error;

} else {
    echo "Profile updated successfully.";
}

// Close the database connection
$stmt->close();
?>