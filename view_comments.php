

<p>Följande kommentarer har lämnats på din profil</p>
<?php include "model_comments.php" ?>

<?php
//Visa upp inte bara en användare utan alla med hjälp av en freach loop
foreach ($stmt as $row)
{
	print("<p>" .$row['comment']."</p>");

}
?>

