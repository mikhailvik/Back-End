<?php
//OBS SQL INJECTION FARA!
$likedUser = $_REQUEST['username']; //Vem man likeade skockas i get 
print("Du gillade: " . $likedUser);
//To-Do: Uppdatera Likes i databasen för användaren som likeades 
?>


