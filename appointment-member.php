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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_email = "acct0028@gmail.com"; // Replace with your email address

    $eventDateFrom = $_POST['eventDateFrom'];
    $eventDateTo = $_POST['eventDateTo'];
    $event = $_POST['event'];
    $vicariate = $_POST['vicariate'];
    $parish = $_POST['parish'];
    $contactPerson = $_POST['contactPerson'];
    $contactNumber = $_POST['contactNumber'];
    $venue = $_POST['venue'];
    $remarks = $_POST['remarks'];
    $file = $_FILES['file'];

    $to = $admin_email;
    $subject = "New Appointment Request";
    $headers = "From: $contactPerson <$contactNumber>";
    $message = "New appointment request:\n\n";
    $message .= "Event Date From: $eventDateFrom\n";
    $message .= "Event Date To: $eventDateTo\n";
    $message .= "Event: $event\n";
    $message .= "Vicariate: $vicariate\n";
    $message .= "Parish: $parish\n";
    $message .= "Contact Person: $contactPerson\n";
    $message .= "Contact Number: $contactNumber\n";
    $message .= "Venue: $venue\n";
    $message .= "Remarks: $remarks\n";

    // Handle file upload
    if ($file["error"] == UPLOAD_ERR_OK) {
        $filename = basename($file["name"]);
        $destination = "/path/to/upload/directory/" . $filename; // Replace with your upload directory
        if (move_uploaded_file($file["tmp_name"], $destination)) {
            $message .= "File uploaded: $filename\n";
        } else {
            $message .= "Error uploading file: " . $file["error"] . "\n";
        }
    }

    if (mail($to, $subject, $message, $headers)) {
        echo "Appointment request has been sent. Thank you!";
    } else {
        echo "Error sending appointment request. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheet.css">

  <style>
    /* Custom styles */
    body {
      background-color: #f8f8f8;
      color: #333333;
      margin-bottom: 60px;
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
      padding: 5px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      margin: 10px;
      text-align: center;
}
.custom-container {
      display: inline-block; /* Display containers side by side */
      width: 100%; /* Set the width of each container (adjust as needed) */
      margin: 1%; /* Add some margin to separate the containers */
      background-color: #f0f0f0; /* Background color of the containers */
      padding: 5px; /* Padding around the content inside the containers */
      box-sizing: border-box; /* Include padding in the width */
    }
    .form-group {
  margin-bottom: 5px; /* Add space between form elements */
  margin-left: 5px;
}

.form-control {
  width: 100%; /* Make form elements expand to full width */
}

h1 {
  color: maroon;
}

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}
h6 {
  position: center;
}

section {
  margin-bottom: 2rem;
}

form {
  margin-top: 1rem;
}

form label {
  display: block;
  margin-top: 1rem;
}

form input,
form textarea {
  width: 100%;
  padding: 0.5rem;
  margin-top: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 0.5rem 1rem;
  background-color: maroon;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
h2{
  text-align: center;
  font-size: 25px;
}

/* Styles for the event form */
#event-form {
    margin-top: 5px;
    text-align: left;
}

#event-form h2 {
    font-size: 20px;
}

#eventDate, #eventName {
    width: 100%;
    padding: 5px;
    margin: 5px 0;
}

/* Styles for the events list */
#events {
    margin-top: 20px;
    text-align: center;
}

#events h2 {
    font-size: 20px;

}

#eventList {
    list-style: none;
    padding: 0;
}

#eventList li {
    font-size: 16px;
    margin-bottom: 5px;
}

/* Styles for hover effect on days */
.day:hover {
    background-color: #f0f0f0;
}

  </style>
</head>
<body>
  <!-- Navigation bar -->
  <?php 
    include 'header.php';
    include 'nav-bar/user-nav-bar.php';
  ?>

 <!-- Page Content -->
 <h2 class="pt-5">Set an Appointment</h2>
<div class="custom-container">
 <div class="row">
    <div class="col-md-6">
      <section>
        <form method="post" action="appointment.php" enctype="multipart/form-data">
          <div id="event-form">
            <div class="row">
 <div class="col-md-6">
    <div class="form-group">
      <label for="eventDateFrom">From:</label>
      <input type="date" id="eventDateFrom" name="eventDateFrom" class="form-control" required>
    </div>
 </div>
 <div class="col-md-6">
    <div class="form-group">
      <label for="eventDateTo">To:</label>
      <input type="date" id="eventDateTo" name="eventDateTo" class="form-control" required>
    </div>
 </div>
</div>
            
            <div class="form-group">
              <label for="dropdown">Event:</label>
              <select id="dropdown" name="event" class="form-control" required>
                <option value="Arise">Arise</option>
                <option value="Bible Camp">Bible Camp</option>
                <option value="Bibliodrama">Bibliodrama</option>
                <option value="Bibliodrama">Hands Recollection</option>
                <option value="Journey – FSW">Journey – FSW</option>
                <option value="Journey Recollection">Journey Recollection</option>
                <option value="Kerygmatic Retreat">Kerygmatic Retreat</option>
                <option value="LAKBAY-KaLIS">LAKBAY-KaLIS</option>
                <option value="Life is a Gift Recollection">Life is a Gift Recollection</option>
                <option value="Pencil Retreat">Pencil Retreat</option>
                <option value="Rich Young Man Retreat">Rich Young Man Retreat</option>
                <option value="Samaritan Recollection">Samaritan Recollection</option>
                <option value="Treasure of Joy Recollection">Treasure of Joy Recollection</option>
                <option value="YE - FSW">YE - FSW</option>
                <option value="Youth Encounter">Youth Encounter</option>
                <option value="YOPE (Youth On Paschal Exodus)">YOPE (Youth On Paschal Exodus)</option>
              </select>
            </div>
            <div class="form-group">
              <label for="dropdown">Vicariate:</label>
              <select id="dropdown" name="vicariate" class="form-control" required>
                <option value="vicariate 1">vicariate 1</option>
                <option value="vicariate 2">vicariate 2</option>
                <option value="vicariate 3">vicariate 3</option>
                <option value="vicariate 4">vicariate 4</option>
                <option value="vicariate 5">vicariate 5</option>
                <option value="vicariate 6">vicariate 6</option>
                <option value="vicariate 7">vicariate 7</option>
                <option value="vicariate 8">vicariate 8</option>
                <option value="vicariate 9">vicariate 9</option>
                <option value="vicariate 10">vicariate 10</option>
                <option value="vicariate 11">vicariate 11</option>
                <option value="vicariate 12">vicariate 12</option>
                <option value="vicariate 13">vicariate 13</option>
                <option value="vicariate 14">vicariate 14</option>
              </select>
            </div>
            <div class="form-group">
              <label for="dropdown">Parish:</label>
              <select id="dropdown" name="parish" class="form-control" required>
                <option value="St. Francis Xavier Parish">St. Francis Xavier Parish</option>
                <option value="Sto. Domingo De Silos Parish">Sto. Domingo De Silos Parish</option>
                <option value="St. John the Baptist Parish - Lian">St. John the Baptist Parish - Lian</option>
                <option value="St. Vincent Ferrer Parish - Tuy">St. Vincent Ferrer Parish - Tuy</option>
                <option value="Nuestra Señora De La Paz Y Buen Viaje Parish">Nuestra Señora De La Paz Y Buen Viaje Parish</option>
                <option value="Immaculate Conception Parish - Balayan">Immaculate Conception Parish - Balayan</option>
                <option value="St. Raphael the Archangel Parish">St. Raphael the Archangel Parish</option>
                <option value="Visitation of the Blessed Virgin Mary Parish">Visitation of the Blessed Virgin Mary Parish</option>
                <option value="St. Anthony of Padua Parish - Nasugbu">St. Anthony of Padua Parish - Nasugbu</option>
                <option value="St. Nicolas de Tolentino Parish">St. Nicolas de Tolentino Parish</option>
                <option value="Our Mother of Perpetual Help Parish - Agoncillo">Our Mother of Perpetual Help Parish - Agoncillo</option>
                <option value="Our Lady of the Miraculous Medal Parish">Our Lady of the Miraculous Medal Parish</option>
                <option value="St. Roche Parish - Lemery">St. Roche Parish - Lemery</option>
                <option value="Mahal na Poon ng Banal na Krus Parish">Mahal na Poon ng Banal na Krus Parish</option>
                <option value="Basilica of St. Martin de Tours">Basilica of St. Martin de Tours</option>
                <option value="San Isidro Labrador Parish - San Luis">San Isidro Labrador Parish - San Luis</option>
                <option value="Invencion De La Sta. Cruz Parish">Invencion De La Sta. Cruz Parish</option>
                <option value="San Isidro Labrador Parish - Cuenca">San Isidro Labrador Parish - Cuenca</option>
                <option value="St. Therese of the Child Jesus and of the Holy Face Parish - Sta. Teresita">St. Therese of the Child Jesus and of the Holy Face Parish - Sta. Teresita</option>
                <option value="Archdiocesan Shrine of Our Lady of Caysasay">Archdiocesan Shrine of Our Lady of Caysasay</option>
                <option value="St. Francis of Paola Parish">St. Francis of Paola Parish</option>
                <option value="St. Roche Parish - Tingloy">St. Roche Parish - Tingloy</option>
                <option value="Holy Family Parish - Bolo">Holy Family Parish - Bolo</option>
                <option value="Immaculate Conception Parish - Bauan">Immaculate Conception Parish - Bauan</option>
                <option value="Our Mother of Perpetual Help Parish - Aplaya">Our Mother of Perpetual Help Parish - Aplaya</option>
                <option value="St. Mary Magdalene Parish">St. Mary Magdalene Parish</option>
                <option value="San Pascual Baylon Parish">San Pascual Baylon Parish</option>
                <option value="Basilica of the Immaculate Conception">Basilica of the Immaculate Conception</option>
                <option value="St. Mary Euphrasia Parish">St. Mary Euphrasia Parish</option>
                <option value="Most Holy Trinity Parish">Most Holy Trinity Parish</option>
                <option value="Sta. Rita de Cascia Parish">Sta. Rita de Cascia Parish</option>
                <option value="St. Isidore Parish">St. Isidore Parish</option>
                <option value="San Lorenzo Ruiz Parish - Taysan">San Lorenzo Ruiz Parish - Taysan</option>
                <option value="Nuestra Senora de la Merced Parish">Nuestra Senora de la Merced Parish</option>
                <option value="St. Michael the Archangel">St. Michael the Archangel</option>
                <option value="St. Paul the Apostle">St. Paul the Apostle</option>
                <option value="St. Michael the Archangel">St. Michael the Archangel</option>
                <option value="Our Lady of the Holy Rosary Parish">Our Lady of the Holy Rosary Parish</option>
                <option value="Holy Family Parish - Rosario">Holy Family Parish - Rosario</option>
                <option value="San Juan Nepomuceno">San Juan Nepomuceno</option>
                <option value="Most Holy Rosary Parish">Most Holy Rosary Parish</option>
                <option value="St. Joseph the Patriarch Parish">St. Joseph the Patriarch Parish</option>
                <option value="St. James the Greater Parish">St. James the Greater Parish</option>
                <option value="St. Anthony of Padua Parish - Bolbok">St. Anthony of Padua Parish - Bolbok</option>
                <option value="Our Lady of Peace and Good Voyage Parish">Our Lady of Peace and Good Voyage Parish</option>
                <option value="Sto. Nino Parish - Pinagtong-ulan">Sto. Nino Parish - Pinagtong-ulan</option>
                <option value="Immaculate Conception Parish - Mataas na Kahoy">Immaculate Conception Parish - Mataas na Kahoy</option>
                <option value="Divina Pastora Parish">Divina Pastora Parish</option>
                <option value="St. Vincent Ferrer Parish - Banaybanay">St. Vincent Ferrer Parish - Banaybanay</option>
                <option value="Nuestra Señora De La Paz Y Buen Viaje Parish">Nuestra Señora De La Paz Y Buen Viaje Parish</option>
                <option value="St. Sebastian Cathedral">St. Sebastian Cathedral</option>
                <option value="Mary Mediatrix of All Graces Parish">Mary Mediatrix of All Graces Parish</option>
                <option value="Sto. Niño Parish - Marawoy">Sto. Niño Parish - Marawoy</option>
                <option value="St. Therese of the Child Jesus Parish">St. Therese of the Child Jesus Parish</option>
                <option value="St. Isidore Parish - Lipa">St. Isidore Parish - Lipa</option>
                <option value="St. Joseph the Worker Proposed Parish">St. Joseph the Worker Proposed Parish</option>
                <option value="Immaculate Conception Parish - Malvar">Immaculate Conception Parish - Malvar</option>
                <option value="Nuestra Señora de la Soledad Parish">Nuestra Señora de la Soledad Parish</option>
                <option value="St. John the Evangelist Parish">St. John the Evangelist Parish</option>
                <option value="St. Thomas Aquinas Parish">St. Thomas Aquinas Parish</option>
                <option value="St. Clare Assisi Parish">St. Clare Assisi Parish</option>
                <option value="St. Padre Pio National Shrine and Parish">St. Padre Pio National Shrine and Parish</option>
                <option value="St. Augustine of Hippo Parish">St. Augustine of Hippo Parish</option>
                <option value="Queen of All Saints Parish">Queen of All Saints Parish</option>
                <option value="Holy Family Flight to Egypt Parish">Holy Family Flight to Egypt Parish</option>
                <option value="San Guillermo Parish">San Guillermo Parish</option>
                s<option value="Immaculate Conception Parish - Laurel">Immaculate Conception Parish - Laurel</option>
              </select>
            </div>
            <div class="form-group">
              <label for="contactPerson">Contact Person:</label>
              <input type="text" id="contactPerson" name="contactPerson" class="form-control" required>
            </div>
          </div>
      </section>
    </div>

    <div class="col-md-6">
      <section>
        <br>
        <div class="form-group">
          <label for="contactNumber">Contact Number:</label>
          <input type="text" id="contactNumber" name="contactNumber" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="venue">Venue:</label>
          <input type="text" id="venue" name="venue" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label for="remarks">Remarks:</label>
          <textarea id="remarks" name="remarks" rows="4" class="form-control" required></textarea>
        </div>
        
        <div class="form-group">
          <label for="file">Upload Participants List</label>
          <input type="file" id="file" name="file" accept=".pdf, .doc, .docx" required>
        </div>
        <div class="form-group">
           <button type="submit">Submit</button>
        </div>
      </section>
    </div>
 </div>
</div>
</form>
</body>
</html>
  