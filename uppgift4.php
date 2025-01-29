
<?php 
//Input validation! XSS protection
$username = test_input($_REQUEST['username']);
$password = test_input($_REQUEST['password']);



$storedUsername = "222";
$storedPassword = "222";  

if ($username == $storedUsername && $password == $storedPassword) {
    // log in save info
    $_SESSION['name'] = $username;
    $_SESSION['first_visit'] = isset($_SESSION['first_visit']) ? $_SESSION['first_visit'] : time(); // save time
} else {
    echo "<p style='color:red;'>Incorrect login or password</p>";
}




// Check / log in user
if (isset($_SESSION['name'])) {
    $firstVisitDate = date("d-m-Y H:i:s", $_SESSION['first_visit']);  // first visit
    echo "<h3>Välkommen {$_SESSION['name']}!</h3>";
    echo "<p>Första besöket på sidan: $firstVisitDate</p>";
} else {
    echo "<h3>Du är inte inloggad. Logga in!</h3>";
}





#Uppgift4
//To-Do: Ta emot data från logineb (nu hårdkodat)
print("Du loggar in som:" .$_REQUEST['username'] . "<br>");
print("Ditt lösenord är:" .$_REQUEST['password'] . "<br>");

$_SESSION['name'] = $_REQUEST['username']; //Skriv data till sessionen

//Läs data från sessionen
print("Välkommen tillbaka" .$_SESSION['name'] . "!");

?>
 

