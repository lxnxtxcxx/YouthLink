<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection parameters
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "youthlink";

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a query to check user credentials
    $stmt = $conn->prepare("SELECT * FROM user_data WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Assuming $userId is the user's id retrieved from the database during login
        $row = $result->fetch_assoc();
        $userId = $row['id']; // Replace 'id' with the actual column name for user id
        $organization = $row['organization'];

        // Set session variables
        $_SESSION["loggedin"] = true;
        $_SESSION['id'] = $userId;

        // Add the conditions to redirect the user based on their organization
        if (strcasecmp("school", $organization) == 0 || strcasecmp("parish", $organization) == 0) {
            header("Location: index_client.php");
            exit();
        } elseif (strcasecmp("formation team", $organization) == 0) {
            header("Location: index-member.php");
            exit();
        } elseif (strcasecmp("admin", $organization) == 0) {
            header("Location: admin/member_list.php");
            exit();
        }
    } else {
        // Incorrect credentials, show an error message or redirect back to the login page
        echo "<script>alert('Invalid username, organization, or password. Please try again.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
