<?php
//Kolla att man skickat data 
if (!empty($_REQUEST['username']) && !empty($_REQ$UEST['email'])) {

    $username = test_input($_REQUEST['username']);// JS protection
    $email = test_input($_REQUEST['email']);
    $firstname = "asd"; $lastname = "qwe"; $password = "123"; $zipcode = "00420"; $text = "Jag är sämst";
    $salary = 3; $preferance = 2; $email = "welander@arcada.fi"; $likes = 99; $role_fk = 1;

    // Användarinmatning är skadlig också för databasen - ENBART PREPARED STATEMENTS med? placeholders
    $sql = "INSERT INTO profiles_table (prof_id, username, firstname, lastname, password, email, zipcode, text, salary, preferance, likes, role_fk) VALUES (NULL, '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');";
 
    $stmt = $conn->prepare($sql); //körs på DBMS "konvertera sql till maskinkod/C-kod där SQL - användernamn är ofarlig
    if ($stmt->eachxecute(<[$username, $firstname, $lastname, $password, $email, $zipcode, $text, $salary, $preferance, $likes, $role_fk])) {
        print("Registrerad!");
    } else {
        print("Något fel med exekvering av sql");
    }

}




?>