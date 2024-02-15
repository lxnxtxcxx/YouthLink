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
  ?>
<!-- profile.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      background-color: #f8f8f8;
      color: #333333;
      margin-bottom: 10px;
    }

    .navbar {
      background-color: #F6BE00;
    }
    .navbar-brand {
      color: #fff;
    }
    .nav-link {
      color: #fff;
    }


    .card-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      margin: 20px;
      text-align: center;
    }

    /* Profile Section Styles */
    .profile-section {
      padding: 10px 0;
    }

    .profile-card {
      text-align: left;
      margin-bottom: 20px;
    }

    .profile-label {
      font-weight: bold;
    }

    .profile-info {
      margin-bottom: 10px;
    }

    .edit-button, .show-password-button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .edit-button:hover, .show-password-button:hover {
      background-color: #0056b3;
    }

    .form-control {
      width: 100%;
    }

    .save-button {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .save-button:hover {
      background-color: #218838;
    }

    .cancel-button {
      background-color: #dc3545;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .cancel-button:hover {
      background-color: #c82333;
    }

    .edit-form {
      display: none;
    }

  </style>
</head>
<body>
  <!-- Navigation bar -->
  <?php 
    include '../header.php';
    include '../nav-bar/admin-nav-bar.php';
  ?>

  <?php
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Profile section
    echo "<section class='section profile-section'>";
    echo "<div class='container'>";
    echo "<h2 class='section-title'>Admin Profile</h2>";

    // Profile cards
    echo "<div class='profile-card'>";
    echo "<div class='profile-label'>Username:</div>";
    echo "<div class='profile-info' id='profileUsername'>" . $row["username"] . "</div>";
    echo "</div>";

    echo "<div class='profile-card'>";
    echo "<div class='profile-label'>Password:</div>";
    echo "<div class='profile-info' id='profilePassword'>******</div>";
    echo "</div>";

    echo "<button class='edit-button' id='editProfileBtn'>Edit Profile</button>";

    // Close profile section and container
    echo "</div></section>";

    // Edit Profile Form
    echo "<form class='edit-form' id='editProfileForm'>";
    echo "<div class='form-group'>";
    echo "<label for='username'>Username:</label>";
    echo "<input type='text' class='form-control' id='username' value='" . $row["username"] . "'>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='password'>Password:</label>";
    echo "<input type='password' class='form-control' id='password' value='". $row["password"] . "'>";

    echo "<br>";

    echo "<button type='button' class='show-password-button' id='showPasswordBtn'>Show Password</button>";
    echo "</div>";

    echo "<button type='button' class='save-button' id='saveProfileBtn'>Save</button>";
    echo "<button type='button' class='cancel-button' id='cancelEditBtn'>Cancel</button>";

    echo "</form>";
} else {
    echo "No results found for the current user.";
}

// Close connections
$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Initial state: Display profile information
        $(".edit-form").hide();

        // Edit Profile button click event
        $("#editProfileBtn").click(function () {
            // Toggle between view and edit modes
            $(".profile-info").toggle();
            $(".edit-form").toggle();
        });

        // Save Profile button click event
$("#saveProfileBtn").click(function () {
    // Collect updated data
    var formData = {
        action: 'updateProfile',
        username: $("#username").val(),
        password: $("#password").val(),
    };

            // Send data to server using AJAX
            $.ajax({
                type: "POST",
                url: "admin_database_update.php", // Replace with the actual file name
                data: formData,
                success: function (response) {
                    // Display server response
                    alert(response);

                    // Update the displayed profile information
                    $(".profile-info").toggle();
                    $(".edit-form").toggle();
                },
                error: function (error) {
                    // Handle errors
                    console.log(error);
                }
            });
        });

        // Cancel Edit button click event
        $("#cancelEditBtn").click(function () {
            // Toggle back to view mode without saving changes
            $(".profile-info").toggle();
            $(".edit-form").toggle();
        });

        // Show Password button click event
        $("#showPasswordBtn").click(function () {
            var passwordField = $("#password");
            var passwordType = passwordField.attr('type');

            // Toggle between password and text
            passwordField.attr('type', passwordType === 'password' ? 'text' : 'password');
        });
    });
</script>

</body>
</html>
