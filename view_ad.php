<h3>En kontaktannons</h3><br />

<?php include "model_ad.php" ?>


<p>Kontaktannons för <?= row['prof_id'] ?>:<br>
<?= $row['text'] ?> </p>


<!--Adminfunktionalitet -->
<?php
if ($_SESSION['role_fk'] == "admin") {
	print("<span><a href='admin.php?profile=" .$row['prof_id']."'>Ta bort profilen</a></span></p>");

}
?>

<p> Här kan du lämna en kommentar om du gillar annonsen </p>

<form action="index.php" method="POST">
	<label for="kommentar">Kommentar:</label>
	<input type="text" id="kommentar" name="kommentar"><br>
	<input type="hidden" name="profile" value="<?= $row['prof_id'] ?>"><br> <!-- ID профиля -->
  
	<input type="submit" value="Lämna kommentar"><br>
	<br>
</form>
	




	

