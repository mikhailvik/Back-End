
<!-- Här börjar login-formular -->
<h3>Log in</h3><br />
<p>Här kan du logga in</p>

<form action="login.php" method = "get">
		<label for="username">Username:</label><br />
		<input type="text" id="username" placeholder="alex25" name="username" required="required"><br />
				
		<label for="password">Password:</label><br />
		<input type="password" id="password" placeholder="xxxxx" name="password" required="required"><br />
		<br>
		<input type="hidden" name="state" value="login"><br />
		<input type="submit" name="submit_login" value="Log in"><br />
		<br>		
	</form>


	
	<div class="">
		<span>Har du inget konto?  </span><a class="" href="register.php">Registrera dig här!</a>
	</div>
	<br />

    <?php include "model_login.php" ?>





	

