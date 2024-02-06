<?php
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
        $loginText = 'Sign Out';
    } else {
        $loginText = 'Login';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap CSS -->

  <style>
    .username {
    	color: white;
        background: none;
        border: none;
    }
    
    .username:hover {
        color: black;
        background: none;
        border: none;
    }
    .username:focus,
    .username:active {
        outline: none;
        box-shadow: none;
    }

    .dropdown-menu {
        background-color: rgba(255, 255, 255, 0.75);
    }
    
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html">You✞hLink</a>
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
          <li class="dropdown">
            <a class="nav-link dropdown-toggle username" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $row["firstname"]?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?php echo ($row["organization"] === 'admin') ? 'profile-member.php' : 'profile_client.php'; ?>">Profile</a>
                <a class="dropdown-item" href="<?php echo ($row["organization"] === 'admin') ? 'appointment_list.php' : 'appointment-client.php'; ?>">Appointment</a>

                <!-- Hide Files link if org = 'admin' -->
                <?php
                    if ($row["organization"] !== 'admin') {
                        $filesLink = ($row["organization"] === 'School' || $row["organization"] === 'Parish') ? 'files-client.php' : 'files-member.php';
                        echo '<a class="dropdown-item" href="' . $filesLink . '">Files</a>';
                    }
                ?>
                <a class="dropdown-item" href="index.html"><?php echo $loginText ?></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>