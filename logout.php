<?php
// Starta sessionen
session_start();

// Rensa alla sessiondata
session_unset(); // Tar bort alla sessionvariabler
session_destroy(); // Förstör själva sessionen

// Omdirigera användaren till startsidan 
header("Location: index.php");
exit();
?>


