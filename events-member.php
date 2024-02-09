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


<!-- news.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
      /* Custom styles */
body {
  background-color: #EEF5FF;
  color: #333333;
  margin-bottom: 60px;
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

/* Table Container Styles */
.table-container {
  display: flex;
  justify-content: center;
  align-items: center;

 
}

/* Table Styles */
table {
  width: 90%;
  border-collapse: collapse;
  margin-top: 10px;
  margin-bottom: 5px;
}

th, td {
  border: 2px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #DAA520;
  color: white;
}

/* Hover effect for the table rows */
tr:hover {
  background-color: #f5f5f5;
}
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <?php
    include 'header.php';
    include 'nav-bar/user-nav-bar.php';
  ?>
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
          <li class="nav-item active">
            <a class="nav-link" href="events-member.php">Events</a>
          </li>
          <li class="nav-item ">
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

<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>MODULE</th>
        <th>DESCRIPTION</th>
        <th>PARTICIPANTS</th>
        <th>DURATION</th>
        <th>CHARGES</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>Youth Encounter (Virac Model)</td>
      <td>3-day scripture-based formation program under the supervision of the CBCP-ECY that seeks to form the youth and those working with the youth into community builders for the church and the society.</td>
      <td>16yrs old & above</td>
      <td>3 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>Pencil Retreat</td>
      <td>2-day scripture-based retreat module, developed by Rev. Fr. Glenn Cantos and the youth ministers of Lipa, that aims to let "all the young people who will undergo this formation understand and experience deeply God's loving compassion and bring you to a greater appreciation of a special gift that He has given you: the gift of life! (Most. Rev. Rolando J. Tria Tirona, OCD, DD - Bishop Chairman-ECY 1999)"</td>
      <td>Grade 10 & above</td>
      <td>2 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>Journey Recollection</td>
      <td>A recollection module that is guided by the story of the two disciples going to a village called Emmaus. This module aims to help the participants reflect on their everyday journey as an individual and how they relate to people they meet on the road.</td>
      <td>Grade 9 & above</td>
      <td>1 day</td>
      <td>Php 40.00/kit</td>
    </tr>
    <tr>
      <td>Hands Recollection</td>
      <td>A module that is intended to let the young people reflect about themselves, their relationship towards people around them and how it affects being who they are; that God never intended man to be alone</td>
      <td>Grade 7 & above</td>
      <td>1 day</td>
      <td>Php 40.00/kit</td>
    </tr>
    <tr>
      <td>Rich Young Man Retreat</td>
      <td>1-2-day scripture-based module that focused on the appreciation of God-given talents, friends and God Rich Young Man Retreat Himself over the material things the world is offering right now.</td>
      <td>Grade 12 & above</td>
      <td>2 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>Samaritan Recollection</td>
      <td>A scripture-based module that seeks to understand the story of the Samaritan woman and the leper and how Jesus works in their life as how Jesus works in our life today.</td>
      <td>Those who have undergone different formation modules / 3rd year college to young professionals.</td>
      <td>1 day</td>
      <td>Php 40.00/kit</td>
    </tr>
    <tr>
      <td>Life is a Gift Recollection</td>
      <td>A scripture-based module that aims to let the young people appreciate life and make them realize that life Grade 10 or Grade 12 is really a gift from God.</td>
      <td>Grade 10 or Grade 12</td>
      <td>1 day</td>
      <td>Php 40.00/kit</td>
    </tr>
    <tr>
      <td>Treasure of Joy Recollection</td>
      <td>A non-scripture based module that aims to help the participants discover their own treasure and make them reflect on it</td>
      <td>Grade 6 and below</td>
      <td>1 day</td>
      <td>Php 40.00/kit</td>
    </tr>
    <tr>
      <td>Kerygmatic Retreat</td>
      <td>A scripture-based retreat module which serves as the culminating activity of those who completed the Youth Encounter 2 also known as Youth on Paschal Exodus (YOPE)</td>
      <td>Those who have undergone YOPE</td>
      <td>4 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>Bible Camp</td>
      <td>A camp module that tackles the basic things about the Bible. Aims to help the participants to get into themselves and reflect on it by going through the 12 station called A Travel to the Holy Land.</td>
      <td>Parish Youth/Campus Ministry</td>
      <td>2-3 days / 3 consecutive weeks (2 sessions)</td>
      <td>Php 80.00/kit</td>
    </tr>
     <tr>
        <td>Bibliodrama</td>
        <td>Aims to help the participants to get into themselves and reflect on it by going through the 12 station called A Travel to the Holy Land.</td>
        <td>Grade 8 and above</td>
        <td>2-3 days / 3 consecutive weeks (2 sessions)</td>
        <td>Php 80.00/kit</td>
      </tr>
    <tr>
      <td>LAKBAY-KALIS</td>
      <td>A series of sessions that aim to make the participant understand the Journey of the Youth in the Parish - Kabataang Lingkod ng Inang Simbahan (KaLIS)</td>
      <td>Parish Youth/Campus Ministry</td>
      <td>13 consecutive weeks / 3 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>YOPE (Youth on Paschal Exodus)</td>
      <td>A series of sessions that tackle the Paschal Exodus. The participants should have attended the Youth Encounter (Virac Model.)</td>
      <td>Those who have undergone Youth Encounter</td>
      <td>13 consecutive weeks + 3 days retreat (Kerygmatic Retreat)</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>Arise</td>
      <td>4-day Seminar Workshop that is intended to let the participants understand the Youth Ministry, its components, phases, stages, etc.</td>
      <td>Parish Youth Leader/Campus Minister/Parish Lay Leaders</td>
      <td>4 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>Journey-FSW</td>
      <td>A 3-day Seminar workshop that is intended to help the youth leaders be more organized in preparing and conducting activities and programs for their youth</td>
      <td>Parish Youth/Campus Ministry</td>
      <td>3 days</td>
      <td>Php 80.00/kit</td>
    </tr>
    <tr>
      <td>YE-FSW</td>
      <td>A 4-day Seminar Workshop for aspiring facilitators who attended and completed the Youth Encounter (Virac model) conducted by the AYC-Formation Team</td>
      <td>Those who have undergone YE (Virac Model) conducted by the AYC-FT</td>
      <td>4/5 days</td>
      <td>Php 80.00/kit</td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>
  