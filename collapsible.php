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

    .collapsible {
    background-color: #eee;
    margin-left:42.5%;
    margin-top:10px;
    color: #444;
    cursor: pointer;
    padding: 1px;
    width: 15%;
    border: none;
    text-align: center;
    outline: none;  
    font-size: 25px;
    margin-bottom: 20px; /* Add some margin between buttons */
  }

  .content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    margin-left: 42.5%;
    background-color: #fff;
    font-style:italic;
    
  }

    .file-list-item {
      color:#212529;
      list-style-type: square;
      margin-bottom: 3px;
    }

    .file-link {    
      font-size: 18px;
      color: #212529;
      text-decoration: none;
      font-weight: 100%;
    }

  </style>
</head>
<body>
  <!-- Navigation bar -->
  <?php
      include 'header.php';
      include 'nav-bar/user-nav-bar.php';
  ?>
    

  <!-- Files Section -->
        <button class="collapsible">Form</button>
        <div class="content">
              <li class="file-list-item">
        <a href="https://docs.google.com/document/d/1SScIDHAjlfQmVnIFyj1AJHHU84zaoja2/edit?usp=sharing&ouid=117690929165865719807&rtpof=true&sd=true" class="file-link" target="_blank">
          Participants List Form
        </a>
      </li>
        </div>

        <button class="collapsible">Handouts</button>
        <div class="content">
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
        </div>

        <button class="collapsible">Music</button>
        <div class="content">
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
        </div>

        <script>
        // Get all collapsible buttons and content
        const collapsibleBtns = document.querySelectorAll('.collapsible');
        const contents = document.querySelectorAll('.content');

        // Add event listener to each button
        collapsibleBtns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
            // Toggle display for the corresponding content section
            if (contents[index].style.display === 'block') {
                contents[index].style.display = 'none';
            } else {
                // Hide other content sections before displaying this one
                contents.forEach((content, i) => {
                if (i !== index) {
                    content.style.display = 'none';
                }
                });
                contents[index].style.display = 'block';
            }
            });
        });
        </script>
</body>
</html>
