<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youthlink";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: Log_in_page.php");
    exit;
}

// Check if 'id' is set in the session
if (!isset($_SESSION['id'])) {
    echo "No user ID found in the session.";
    exit;
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM user_data WHERE id = $id";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error in SQL query: " . $conn->error;
    exit;
}

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit;
}

$conn->close();
?>
