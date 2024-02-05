<?php
// Set maximum file size
$maxFileSize = 500000;

// Set a flag to determine if the form can be sent
$canSendForm = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $eventDateFrom = $_POST['eventDateFrom'];
    $eventDateTo = $_POST['eventDateTo'];
    $event = $_POST['event'];
    $vicariate = $_POST['vicariate'];
    $parish = $_POST['parish'];
    $contactPerson = $_POST['contactPerson'];
    $contactNumber = $_POST['contactNumber'];
    $venue = $_POST['venue'];
    $remarks = $_POST['remarks'];
    $file = $_FILES['file'];

    // Convert string dates to MySQL-compatible date strings
    $dateTimeFrom = new DateTime($eventDateFrom);
    $dateTimeTo = new DateTime($eventDateTo);
    $eventDateFrom = $dateTimeFrom->format('Y-m-d');
    $eventDateTo = $dateTimeTo->format('Y-m-d');

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "youthlink";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO appointment_data (eventDateFrom, eventDateTo, event, vicariate, parish, contactPerson, contactNumber, venue, remarks) VALUES ('$eventDateFrom', '$eventDateTo', '$event', '$vicariate', '$parish', '$contactPerson', '$contactNumber', '$venue', '$remarks')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Event created successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $canSendForm = false; // Set the flag to false if there is an error in database insertion
    }

    $conn->close();

    // Handle file upload
    if (isset($_FILES['file'])) {
        $target_dir = "/xampp/htdocs/New folder/"; // correct the path here
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('Sorry, file already exists.');</script>";
            $uploadOk = 0;
            $canSendForm = false; // Set the flag to false if there is an error in file upload
        }

        // Check file size
        if ($_FILES["file"]["size"] > $maxFileSize) {
            echo "<script>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
            $canSendForm = false; // Set the flag to false if there is an error in file upload
        }

        // Allow only certain file formats
        $allowedFileTypes = array("pdf", "doc", "docx");
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "<script>alert('Sorry, only PDF, DOC, and DOCX files are allowed.');</script>";
            $uploadOk = 0;
            $canSendForm = false; // Set the flag to false if there is an error in file upload
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                $canSendForm = false; // Set the flag to false if there is an error in file upload
            }
        }
    }

    // If $canSendForm is true, proceed with sending the form
    if ($canSendForm) {
        // Your form processing logic goes here
        // ...
    }
}
?>
