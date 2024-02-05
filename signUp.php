<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
  <style>
    body {
      background-color: #92C7CF;
      color: white;
      font-family: Arial, sans-serif;
    }

    .container {
      width: 800px;
      margin: 0 auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 50px;
      color: black;
    }

    .form-group {
      margin-bottom: 30px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group select {
  width: 40%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-top: 5px; /* Adjust spacing between elements */
}

  /* Style for the label */
  .form-group label {
   display: block;
   font-weight: bold;
   margin-bottom: 5px; /* Adjust spacing between label and select */
}


    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 50%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #5d3fd3;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
      background-color: #a7c7e7;
    }

    .form-group label {
  display: block;
  font-weight: bold;
  color: black; /* Add this line to set the label color */
}

    .form-group a {
  color: #6495ed;
  text-decoration: underline; /* Add this line to set the text underlined */
}
.form-group a:hover {
      color: #000080;
    }
  </style>
</head>
<body>
  <div class="container">
    <form id="signup-form" action="signup_process.php" method="post">
      <h2>Sign Up</h2>
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" id="email" name="email" required>
      </div>
       <div class="form-group">
        <label for="cnumber">Contact Number</label>
        <input type="text" id="cnumber" name="cnumber" required>
      </div>
      <div class="form-group">
        <label for="organization">Organization</label>
        <select id="organization" name="organization" required>
          <option value="Formation team">Formation Team</option>
          <option value="Parish">Parish</option>
          <option value="School">School</option>
        <!-- Add more options as needed -->
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
        <option value="Archdiocesan Shrine of Our Lady of Caysasay">Archdiocesan Shrine of Our Lady of Caysasay</option>
        <option value="Basilica of St. Martin de Tours">Basilica of St. Martin de Tours</option>
        <option value="Basilica of the Immaculate Conception">Basilica of the Immaculate Conception</option>
        <option value="Divina Pastora Parish">Divina Pastora Parish</option>
        <option value="Holy Family Flight to Egypt Parish">Holy Family Flight to Egypt Parish</option>
        <option value="Holy Family Parish - Bolo">Holy Family Parish - Bolo</option>
        <option value="Holy Family Parish - Rosario">Holy Family Parish - Rosario</option>
        <option value="Immaculate Conception Parish - Balayan">Immaculate Conception Parish - Balayan</option>
        <option value="Immaculate Conception Parish - Bauan">Immaculate Conception Parish - Bauan</option>
        <option value="Immaculate Conception Parish - Laurel">Immaculate Conception Parish - Laurel</option>
        <option value="Immaculate Conception Parish - Malvar">Immaculate Conception Parish - Malvar</option>
        <option value="Most Holy Rosary Parish">Most Holy Rosary Parish</option>
        <option value="Most Holy Trinity Parish">Most Holy Trinity Parish</option>
        <option value="Mary Mediatrix of All Graces Parish">Mary Mediatrix of All Graces Parish</option>
        <option value="Mahal na Poon ng Banal na Krus Parish">Mahal na Poon ng Banal na Krus Parish</option>
        <option value="Nuestra Senora de la Merced Parish">Nuestra Senora de la Merced Parish</option>
        <option value="Nuestra Señora De La Paz Y Buen Viaje Parish">Nuestra Señora De La Paz Y Buen Viaje Parish</option>
        <option value="Nuestra Señora De La Paz Y Buen Viaje Parish">Nuestra Señora De La Paz Y Buen Viaje Parish</option>
        <option value="Nuestra Señora de la Soledad Parish">Nuestra Señora de la Soledad Parish</option>
        <option value="Our Lady of Peace and Good Voyage Parish">Our Lady of Peace and Good Voyage Parish</option>
        <option value="Our Lady of the Holy Rosary Parish">Our Lady of the Holy Rosary Parish</option>
        <option value="Our Mother of Perpetual Help Parish - Agoncillo">Our Mother of Perpetual Help Parish - Agoncillo</option>
        <option value="Our Mother of Perpetual Help Parish - Aplaya">Our Mother of Perpetual Help Parish - Aplaya</option>
        <option value="Queen of All Saints Parish">Queen of All Saints Parish</option>
        <option value="San Guillermo Parish">San Guillermo Parish</option>
        <option value="San Isidro Labrador Parish - Cuenca">San Isidro Labrador Parish - Cuenca</option>
        <option value="San Isidro Labrador Parish - San Luis">San Isidro Labrador Parish - San Luis</option>
        <option value="San Juan Nepomuceno">San Juan Nepomuceno</option>
        <option value="San Lorenzo Ruiz Parish - Taysan">San Lorenzo Ruiz Parish - Taysan</option>
        <option value="San Pascual Baylon Parish">San Pascual Baylon Parish</option>
        <option value="San Sebastian Cathedral">San Sebastian Cathedral</option>
        <option value="San Roche Parish - Lemery">San Roche Parish - Lemery</option>
        <option value="San Roche Parish - Tingloy">San Roche Parish - Tingloy</option>
        <option value="San Domingo De Silos Parish">San Domingo De Silos Parish</option>
        <option value="St. Anthony of Padua Parish - Bolbok">St. Anthony of Padua Parish - Bolbok</option>
        <option value="St. Anthony of Padua Parish - Nasugbu">St. Anthony of Padua Parish - Nasugbu</option>
        <option value="St. Augustine of Hippo Parish">St. Augustine of Hippo Parish</option>
        <option value="St. Clare Assisi Parish">St. Clare Assisi Parish</option>
        <option value="St. Francis of Paola Parish">St. Francis of Paola Parish</option>
        <option value="St. Francis Xavier Parish">St. Francis Xavier Parish</option>
        <option value="St. Isidore Parish">St. Isidore Parish</option>
        <option value="St. James the Greater Parish">St. James the Greater Parish</option>
        <option value="St. John the Baptist Parish - Lian">St. John the Baptist Parish - Lian</option>
        <option value="St. John the Evangelist Parish">St. John the Evangelist Parish</option>
        <option value="St. Joseph the Patriarch Parish">St. Joseph the Patriarch Parish</option>
        <option value="St. Joseph the Worker Proposed Parish">St. Joseph the Worker Proposed Parish</option>
        <option value="St. Mary Euphrasia Parish">St. Mary Euphrasia Parish</option>
        <option value="St. Mary Magdalene Parish">St. Mary Magdalene Parish</option>
        <option value="St. Michael the Archangel">St. Michael the Archangel</option>
        <option value="St. Nicolas de Tolentino Parish">St. Nicolas de Tolentino Parish</option>
        <option value="St. Pascual Baylon Parish">St. Pascual Baylon Parish</option>
        <option value="St. Padre Pio National Shrine and Parish">St. Padre Pio National Shrine and Parish</option>
        <option value="St. Raphael the Archangel Parish">St. Raphael the Archangel Parish</option>
        <option value="St. Roche Parish - Lemery">St. Roche Parish - Lemery</option>
        <option value="St. Roche Parish - Tingloy">St. Roche Parish - Tingloy</option>
        <option value="St. Sebastian Cathedral">St. Sebastian Cathedral</option>
        <option value="Sto. Domingo De Silos Parish">Sto. Domingo De Silos Parish</option>
        <option value="Sto. Niño Parish - Marawoy">Sto. Niño Parish - Marawoy</option>
        <option value="Sto. Nino Parish - Pinagtong-ulan">Sto. Nino Parish - Pinagtong-ulan</option>
        <option value="St.

 Therese of the Child Jesus and of the Holy Face Parish - Sta. Teresita">St. Therese of the Child Jesus and of the Holy Face Parish - Sta. Teresita</option>
        <option value="St. Therese of the Child Jesus Parish">St. Therese of the Child Jesus Parish</option>
        <option value="St. Thomas Aquinas Parish">St. Thomas Aquinas Parish</option>
        <option value="Sto. Nino Parish - Marawoy">Sto. Nino Parish - Marawoy</option>
        <option value="St. Vincent Ferrer Parish - Banaybanay">St. Vincent Ferrer Parish - Banaybanay</option>
        <option value="St. Vincent Ferrer Parish - Tuy">St. Vincent Ferrer Parish - Tuy</option>
    </select>
</div>
```
       <div class="form-group">
        <label for="username">Username </label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Sign Up">
      </div>
      <div class="form-group login">
        <a href="Log_in_page.html">Already have an account? Log in</a>
      </div>
    </form>
  </div>
</body>
</html>
