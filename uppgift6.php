<?php
// Filen för att lagra besöksinformation
$filename = 'visitsinfo.txt';

// Kontrollera om filen finns, annars skapa den
if (!file_exists($filename)) {
    file_put_contents($filename, "");
}

// Hämta besökarens IP-adress
$visit_ip = $_SERVER['REMOTE_ADDR'];
$visit_time = date("Y-m-d H:i:s");

// Läs innehållet i filen
$visits = file($filename, FILE_IGNORE_NEW_LINES);

// Array för unika besökare
$unique_visit = [];

// Bearbeta varje post från filen
foreach ($visits as $visit) {
    list($ip, $time) = explode(' ', $visit);
    $unique_visit[$ip] = $time; // Spara endast senaste besöket för varje IP
}

// Om denna IP inte redan har registrerats, lägg till den i filen
if (!array_key_exists($visit_ip, $unique_visit)) {
    // Skriv den nya besöksinformationen till filen
    file_put_contents($filename, "$visit_ip $visit_time\n", FILE_APPEND);
}

// Visa antalet unika besökare
$unique_count = count($unique_visit);
echo "Besöksräknare. Unika användare: $unique_count";
?>