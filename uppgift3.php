
<?php 
#Uppgift3
$username = $password = $password_again = $email = "";
$usernameError = $passwordError = $passwordAgainError = $emailError = "";

//Kontrollera om formuläret har skickats
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Hämta data från formuläret
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $password_again = trim($_POST["password_again"]);
    $email = trim($_POST["email-field"]);
    


  // Check errors
  if (empty($username)) {
    $usernameError = "Please, fyll i alla fält";
    }
    if (empty($password)) {
        $passwordError = "Please, fyll i alla fält";
    }
    if (empty($password_again)) {
        $passwordAgainError = "Please, fyll i alla fält";
    }
    if ($password !== $password_again) {
        $passwordAgainError = "Lösenorden matchar inte";
    }
    if (empty($email)) {
        $emailError = "Please, fyll i alla fält";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Ange en korrekt email";
    }


    if (empty($usernameError) && empty($passwordError) && empty($passwordAgainError) && empty($emailError)) {   
        // lösenord
        $allowedChars = array("a", "b", "c", 1, 2, 3);
        $password = "";
        #Select chars from allowedChars at random
        #Add chars to a password string
        for
        #Use rand() to select character by index from allowedChars
        rand(0, 5);

        #Email the password to the user
        mail("someone@example.com", "Your password", $password);
    }
}


?>
 

