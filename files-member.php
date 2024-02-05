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
      background-color: #DCF2F1;
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
      margin-top: 10px;
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
  <?php include 'header.php'; ?>
  <!-- <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index-member.php">YouthLink</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index-member.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events-member.php">Events</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="files-member.php">Files</a>
          </li> 
          <li class="nav-item ">
            <a class="nav-link" href="appointment-member.php">Appointment</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="profile-member.php"><?php echo $row["username"]?></a>
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
            <h2 class="container-title">Forms</h2>
            <ul class="file-list">
              <li class="file-list-item">
        <a href="https://docs.google.com/document/d/1SScIDHAjlfQmVnIFyj1AJHHU84zaoja2/edit?usp=sharing&ouid=117690929165865719807&rtpof=true&sd=true" class="file-link" target="_blank">
          Participants List Form
        </a>
      </li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 mx-auto">
          <div class="file-container">
            <h2 class="container-title">Hand outs</h2>
            <ul class="file-list">
              <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1GNUyMN1wHuMKQfOBefWpw5FKXbAMPdBo?usp=drive_link" class="file-link" target="_blank">
          7 Steps
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1pzAcSthI7vax0aFcZMq-u38HU8eKsmwP?usp=drive_link" class="file-link" target="_blank">
          Arise
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1SjZl_BejDR4GGCGPpOPbueokRYqtmWJE?usp=drive_link" class="file-link" target="_blank">
          Bibliodrama
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1CR-NDXpGsvbH6ngdT8RC3uYpzxThrTJq?usp=drive_link" class="file-link" target="_blank">
          Desert
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1gScBzsn9mwwB0xCJXcF-n2xmFDrxEtue?usp=drive_link" class="file-link" target="_blank">
          Good Samaritan
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1OBC9X4YfMAIh17F0TeJHEszUWAnFeLT9?usp=drive_link" class="file-link" target="_blank">
          Hands
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/12Z2BrUB0N0xZqfWR8iDhR1ct3FtSBcSU?usp=drive_link" class="file-link" target="_blank">
          Journey
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1RqT3JbW7DlF6Sh24Jt1fVjGEqUo6YrCi?usp=drive_link" class="file-link" target="_blank">
          Kerygma
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/11bNJId7tsS5FZSNu2tES7cwxY4wGy91i?usp=drive_link" class="file-link" target="_blank">
          Lakbay-Kalis
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1V6yjmTaDAI7rN020kARClBY7mktiKIpU?usp=drive_link" class="file-link" target="_blank">
          Life
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1H_5azWcfJVXLwmfSvkOHNJtiPSyH-N7B?usp=drive_link" class="file-link" target="_blank">
          Pencil
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1QeKIn4OBk2dmqW0jkVOex7zXFnlxnPoK?usp=drive_link" class="file-link" target="_blank">
          Rich Young Man
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1Fu44kkJmmSJTcGZ8ZcQJT1Kc9phxveM6?usp=drive_link" class="file-link" target="_blank">
          Treasures of Joy
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1kiRl3GOH7FsF1ZZ5OrCWhf4EPdD2LdKL?usp=drive_link" class="file-link" target="_blank">
          Y.O.P.E.
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1cwBRStWXz-SA2E-ObEduyAkSljttd2AI?usp=drive_link" class="file-link" target="_blank">
          Youth Encounter
        </a>
            </ul>
          </div>
        </div>

        <div class="col-md-4 mx-auto">
          <div class="file-container">
            <h2 class="container-title">Music</h2>
            <ul class="file-list">
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1afq9UbYjDOEvVAK91Km6_WODahDDw4xg?usp=drive_link" class="file-link" target="_blank">
          Arise
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1j7LYOs5PFbfRXsToB8EXu_ivmeSJhoSr?usp=drive_link" class="file-link" target="_blank">
          Bible Camp
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1C6JS92NacQ5DZhhpVFLbCqg_fL0gQUes?usp=drive_link" class="file-link" target="_blank">
          Bibliodrama
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/1gB37ms3xp7bOaWQ7Yvc06oNZ5uRkN7aA?usp=drive_link" class="file-link" target="_blank">
          Pencil
        </a>
        <li class="file-list-item">
        <a href="https://drive.google.com/drive/folders/19nWtnBKVqVek8xIkKAqjrTeS8OHVcsD8?usp=drive_link" class="file-link" target="_blank">
          Youth Encounter
        </a>
            </ul>
          </div>
        </div>

        <!-- Add more columns (containers) as needed -->
      </div>
    </div>
  </section>
</body>
</html>
