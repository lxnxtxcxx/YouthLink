<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouthLink</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <!-- jQuery-->
  <script src="path/to/jquery/jquery.min.js"></script>
  <script src="path/to/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
    /* Custom styles */
    body {
      background-color: #fffff6;
      font-family: Arial, sans-serif;
    }

    .navbar {
      background-color: #f6be00;
    }

    .navbar-brand {
      color: #fff;
    }

    .nav-link {
      color: #fff;
    }

    .jumbotron {
      align-self: center;
      background-color: #fffff6;
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
      position: relative;
      background-color: #f6be00;
      color: #ffffff;
      padding: 5px 0;
      text-align: center;
      bottom: 0;
      width: 100%;
      padding-block: 10px;
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
      grid-template-columns: repeat(2,
          1fr);
      /* Adjust the number of columns as needed */
      grid-gap: 10px;
      /* Adjust the gap between items */
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

    .form-group label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .font-size-12 {
      font-size: 12px;
    }

    .font-color-main {
      color: #4c0000;
    }

    /* Carousel */
    .display-area {
      width: 100%;
      max-width: 970px;
      overflow-x: hidden;
      margin: auto;
    }

    .card {
      height: 400px;
      background-color: rgba(0, 0, 0, 0.4);
      border-radius: 4px;
      color: white;
      font-size: 40px;
      margin: 10px;
      flex: 800px 0 0;
    }

    .card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      background-size: cover;
    }

    .cards-wrapper {
      display: flex;
      transition: ease 0.5s;
    }

    .dots-wrapper {
      display: none;
      justify-content: center;
      margin: auto;
    }

    .wrapper {
      max-width: 1110px;
      margin-inline: auto;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .jumbotron-wrapper {
      position: relative;
      width: 100%;
      height: 300px;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .jumbotron-wrapper img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .jumbotron-wrapper .jumbotron-text {
      position: relative;
      top: 30%;
      left: 8%;
      z-index: 4;
    }

    .item {
      height: 500px;
    }

    .carousel-indicators li {
      margin-inline: 6px;
    }

    .footer {
      padding: 0;
      background-color: #fffaa0;
    }

    .footer-about-us {
      padding: 40px;
      color: black;

      width: 1110px;
      margin-inline: auto;
    }

    .footer-bottom-text {
      padding: 20px;
      bottom: 0;
      background-color: #f6be00;
    }

    .need-help {
      text-align: left;
    }

    .footer-cards {
      display: flex;
      flex-wrap: wrap;
      row-gap: 40px;
    }

    .footer-card {
      display: flex;
      flex-direction: column;
      gap: 8px;
      width: 50%;
    }

    .footer-card-item {
      display: flex;
      flex-direction: column;
      width: 100px;
      gap: 10px;
    }

    .footer-card-label {
      font-weight: semibold;
      font-size: 20px;
    }

    .heavy {
      font-weight: bold;
    }

    .navbar-buttons {
      float: right;
    }

    .carousel-item {
      height: 600px;
      width: 900px;
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <?php
  $servername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "youthlink";

  $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

  $all_organization_sql = "SELECT * FROM `organization`";
  $all_organization = mysqli_query($conn, $all_organization_sql);

  $all_parish_sql = "SELECT * FROM `parish`";
  $all_parish = mysqli_query($conn, $all_parish_sql);

  ?>

  <!-- Modal Login Form-->
  <div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="Log_in_page.php" method="POST">
            <div class="form-group row justify-content-between">
              <label for="username" class="col-sm-2 col-form-label font-color-main">Username:</label>
              <div class="col-sm-9">
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="password" class="col-sm-2 col-form-label font-color-main">Password:</label>
              <div class="col-sm-9">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="organization" class="col-sm-2 col-form-label font-color-main">Organization:</label>
              <div class="col-sm-9">
                <select id="organization" name="organization" class="form-control" required>
                  <?php
                  while ($organization = mysqli_fetch_array(
                    $all_organization,
                    MYSQLI_ASSOC
                  )) :;
                  ?>
                    <option value="<?php echo $organization["organization_type"];
                                    ?>">
                      <?php echo $organization["organization_type"];;
                      ?>
                    </option>
                  <?php
                  endwhile;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Login</button>
            </div>
            <div class="form-group sign-up">
              <h1 class="font-size-12">
                <p>Don't have an account?
                  <a href="#" data-toggle="modal" data-target="#signUpModal">Sign up Here!</a>
                </p>
              </h1>
            </div>
            <div class="form-group sign-up">
              <h2 class="font-size-12"> <a href="Admin_Login_page.html">Continue as Admin</a>
              </h2>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Sign Up Form-->
  <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form id="signup-form" action="signup_process.php" method="post">
            <h2>Sign Up</h2>
            <div class="form-group row justify-content-between">
              <label for="firstname" class="col-sm-2 col-form-label font-color-main">First Name</label>
              <div class="col-sm-9">
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name" required>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="lastname" class="col-sm-2 col-form-label font-color-main">Last Name</label>
              <div class="col-sm-9">
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" required>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="email" class="col-sm-2 col-form-label font-color-main">Email</label>
              <div class="col-sm-9">
                <input type="text" id="email" name="email" class="form-control" placeholder="(ex.) email@gmail.com" required>
              </div>
            </div>
            <div class="form-group  row justify-content-between">
              <label for="cnumber" class="col-sm-2 col-form-label font-color-main">Contact No.</label>
              <div class="col-sm-9">
                <input type="text" id="cnumber" name="cnumber" class="form-control" placeholder="(ex.) 09212345678" required>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="organization" class="col-sm-2 col-form-label font-color-main">Organization</label>
              <div class="col-sm-9">
                <select id="organization" name="organization" class="form-control" required>
                  <?php
                  mysqli_data_seek($all_organization, 0);
                  while ($organization = mysqli_fetch_array($all_organization, MYSQLI_ASSOC)) :;
                  ?>
                    <option value="<?php echo $organizations["organization_type"]; ?>">
                      <?php echo $organization["organization_type"]; ?>
                    </option>
                  <?php endwhile ?>
                </select>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="dropdown" class="col-sm-2 col-form-label font-color-main">Vicariate:</label>
              <div class="col-sm-9">
                <select id="dropdown" name="vicariate" class="form-control" required>
                  <?php
                  $count = 1;
                  while ($count <=  10) :;
                  ?>
                    <option value="vicariate <?php echo $count; ?>">
                      vicariate <?php echo $count;
                                $count++; ?>
                    </option>
                  <?php
                  endwhile;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row justify-content-between">
              <label for="dropdown" class="col-sm-2 col-form-label font-color-main">Parish:</label>
              <div class="col-sm-9">
                <select id="dropdown" name="parish" class="form-control" required>
                  <?php
                  while (
                    $parish = mysqli_fetch_array(
                      $all_parish,
                      MYSQLI_ASSOC
                    )
                  ) :;
                  ?>
                    <option value="<?php echo $parish["parish"];
                                    ?>">
                      <?php echo $parish["parish"];
                      ?>
                    </option>
                  <?php
                  endwhile;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group  row justify-content-between">
              <label for="username" class="col-sm-2 col-form-label font-color-main">Username </label>
              <div class="col-sm-9">
              <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
  
              </div>
            </div>
            <div class="form-group  row justify-content-between">
              <label for="password" class="col-sm-2 col-form-label font-color-main">Password</label>
              <div class="col-sm-9">
              <input type="text" id="password" name="password" class="form-control" placeholder="Enter your password" required>
              </div>
            </div>
            <div class="form-group d-block w-50">
              <button type="submit" class="btn btn-outline-primary mx-auto">Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html">You✞hLink</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto navbar-buttons">
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="wrapper">
    <div class="jumbotron-wrapper">
      <img src="./assets/images/try1.png" alt="" />
      <div class="jumbotron-text">
        <h1>Welcome to YouthLink</h1>
        <p>
          Web-based Events Management System for Lipa Archdiocesan Youth
          Ministry - Formation Team
        </p>
      </div>
    </div>
    <div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/images/carousel1.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/carousel2.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/carousel3.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/carousel4.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/carousel5.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="./assets/images/carousel6.jpg" class="d-block w-100" alt="">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer" id="about">
    <div class="footer-about-us">
      <div class="need-help">Need Help? Contact Us</div>
      <div class="footer-cards">
        <div class="footer-card">
          <div class="footer-card-label">Our Address</div>
          <div>Lipa, Batangas</div>
        </div>

        <div class="footer-card">
          <div class="footer-card-label">Email Us</div>
          <div>laym.formationteam@egmail.com</div>
        </div>
        <div class="footer-card">
          <div class="footer-card-label">Call Us</div>
          <div>+63 912 345 6789</div>
        </div>
        <div class="footer-card">
          <div class="footer-card-label">Opening Hours</div>
          <div><span class="heavy">Mon-Fri:</span> 9:00 AM - 5:00 PM</div>
          <div><span class="heavy">Sat-Sun:</span> Closed</div>
        </div>
      </div>
    </div>
    <div class="footer-bottom-text">
      © 2023 YouthLink. All rights reserved.
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Close Modal 2 when Modal 1 is shown
      $("#signUpModal").on('show.bs.modal', function() {
        $("#loginModal").modal('hide');
      });

      // Close Modal 1 when Modal 2 is shown
      $("#loginModal").on('show.bs.modal', function() {
        $("#signUpModal").modal('hide');
      });
    });

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
      anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>

</html>