<?php 
   //vi startar en php session genast när användaren anländer till sajten
   session_start();
   //Skriv ut php errors till front-enden
   error_reporting(E_ALL);
   ini_set('display_errors', 1); // on a live server, log_errors dont

    
    //Datan på användaren försvinner inte då man tömmer
    //Datan är lagrad på serverns sida
    //Användaren kan stänga sin session med att tömma cookies (logga ut)
   
    //Skadlig input borttagningsfunktion


    //En fuction som tar bort whitespace, backslashes (escape char) och gör om <till html safe motsvar
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    //Databaskonfiguration
    $servername = "localhost"
    $dbname = "mikhailv"
    $username = "mikhailv"
    include "hemlis.php";
    //hemlis.php ser ut såhär:
    //$dbname = "mikhailv"
    //$username = "mikhailv"
    //$password = "supr3rh3mlis"

    //Vi skapar en instans av klassen PDOsom vi kallar $conn
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn ->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //print("Connected to DB")

?>
 

