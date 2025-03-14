<!-- Här börjar navigeringen -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="#">Min sida</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Hem</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="annons.php">Annonser</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Register</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Log in</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="profile.php">Profilebild</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="visits.php">Besökare</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="comments.php">Kommentarer</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="rapport.php">Rapport</a></li>
			</ul>
		</div>	
			<!-- Visa länk till profilen om man är inloggad -->
		
				<?php 
					if (isset($_SESSION['username'])) {
						//print('<div>Profile</div>');
						print("<div id=profname><a href='./profile.php'>" . $_SESSION['username']."'s profile</a></div>");
						echo '<a href="logout.php">Log ut</a>';
					}else {
						print('<a href="login.php">Log in</a>');
					};

				?>		
	</div>
</nav>