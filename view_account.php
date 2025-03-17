
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

    <label for="email">Email:</label><br />
    <input type="email" id="email" name="email" value="<?= $row['email'] ?>"><br />

    <label for="zipcode">Zipcode:</label><br />
    <input type="text" id="zipcode" name="zipcode" value="<?= $row['zipcode'] ?>"><br />

    <label for="text">About you:</label><br />
    <input type="text" id="text" placeholder="..." name="text" value="<?= $row['text'] ?>"><br />

    <!-- Salary selection -->
    <label for="salaryname">Salary:</label><br />
    <select id="salaryname" name="salary">
        <option value="1" <?= $row['salary'] == 1 ? 'selected' : '' ?>>0-1000€</option>
        <option value="2" <?= $row['salary'] == 2 ? 'selected' : '' ?>>1000-2000€</option>
        <option value="3" <?= $row['salary'] == 3 ? 'selected' : '' ?>>2000-3000€</option>
        <option value="4" <?= $row['salary'] == 4 ? 'selected' : '' ?>>3000-4000€</option>
        <option value="5" <?= $row['salary'] == 5 ? 'selected' : '' ?>>4000-5000€</option>
    </select>
    <br />

    <!-- Preference selection -->
    <label for="preferencename">Preference:</label><br />
    <select id="preferencename" name="preference">
        <option value="1" <?= $row['preference'] == 1 ? 'selected' : '' ?>>Man</option>
        <option value="2" <?= $row['preference'] == 2 ? 'selected' : '' ?>>Woman</option>
        <option value="3" <?= $row['preference'] == 3 ? 'selected' : '' ?>>Both</option>
        <option value="4" <?= $row['preference'] == 4 ? 'selected' : '' ?>>Other</option>
        <option value="5" <?= $row['preference'] == 5 ? 'selected' : '' ?>>Everything</option>
    </select>
    <br />


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
	
	




	

