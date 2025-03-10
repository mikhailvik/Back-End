
<h2>Annonser</h2></br>
<p>Följande annonser finns på dejtingsajten</p>
<?php include "model_profiles.php" ?>

<?php
//Visa upp inte bara en användare utan alla med hjälp av en freach loop
foreach ($stmt as $row)
{
	//Skapa en view_ad.php och tillhörande model_ad.php för att göra annonserna snyggare
	print("<h3>" .$row['firstname']." ".$row['lastname']."'s profil:</h3>");
	print("<p>" .$row['text']."");

?>
<!-- Tips för admin-funktionalitet OBS bort med elsen! -->
<?php
if (!empty($_SESSION['role_fk']) && $_SESSION['role_fk'] == "admin") {
	print("<span><a href='admin.php?profile=" .$row['prof_id']."'>Edit</a></span></p>");
} else {
    print("<span><a href='admin.php?profile=" .$row['prof_id']."'>Edit</a></span></p>");
}
?>

<!-- To-Do: Flytta kommentarsfunktionaliteten till separat vy + modell -->

Lämna kommentar:

<form action="index.php">
	<label for="kommentar">Kommentar:</label>
	<input type="text" id="kommentar" name="kommentar"><br>
	<input type="hidden" name="reciver_id" value='<?= $row['prof_id'] ?>'><br>
	<input type="submit" value="Skicka"><br>
	<br>
</form>

<?php
}
?>

