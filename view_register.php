
<h2>Registeringsvyn</h2></br>
<p>Här kan du registrera dig</p>


<form action="login.php" method = "get">
	<label for="username">Användarnamn:</label>
	<input type="text" id="username" name="username"><br><br>

	<label for="email">Epost:</label><br>
	<input type="text" id="email" name="email"><br><br>

	<input type="submit" value="Registrera dig">
</form>



<?php include "model_register.php" ?>