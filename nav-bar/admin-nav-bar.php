 <nav class="navbar navbar-expand-lg">
 	<div class="container">
 		<a class="navbar-brand" href="appointment_list.php">You✞hLink</a>
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<div class="collapse navbar-collapse" id="navbarNav">
 			<ul class="navbar-nav ml-auto">
 				<li class="nav-item">
 					<a class="nav-link" href="../admin/appointment_list.php">Appointments</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="../admin/member_list.php">Members</a>
 				</li>
 				<li class="dropdown">
 					<a class="nav-link dropdown-toggle username" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 						<?php echo $row["firstname"] ?>
 					</a>
 					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
 						<a class="dropdown-item" href="../admin/admin-profile.php">Profile</a>
 						<a class="dropdown-item" href="../index.php"><?php echo $loginText ?></a>
 					</div>
 				</li>
 			</ul>
 		</div>
 	</div>
 </nav>