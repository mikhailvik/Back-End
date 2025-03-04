<?php
   
    
//Kolla att man skickat data 
if (!empty($_REQUEST['username']) && !empty($_REQUEST['firstname']) && !empty($_REQUEST['lastname']) && !empty($_REQUEST['password']) 
&& !empty($_REQUEST['email-field']) && !empty($_REQUEST['zipcode']) && !empty($_REQUEST['text']) && !empty($_REQUEST['salary']) && !empty($_REQUEST['preference'])) {

// Extrahera data från formuläret och skydda det
    $username = test_input($_REQUEST['username']);// JS protection
    $firstname = test_input($_REQUEST['firstname']); 
    $lastname = test_input($_REQUEST['lastname']);
    $password = test_input($_REQUEST['password']);
    $email = test_input($_REQUEST['email-field']);
    $zipcode = test_input($_REQUEST['zipcode']);
    $text = test_input($_REQUEST['text']);
    $salary = test_input($_REQUEST['salary']);
    $preference = test_input($_REQUEST['preference']);
    $likes = 99;
    $role_fk = 1;

    $stmt_insertProfile = $conn->prepare("INSERT INTO profiles_table (username, firstname, lastname, password, email, zipcode, text, salary, preference, likes, role_fk) 
            VALUES (:username, :firstname, :lastname, :password, :email, :zipcode, :text, :salary, :preference, :likes, :role_fk)"); 


    // Bind parametrar
  
    $stmt_insertProfile->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':firstname', $firstname, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':lastname', $lastname, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':password', $password, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':text', $text, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':salary', $salary, PDO::PARAM_INT);
	$stmt_insertProfile->bindParam(':preference', $preference, PDO::PARAM_INT);
    $stmt_insertProfile->bindParam(':likes', $likes, PDO::PARAM_INT);
    $stmt_insertProfile->bindParam(':role_fk', $role_fk, PDO::PARAM_INT);



    if ($stmt_insertProfile->execute()) {
		echo "Registration created successfully";
	 }
	else{
	   echo "something went wrong";
	}

}
?>