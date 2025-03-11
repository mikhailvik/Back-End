<?php
//Hämta användarnamet för profilen vi försöker se på
$username = test_input($_REQUEST['profile']);
$sql = "SELECT * FROM profiles_table WHERE username = ?"; // SQL kommandot
$stmt = $conn->prepare($sql); // Förbered SQL "konvertera till C-kod"
$stmt->execute([$username]); // Kör (OBS SPARA INTE RESULTATET, den returns true on sucess)
$row = $stmt->fetch(PDO::FETCH_ASSOC); // Hämta datan i form av en associativ array


//Om man har lämnat en kommentar på en kontaktannons
if(!empty(test_input($_REQUEST['kommentar'])) ) { 
    print("Skickar kommentar till databasen...");
    //to-do: skicka kommentar till databasen
}


?>