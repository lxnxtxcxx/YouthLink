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

<!-- profile.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheet.css">
  <style>
    
    /* Custom styles */
    body {
      background-color: #f8f8f8;
      color: #333333;
      margin-bottom: 10px;
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

  </style>
</head>

<body>
  <?php
      include 'header.php';
      include 'nav-bar/user-nav-bar.php';

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

    // Profile section
        echo "<section class='section profile-section'>";
        echo "<div class='container'>";
        echo "<h2 class='section-title'>User Profile</h2>";

    // Profile cards
        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Username:</div>";
        echo "<div class='profile-info' id='profileUsername'>" . $row["username"] . "</div>";
        echo "</div>";
        
        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Full Name:</div>";
        echo "<div class='profile-info' id='profileFirstName'>" . $row["firstname"] . " " . $row["lastname"] . "</div>";
        echo "</div>";

        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Email Address:</div>";
        echo "<div class='profile-info' id='profileEmail'>" . $row["email"] . "</div>";
        echo "</div>";

        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Contact Number:</div>";
        echo "<div class='profile-info' id='profileContactNumber'>" . $row["cnumber"] . "</div>";
        echo "</div>";

        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Organization:</div>";
        echo "<div class='profile-info' id='profileOrganization'>" . $row["organization"] . "</div>";
        echo "</div>";

        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Vicariate:</div>";
        echo "<div class='profile-info' id='profileVicariate'>" . $row["vicariate"] . "</div>";
        echo "</div>";

        echo "<div class='profile-card'>";
        echo "<div class='profile-label'>Parish:</div>";
        echo "<div class='profile-info' id='profileParish'>" . $row["parish"] . "</div>";
        echo "</div>";

        echo "<button class='edit-button' id='editProfileBtn' href='#' data-toggle='modal' data-target='#editProfile'>Edit Profile</button>";

        // Close profile section and container
        echo "</div></section>";
      ?> 

    <!-- Modal Sign Up Form-->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-4">
                <form class='edit-form' id='editProfileForm'>
                    <div class="form-group">
                    <h2>Edit Profile</h2>
                    </div>

                <!-- First Name -->
                <div class="form-group row justify-content-between">
                <label for="firstname" class="col-sm-2 col-form-label font-color-main">First Name</label>
                <div class="col-sm-9">
                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $row["firstname"] ?>">
                </div>
                </div>

                <!-- Last Name -->
                <div class="form-group row justify-content-between">
                <label for="lastname" class="col-sm-2 col-form-label font-color-main">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $row["lastname"] ?>">
                </div>
                </div>

                <!-- Email Number -->
                <div class="form-group row justify-content-between">
                <label for="email" class="col-sm-2 col-form-label font-color-main">Email Address</label>
                <div class="col-sm-9">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter New Email" value="<?php echo $row["email"] ?>">
                </div>
                </div>

                <!-- Contact Number -->
                <div class="form-group row justify-content-between">
                    <label for="cnumber" class="col-sm-2 col-form-label font-color-main">Contact No.</label>
                    <div class="col-sm-9">
                        <input type="text" id="cnumber" name="cnumber" class="form-control" placeholder="Enter New Password" maxlength="11" pattern="09\d{9}" title="Please enter a valid phone number starting with '09'" value="<?php echo $row["cnumber"] ?>">
                    </div>
                </div>

                <!-- Vicariate -->
                <div class="form-group row justify-content-between">
                    <label for="dropdownVicariate" class="col-sm-2 col-form-label font-color-main">Vicariate:</label>
                    <div class="col-sm-9">
                        <select id="dropdownVicariate" name="vicariate" class="form-control" value="<?php echo "test" ?>">
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

                <!-- Parish -->
                <div class="form-group row justify-content-between">
                    <label for="dropdownParish" class="col-sm-2 col-form-label font-color-main">Parish:</label>
                    <div class="col-sm-9">
                        <select id="dropdownParish" name="parish" class="form-control" value="<?php echo $row["parish"] ?>">
                        <?php
                        $all_parish_sql = "SELECT * FROM `parish`";
                        $all_parish = mysqli_query($conn, $all_parish_sql);

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

                <!-- Password -->
                <div class="form-group row justify-content-between">
                    <label for="password" class="col-sm-2 col-form-label font-color-main">Password</label>
                    <div class="col-sm-9 d-flex flex-row">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter New Password" required minlength="8"  value="<?php echo $row["password"] ?>">
                        <button type='button' class="btn btn-outline-primary" id='showPasswordBtn'>👁</button>
                    </div>
                </div>

                <div class="form-group d-block w-100 text-center">
                    <button type='button' class='save-button' id='saveProfileBtn'>Save</button>
                    <button type='button' class='cancel-button' id='cancelEditBtn'>Cancel</button>
                </div>

            </form>
            </div>
        </div>
        </div>
  </div>
  <?php 
    } else {
        echo "No results found for the current user.";
    }
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

        // Save Profile button click event
        $("#saveProfileBtn").click(function () {
            // Collect updated data
            var formData = {
                action: 'updateProfile',
                firstName: $("#firstname").val(),
                lastName: $("#lastName").val(),
                vicariate: $("#dropdownVicariate").val(),
                parish: $("#dropdownParish").val(),
                email: $("#email").val(),
                contactNumber: $("#contactNumber").val(),
                password: $("#password").val(),
            };

            // Send data to server using AJAX
            $.ajax({
                type: "POST",
                url: "database_update.php", // Replace with the actual file name
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
