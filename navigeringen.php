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
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="profile.php">Om mig</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="kontakt.php">Kontakt</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Log in</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Register</a></li>
			</ul>
		</div>	
			<!-- Visa länk till profilen om man är inloggad -->
		
				<?php 
					if (isset($_SESSION['name'])) {
						print('<div>Profile</div>');
					}else {
						print('<a href="login.php">Log in</a>');
					};
				?>		
	</div>
</nav>