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
$sql = "SELECT * FROM admin_data WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  }
  ?>

<!-- member_list.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member List</title>
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
      color: #fff;
    }
    .nav-link {
      color: #fff;
    }

    .container {
      padding-top: 5px;
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
    .client-list-container { 
      margin: 0 auto; width: 90%; 
    } 
.client-list-table { 
border-collapse: collapse; width: 100%; 
} 
.client-list-table th, .client-list-table td { 
border: 1px solid #ddd; padding: 8px; text-align: left; 
} 
.client-list-table th { 
background-color: #4CAF50; color: white; 
} 
.client-list-table tr:nth-child(even) { 
background-color: #f2f2f2; 
}
 .client-list-table tr:hover { 
 background-color: #ddd; 
} 
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" >YouthLink</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="appointment_list.php">Appointment List</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="member_list.php">Member List</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="admin-profile.php"><?php echo $row["username"]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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

// SQL query to fetch data from the database
$sql = "SELECT * FROM user_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the table and table headings
echo "<div class='client-list-container'><table class='client-list-table'><tr><th>ID</th><th>Name</th><th>Username</th><th>Organization</th><th>Vicariate</th><th>Parish</th><th>Email</th><th>Contact Number</th><th>Password</th></tr>";

// Loop through each row and display the data
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["username"] . "</td><td>" . $row["organization"] . "</td><td>" . $row["vicariate"] . "</td><td>" . $row["parish"] . "</td><td>" . $row["email"] . "</td><td>" . $row["cnumber"] . "</td><td>" . $row["password"] . "</td></tr>";
}


    // Close the table and container
    echo "</table></div>";
} else {
    echo "0 results";
}

// Close connections
$conn->close();
?>

<script>
    var sortOrder = {}; // Store sorting order for each column

    // Function to sort table data
    function sortTable(columnIndex) {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.querySelector('.client-list-table');
      switching = true;

      // Determine the sorting order for the current column
      sortOrder[columnIndex] = sortOrder[columnIndex] === 'asc' ? 'desc' : 'asc';

      while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
          shouldSwitch = false;

          x = rows[i].getElementsByTagName('td')[columnIndex].innerText.toLowerCase();
          y = rows[i + 1].getElementsByTagName('td')[columnIndex].innerText.toLowerCase();

          if ((sortOrder[columnIndex] === 'asc' && x > y) || (sortOrder[columnIndex] === 'desc' && x < y)) {
            shouldSwitch = true;
            break;
          }
        }

        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }

    // Add click event listeners to table headers for sorting
    var headers = document.querySelectorAll('.client-list-table th');
    headers.forEach(function (header, index) {
      header.addEventListener('click', function () {
        sortTable(index);
      });
    });
  </script>

</body>
</html>
