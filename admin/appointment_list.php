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


<!-- appointment_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment List</title>
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
    .event-list-container { 
      margin: 0 auto; width: 95%;
    } 
.event-list-table { 
border-collapse: collapse; width: 100%; 
} 
.event-list-table th, .client-list-table td { 
border: 1px solid #ddd; padding: 8px; text-align: left; 
} 
.event-list-table th { 
background-color: #4CAF50; color: white; 
} 
.event-list-table tr:nth-child(even) { 
background-color: #f2f2f2; 
}
 .event-list-table tr:hover { 
 background-color: #ddd; 
} 
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <?php 
    include '../header.php';
    include '../nav-bar/admin-nav-bar.php';
  ?>
  <!-- <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" >YouthLink</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="appointment_list.php">Appointment List</a>
          </li>
          <li class="nav-item ">
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
  </nav> -->

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
$sql = "SELECT * FROM appointment_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the table and table headings
    echo "<div class='event-list-container'><table class='event-list-table'><tr><th>ID</th><th> From</th><th> To</th><th>Event</th><th>Vicariate</th><th>Parish</th><th>Contact Person</th><th>Contact Number</th><th>Venue</th><th>Remarks</th></tr>";

    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["eventDateFrom"] . "</td><td>" . $row["eventDateTo"] . "</td><td>" . $row["event"] . "</td><td>" . $row["vicariate"] . "</td><td>" . $row["parish"] . "</td><td>" . $row["contactPerson"] . "</td><td>" . $row["contactNumber"] . "</td><td>" . $row["venue"] . "</td><td>" . $row["remarks"] . "</td></tr>";
    }

    echo "</table></div>";
} else {
    echo "No results found";
}

// Close connections
$conn->close();
?>

<script>
    function refreshPage() {
    location.reload(true);
}
    var sortOrder = {}; // Store sorting order for each column

    // Function to sort table data
    function sortTable(columnIndex) {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.querySelector('.event-list-table');
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
    var headers = document.querySelectorAll('.event-list-table th');
    headers.forEach(function (header, index) {
      header.addEventListener('click', function () {
        sortTable(index);
      });
    });
  </script>

</body>
</html>
