<?php 
    session_start();

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "youthlink";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_SESSION['id'])) {
        echo "No user ID found in the session.";
        exit;
    }

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM user_data WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
?>
