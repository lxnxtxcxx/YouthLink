<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youthlink";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Full_Name = $_POST['firstname'];
$Last_Name = $_POST['lastname'];
$Username = $_POST['username'];
$organization = $_POST['organization'];
$vicariate = $_POST['vicariate'];
$parish = $_POST['parish'];
$Email_address = $_POST['email'];
$Contact_no = $_POST['cnumber'];
$Password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO user_data (firstname, lastname, username, organization, vicariate, parish, email, cnumber, Password) VALUES ('$Full_Name', '$Last_Name', '$Username', '$organization', '$vicariate', '$parish', '$Email_address', '$Contact_no', '$Password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Account created successfully!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit(); // Ensure that no more output is sent to the browser after the redirect header
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>