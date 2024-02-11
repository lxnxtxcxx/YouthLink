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
    echo "<div class='profile-label'>First Name:</div>";
    echo "<div class='profile-info' id='profileFirstName'>" . $row["firstname"] . "</div>";
    echo "</div>";

  echo "<div class='profile-card'>";
  echo "<div class='profile-label'>Last Name:</div>";
  echo "<div class='profile-info' id='profileLastName'>" . $row["lastname"] . "</div>";
  echo "</div>";

    echo "<div class='profile-card'>";
    echo "<div class='profile-label'>Username:</div>";
    echo "<div class='profile-info' id='profileUsername'>" . $row["username"] . "</div>";
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

    echo "<div class='profile-card'>";
    echo "<div class='profile-label'>Email Address:</div>";
    echo "<div class='profile-info' id='profileEmail'>" . $row["email"] . "</div>";
    echo "</div>";

    echo "<div class='profile-card'>";
    echo "<div class='profile-label'>Contact Number:</div>";
    echo "<div class='profile-info' id='profileContactNumber'>" . $row["cnumber"] . "</div>";
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
    echo "<label for='firstname'>First Name:</label>";
    echo "<input type='text' class='form-control' id='firstname' value='" . $row["firstname"] . "'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='lastname'>Last Name:</label>";
    echo "<input type='text' class='form-control' id='lastname' value='" . $row["lastname"] . "'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='username'>Username:</label>";
    echo "<input type='text' class='form-control' id='username' value='" . $row["username"] . "'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='organization'>Organization:</label>";
    echo "<select id='organization' name='organization' class='form-control' required>";
    $organizations = array("Parish", "School", "Formation Team");

foreach ($organizations as $organization) {
    echo "<option value='" . $organization . "'>" . $organization . "</option>";
}

echo "</select>";
echo "</div>";

    echo "<div class='form-group'>";
echo "<label for='dropdownVicariate'>Vicariate:</label>";
echo "<select id='dropdownVicariate' name='vicariate' class='form-control'>";

$vicariates = array("vicariate 1", "vicariate 2", "vicariate 3", "vicariate 4", "vicariate 5", "vicariate 6", "vicariate 7", "vicariate 8", "vicariate 9", "vicariate 10", "vicariate 11", "vicariate 12", "vicariate 13", "vicariate 14");

foreach ($vicariates as $vicariate) {
    echo "<option value='" . $vicariate . "'>" . $vicariate . "</option>";
}

echo "</select>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='dropdownParish'>Parish:</label>";
echo "<select id='dropdownParish' name='parish' class='form-control'>";

$parishes = array(
    "St. Francis Xavier Parish", "Sto. Domingo De Silos Parish", "St. John the Baptist Parish - Lian",
            "St. Vincent Ferrer Parish - Tuy", "Nuestra Señora De La Paz Y Buen Viaje Parish", "Immaculate Conception Parish - Balayan",
            "St. Raphael the Archangel Parish", "Visitation of the Blessed Virgin Mary Parish", "St. Anthony of Padua Parish - Nasugbu",
            "St. Nicolas de Tolentino Parish", "Our Mother of Perpetual Help Parish - Agoncillo", "Our Lady of the Miraculous Medal Parish",
            "St. Roche Parish - Lemery", "Mahal na Poon ng Banal na Krus Parish", "Basilica of St. Martin de Tours",
            "San Isidro Labrador Parish - San Luis", "Invencion De La Sta. Cruz Parish", "San Isidro Labrador Parish - Cuenca",
            "St. Therese of the Child Jesus and of the Holy Face Parish - Sta. Teresita", "Archdiocesan Shrine of Our Lady of Caysasay",
            "St. Francis of Paola Parish", "St. Roche Parish - Tingloy", "Holy Family Parish - Bolo", "Immaculate Conception Parish - Bauan",
            "Our Mother of Perpetual Help Parish - Aplaya", "St. Mary Magdalene Parish", "San Pascual Baylon Parish",
            "Basilica of the Immaculate Conception", "St. Mary Euphrasia Parish", "Most Holy Trinity Parish", "Sta. Rita de Cascia Parish",
            "St. Isidore Parish", "San Lorenzo Ruiz Parish - Taysan", "Nuestra Senora de la Merced Parish", "St. Michael the Archangel",
            "St. Paul the Apostle", "St. Michael the Archangel", "Our Lady of the Holy Rosary Parish", "Holy Family Parish - Rosario",
            "San Juan Nepomuceno", "Most Holy Rosary Parish", "St. Joseph the Patriarch Parish", "St. James the Greater Parish",
            "St. Anthony of Padua Parish - Bolbok", "Our Lady of Peace and Good Voyage Parish", "Sto. Nino Parish - Pinagtong-ulan",
            "Immaculate Conception Parish - Mataas na Kahoy", "Divina Pastora Parish", "St. Vincent Ferrer Parish - Banaybanay",
            "Nuestra Señora De La Paz Y Buen Viaje Parish", "St. Sebastian Cathedral", "Mary Mediatrix of All Graces Parish",
            "Sto. Niño Parish - Marawoy", "St. Therese of the Child Jesus Parish", "St. Isidore Parish - Lipa",
            "St. Joseph the Worker Proposed Parish", "Immaculate Conception Parish - Malvar", "Nuestra Señora de la Soledad Parish",
            "St. John the Evangelist Parish", "St. Thomas Aquinas Parish", "St. Clare Assisi Parish", "St. Padre Pio National Shrine and Parish",
            "St. Augustine of Hippo Parish", "Queen of All Saints Parish", "Holy Family Flight to Egypt Parish", "San Guillermo Parish",
            "Immaculate Conception Parish - Laurel"
);

foreach ($parishes as $parish) {
    echo "<option value='" . $parish . "'>" . $parish . "</option>";
}

echo "</select>";
echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='email'>Email Address:</label>";
    echo "<input type='email' class='form-control' id='email' value='" . $row["email"] . "'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='contactNumber'>Contact Number:</label>";
    echo "<input type='tel' class='form-control' id='contactNumber' value='" . $row["cnumber"] . "'>";
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
        fullName: $("#fullName").val(),
        username: $("#username").val(),
        organization: $("#organization").val(),
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
