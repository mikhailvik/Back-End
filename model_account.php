<?php
    //$_SESSION['username'] = "mikhailv"; //Ska senare komma vid inloggning

    if (!isset($_SESSION['username'])) {
        echo "Du måste vara inloggad för att visa denna sida.";
        exit;
    }

    $username = $_SESSION['username']; // Hämta användarnamet för den inloggade användaren
    print ("Välkommen användare ". $username . "<br>" );

    $sql = "SELECT * FROM profiles_table WHERE username = ?"; // SQL kommandot
    $stmt = $conn->prepare($sql); // Förbered SQL "konvertera till C-kod"
    $stmt->execute([$username]); // Kör (OBS SPARA INTE RESULTATET, den returns true on sucess)
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Hämta datan i form av en associativ array

    // To-Do: Kolla om inloggade användaren är Admin
    //Hämta användarid från databasen; behövs för uppdateringen 
    $user_id = $row['prof_id'];
    print("You are user with id:" . $user_id . "<br>");

    //Uppdatera data i databasen
    if (!empty($_REQUEST['firstname']) && !empty($_REQUEST['lastname']) && !empty($_REQUEST['text'])) {
       
        $firstname = test_input($_REQUEST['firstname']); 
        $lastname = test_input($_REQUEST['lastname']);
        $text = test_input($_REQUEST['text']);

        $stmt_updateProfile = $conn->prepare("UPDATE profiles_table SET firstname = :firstname, lastname = :lastname, text = :text WHERE prof_id = :pid");
      
	    $stmt_updateProfile->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt_updateProfile->bindParam(':lastname', $lastname, PDO::PARAM_STR);
	    $stmt_updateProfile->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt_updateProfile->bindParam(':pid', $user_id, PDO::PARAM_INT);

        if ($stmt_updateProfile->execute()) {
            echo " Your profile has been updated";
         }
        else{
           echo " Something went wrong";
        }
        
    }
  
?>