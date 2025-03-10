<?php 
//Kolla att man skickat data 
if (!empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {

// Extrahera data från formuläret och skydda det
    $username = test_input($_REQUEST['username']);// JS protection
    $password = test_input($_REQUEST['password']);
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    

    $stmt_checkIfUserExists = $conn->prepare("SELECT prof_id, username, passhash FROM profiles_table WHERE username = :name"); 
    // Bind parametrar
    $stmt_checkIfUserExists->bindParam(":name", $username, PDO::PARAM_STR);

    $stmt_checkIfUserExists->execute();

    $user = $stmt_checkIfUserExists->fetch(PDO::FETCH_ASSOC);

    // If we find user and password is correct
    if ($user && password_verify($password, $user['passhash'])) {
        //Kolla också lösenord
        $_SESSION['username'] = $username;
       
        $_SESSION['user_id'] = $user['prof_id'];
        $_SESSION['first_visit'] = isset($_SESSION['first_visit']) ? $_SESSION['first_visit'] : time();
        
        echo "<h3>Välkommen {$_SESSION['username']}!</h3>";
        echo "<p>Första besöket på sidan: " . date("d-m-Y H:i:s", $_SESSION['first_visit']) . "</p>";
        echo "Flyttar dig till din profilsida om 3 sekunder.";
        header("Refresh:3; url=profile.php");
    } else {
        echo "<p style='color:red;'>Incorrect username or password</p>";
    }
} else {
    echo "<p style='color:red;'>Please enter both username and password</p>";
}
?>
