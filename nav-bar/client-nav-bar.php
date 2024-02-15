<style> 
.dropdown1 {
    position: relative;
    display: inline-block;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1; 
    background-color: rgba(255, 255, 255, 0.75);
}

.dropdown-menu1 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    left: 178%;
    top: 0;
    background-color: rgba(255, 255, 255, 0.75);
}

.dropdown-icon {
    transform: rotate(180deg);
}

.dropdown:hover .dropdown-menu {
    display: block;
}

</style>
<nav class="navbar navbar-expand-lg">
	<div class="container">
	  <a class="navbar-brand" href="index.php">You✞hLink</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link" href="index_client.php">Home</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="events-client.php">Events</a>
		  </li>
		  <li class="dropdown">
    <a class="nav-link dropdown-toggle username" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $row["firstname"] ?>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="profile.php">Profile</a>
        <a class="dropdown-item" href="<?php echo ($row["organization"] === 'Admin') ? 'appointment_list.php' : (($row["organization"] === 'Formation Team')  ? 'appointment-member.php' : 'appointment-client.php'); ?>">Appointment</a>
        <a class="dropdown-item" href="https://docs.google.com/document/d/1SScIDHAjlfQmVnIFyj1AJHHU84zaoja2/edit?usp=sharing&ouid=117690929165865719807&rtpof=true&sd=true" class="file-link"> Participants List Form </a>

        <!-- Show Files link based on organization -->
        <a class="dropdown-item" href="index.php"><?php echo $loginText ?></a>
    </div>
    </li>
		</ul>
	  </div>
	</div>
  </nav>
 