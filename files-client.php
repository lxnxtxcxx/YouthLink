<?php
    session_start();

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

// Check if 'id' is set in the session
if (!isset($_SESSION['id'])) {
    echo "No user ID found in the session.";
    exit;
}

$id = $_SESSION['id'];

// Fetch data for the current user
$sql = "SELECT * FROM user_data WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  }
  ?>


<!-- files.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Storage</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* Custom styles */
     body {
      background-color: #f8f8f8;
      color: #333333;
      margin-bottom: 60px;
    }

    .navbar {
      background-color: #F6BE00;
    }
    .navbar-brand {
      color: white;
    }
    .nav-link {
      color: white;
    }


    .file-container {
      margin-top: 20px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      padding: 20px;
      background-color: #fff;
    }

    .container-title {
      font-size: 24px;
      color: #000080;
      margin-bottom: 10px;
    }

    .file-list {
      list-style-type: disc;
      padding-left: 20px;
    }

    .file-list-item {
      margin-bottom: 5px;
    }

    .file-link {
      font-size: 18px;
      color: #007bff;
      text-decoration: none;
    }

  </style>
</head>
<body>
  <!-- Navigation bar -->
  <?php
      include 'header.php';
      include 'nav-bar/user-nav-bar.php';
  ?>
  <!-- <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index_client.php">YouthLink</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index_client.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="events-client.php">Events</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="files-client.php">Files</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="appointment-client.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile_client.php"><?php echo $row["username"]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <!-- Files Section -->
    <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mx-auto">
          <div class="file-container">
            <h2 class="container-title">Participants List Form</h2>
            <ul class="file-list">
              <li class="file-list-item">
        <a href="https://docs.google.com/document/d/1SScIDHAjlfQmVnIFyj1AJHHU84zaoja2/edit?usp=sharing&ouid=117690929165865719807&rtpof=true&sd=true" class="file-link" target="_blank">
          Participants List Form
        </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
