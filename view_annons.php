
<p>Följande annonser finns på dejtingsajten</p>
<?php include "model_annons.php" ?>

<?php
//Visa upp inte bara en användare utan alla med hjälp av en freach loop
foreach ($stmt as $row)
{
	//Skapa en view_ad.php och tillhörande model_ad.php för att göra annonserna snyggare
	print("<h3>" .$row['firstname']." ".$row['lastname']."'s profil:</h3>");
	print("<p>" .$row['text']."<br>");

?>
<!-- Tips för admin-funktionalitet OBS bort med elsen! -->
<?php

if (!empty($_SESSION['role_fk']) && $_SESSION['role_fk'] == "admin") {
    echo "<span><a href='adminannons.php?profile=" . htmlspecialchars($row['prof_id']) . "'>See and Edit</a></span></p>";
} if (!empty($_SESSION['role_fk']) && $_SESSION['role_fk'] == "user") {
    echo "<span><a href='userannons.php?prof_id=" . htmlspecialchars($row['prof_id']) . "'>See more</a></span></p>";
} else {
    echo "<span style='color: red;'>Om du vill ser mer informationen behöver du logga in</span><br>";
}

?>

<!-- To-Do: Flytta kommentarsfunktionaliteten till separat vy + modell -->



<p>Lämna kommentar:</p>

<form action="annons.php" method="POST">
	<label for="kommentar">Kommentar:</label>
	<input type="text" id="kommentar" name="kommentar"><br>
	<input type="hidden" name="prof_id" value="<?= $row['prof_id'] ?>"><br> <!-- ID профиля -->
    <input type="hidden" name="reply_id" value="<?= isset($_GET['reply_to']) ? $_GET['reply_to'] : 0 ?>"> <!-- Если это ответ, то указываем reply_id -->
	<input type="submit" value="Skicka"><br>
	<br>
</form>



<?php
}
?>

