
<?php 
//Input validation! XSS protection
$username = test_input($_REQUEST['username']);
$psw = test_input($_REQUEST['psw']);


#Uppgift4
//To-Do: Ta emot data från logineb (nu hårdkodat)
print("Du loggar in som:" .$_REQUEST['username'] . "<br>");
print("Ditt lösenord är:" .$_REQUEST['psw'] . "<br>");

$_SESSION['name'] = $_REQUEST['username']; //Skriv data till sessionen

//Läs data från sessionen
print("Välkommen tillbaka" .$_SESSION['name'] . "!");

?>
 

