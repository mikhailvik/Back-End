<!-- Här börjar navigeringen -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="#">Boksystem</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Hem</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="omoss.php">Om oss</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="kontakt.php">Kontakt</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Log in</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Register</a></li>
				<!-- Visa länk till profilen om man är inloggad -->
				<?php 
				if($_SESSION['name']) {
					print('<li>Profile</li>');
				}else {
					print('<li>Login</li>');
				};
				?>
			</ul>

		</div>

	</div>
</nav>