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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouthLink</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    
    /* Custom styles */
    body {
      background-color: #DCF2F1;
      font-family: Arial, sans-serif;
    }
    .navbar {
      background-color: #7FC7D9;
    }
    .navbar-brand {
      color: #fff;
    }
    .nav-link {
      color: #fff;
    }
    .jumbotron{
      background-image: url('/background/try1.png');
    height: 300px;
    width: 100%;
    background-size: cover;
    background-position: center;
    }
    .jumbotron h1 {
      font-size: 48px;
    }
    .jumbotron p {
      font-size: 20px;
      margin-bottom: 0;
    }
    .card {
      border: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
    .card img {
      height: 200px;
      object-fit: cover;
    }
    .card-title {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .card-text {
      color: #777;
    }
    .footer {
      background-color: #F6BE00;
      color: #ffffff;
      padding: 5px 0;
      text-align: center;
      bottom: 0;
      width: 100%;
    }
    /* Add animation class for fade-in effect */
    .fade-in {
      opacity: 0;
      transform: translateY(50px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .fade-in-show {
      opacity: 1;
      transform: translateY(0);
    }
    /* Create a CSS Grid for the collage layout */
.image-collage {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Adjust the number of columns as needed */
    grid-gap: 10px; /* Adjust the gap between items */
}

/* Style each image item */
.image-item {
    position: relative;
}

/* Style the image within the item */
.image-item img {
    max-width: 100%;
    height: 100%;
    display: block;
    border: 2px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

  </style>
</head>
<body>

  <?php include 'header.php'; ?>
  <!-- Navigation -->
  <!-- <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index-member.php">YouthLink</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index-member.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events-member.php">Events</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="files-member.php">Files</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="appointment-member.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile-member.php"><?php echo $row["username"]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <!-- Jumbotron -->
  <div class="jumbotron">
    <div class="container">
      <h1>Welcome to Youthlink</h1>
      <p>Web-based Events Management System for Lipa Archdiocesan Youth Ministry - Formation Team</p>
    </div>
  </div>
  <!-- Main Content -->
   <div class="image-collage">
        <div class="image-item">
            <img src="/images/11.jpg" alt="Image 1">
        </div>

        <div class="image-item">
            <img src="/images/2.jpg" alt="Image 2">
        </div>

        <div class="image-item">
            <img src="/images/3.jpg" alt="Image 3">
        </div>

        <div class="image-item">
            <img src="/images/4.jpg" alt="Image 3">
        </div>

        <div class="image-item">
            <img src="/images/5.jpg" alt="Image 3">
        </div>

        <div class="image-item">
            <img src="/images/6.jpg" alt="Image 3">
        </div>
        <!-- Add more image items as needed -->
    </div>
    <br>
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>© 2023 YouthLink. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
    
window.addEventListener('scroll', animateOnScroll);

function animateOnScroll() {
  var fadeInElements = document.getElementsByClassName('fade-in');

  for (var i = 0; i < fadeInElements.length; i++) {
    var element = fadeInElements[i];
    var positionFromTop = element.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (positionFromTop - windowHeight <= 0) {
      element.classList.remove('fade-in-show'); // Remove the class
      void element.offsetWidth; // Trigger a reflow to restart the animation
      element.classList.add('fade-in-show'); // Add the class again to trigger the animation
    }
  }
}

// Run the initial animation check on page load
animateOnScroll();

// Adjust layout based on window width
function adjustLayout() {
  var windowWidth = window.innerWidth;

  if (windowWidth < 768) {
    // For small screens, stack the cards vertically
    var cards = document.getElementsByClassName('card');
    for (var i = 0; i < cards.length; i++) {
      cards[i].classList.add('flex-column');
    }
  } else {
    // For larger screens, reset the card layout
    var cards = document.getElementsByClassName('card');
    for (var i = 0; i < cards.length; i++) {
      cards[i].classList.remove('flex-column');
    }
  }
}

// Adjust layout on page load
adjustLayout();

// Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>
</html>
