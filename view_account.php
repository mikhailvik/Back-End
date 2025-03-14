
<!-- Här börjar register-formular -->

<h3>Här är dina kontouppgifter</h3><br />

<?php include "model_account.php" ?>

<br><form action="annons.php" method="get">
        <button type="submit" class="btn btn-success">Se alla annonser</button>
</form><br>

<p>Här kan du <?= $_SESSION['username'] ?> editera din kontaktannons</p>

	<form action="profile.php" method = "get">
	
		<label for="firstname">First name:</label><br />
		<input type="text" id="firstname" name="firstname" value="<?= $row['firstname'] ?>"><br />

		<label for="lastname">Last name:</label><br />
		<input type="text" id="lastname" name="lastname" value="<?= $row['lastname'] ?>"><br />
		
		
		<label for="text">About you:</label><br />
		<input type="text" id="text" placeholder="..." name="text" value="<?= $row['text'] ?>"><br />

		<br>
		<input type="submit" class="btn btn-primary" value="Uppdatera profil"><br />
		<br>
	</form> 

	<!-- Formulär för att ta bort konto -->
<h3>Vill du ta bort ditt konto?</h3>
<p>För att ta bort ditt konto, skriv in ditt lösenord och tryck på "Ta bort konto".</p>
<form action="profile.php" method="post">
    <label for="password">Ditt lösenord:</label><br />
    <input type="password" id="password" name="password" required><br />
	<br>
    <input type="submit" class="btn btn-danger" name="delete_account" value="Ta bort konto">
	<br>
</form>

<?php

?>
	
	




	

