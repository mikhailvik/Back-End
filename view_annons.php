
<p>Följande annonser finns på dejtingsajten</p>
<?php include "model_annons.php" ?>


<!-- Sorting -->
<form method="GET" action="annons.php">
<label for="sort_by" style="color: green;">Sortera efter: </label>
    <select name="sort_by" id="sort_by">
        <option value="salary" <?= (isset($_GET['sort_by']) && $_GET['sort_by'] == 'salary') ? 'selected' : '' ?>>Årslön</option>
        <option value="likes" <?= (isset($_GET['sort_by']) && $_GET['sort_by'] == 'likes') ? 'selected' : '' ?>>Antal gillningar</option>
    </select>
    <input type="submit" value="Sortera"><br>
     <br>
</form>


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
} else if (!empty($_SESSION['role_fk']) && $_SESSION['role_fk'] == "user") {
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


<!-- Paginering -->
<div>
<p>Sidnummer: <?= $page ?></p>
    <?php if ($page > 1): ?>
        <a href="?page=1&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : 'salary' ?>">Första</a>
        <a href="?page=<?= $page - 1 ?>&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : 'salary' ?>">Föregående</a>
    <?php endif; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?= $page + 1 ?>&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : 'salary' ?>">Nästa</a>
        <a href="?page=<?= $total_pages ?>&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : 'salary' ?>">Sista</a>
    <?php endif; ?>
</div>

