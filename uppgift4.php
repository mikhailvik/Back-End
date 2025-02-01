
<?php 
//Input validation! XSS protection
// Check that variables exist in $_REQUEST

if (isset($_REQUEST['username'])) {
    $username = test_input($_REQUEST['username']);
} else {
    $username = ''; // Если данных нет, присваиваем пустое значение
}

if (isset($_REQUEST['password'])) {
    $password = test_input($_REQUEST['password']);
} else {
    $password = ''; // Если данных нет, присваиваем пустое значение
}

//$username = test_input($_REQUEST['username']);
//$password = test_input($_REQUEST['password']);

//my test
$storedUsername = "mikhailv";
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
//print("Du loggar in som:" .$_REQUEST['username'] . "<br>");
//print("Ditt lösenord är:" .$_REQUEST['password'] . "<br>");


if (isset($_REQUEST['username'])) {
    print("Du loggar in som: " . htmlspecialchars($_REQUEST['username']) . "<br>");
}

if (isset($_REQUEST['password'])) {
    print("Ditt lösenord är: " . htmlspecialchars($_REQUEST['password']) . "<br>");
}




//Läs data från sessionen
if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $_SESSION['name'] = $_REQUEST['username']; //Skriv data till sessionen
    print("Välkommen tillbaka " . $_SESSION['name'] . "!"); //Läs data från sessionen
}


//ToDo: Conditional skriv något roligt om mikhailv loggar in
if ($username == "mikhailv") {
    print("Välkommen master, redirecting to profile... ");
    header("Refresh:3; url=profile.php");
}

?>
 

