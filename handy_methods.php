
<?php 
   //Skriv ut php errors till front-enden
   error_reporting(E_ALL);
   ini_set('display_errors', 1); // not in production!

    //vi startar en php session genast när användaren anländer till sajten
    //Datan på användaren försvinner inte då man tömmer
    //Datan är lagrad på serverns sida
    //Användaren kan stänga sin session med att tömma cookies (logga ut)
    session_start();

    //Skadlig input borttagningsfunktion

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
  
?>
 

