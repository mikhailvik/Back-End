<?php
$username = "";
$firstname = "";
$lastname = "";
$password = "";
$email = "";
$zipcode = "";
$text = "";
$salary = "";
$preference = "";


if(isset($_POST['form-submit'])) {
		
		
	//Kolla om firstname har lämnats tomt. Ge ett errormeddelande isåfall	
	if (empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['zipcode']) || empty($_POST['text']) || empty($_POST['salary']) || empty($_POST['preference'])){
	$nameErr = "Error: Name is required_ please fiil it in and send the form again";
	}
	
	//Rensa bort skaldig kod, förhindra att script körs
	else {

		$username = cleanInput($_POST['username']);
		$firstname = cleanInput($_POST['firstname']);
		$lastname = cleanInput($_POST['lastname']);
		$password = cleanInput($_POST['password']);
		$email = cleanInput($_POST['email']);
		$zipcode = cleanInput($_POST['zipcode']);
		$text = cleanInput($_POST['text']);
		$salary = cleanInput($_POST['salary']);
		$preference = cleanInput($_POST['preference']);
	
	}

	
	$username = cleanInput($_POST['username']);
	$firstname = cleanInput($_POST['firstname']);
	$lastname = cleanInput($_POST['lastname']);
	$password = cleanInput($_POST['password']);
	$email = cleanInput($_POST['email']);
	$zipcode = cleanInput($_POST['zipcode']);
	$text = cleanInput($_POST['text']);
	$salary = cleanInput($_POST['salary']);
	$preference = cleanInput($_POST['preference']);
	
	//Kolla om $nameErr har fått ett värde - skriv ut error på sidan	
if (isset ($nameErr)) {
	echo $nameErr;
	}
	
	//Om inget error, skriv ut formulärvärden
else{
	
	
	$stmt_insertProfile = $conn->prepare("INSERT INTO profiles_table (prof_id, username, firstname, lastname, password, email, zipcode, text, salary, preference, likes, role_fk) 
	VALUES (NULL, :username, :firstname, :lastname, :password, :email, :zipcode, :text, :salary, :preference, 99, 1)"); 
	$stmt_insertProfile->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':firstname', $firstname, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':lastname', $lastname, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':password', $password, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':text', $text, PDO::PARAM_STR);
	$stmt_insertProfile->bindParam(':salary', $salary, PDO::PARAM_INT);
	$stmt_insertProfile->bindParam(':preference', $preference, PDO::PARAM_INT);



	if ($stmt_insertProfile->execute()) {
		echo "Registration created successfully";
	 }
	else{
	   echo "something went wrong";
	}
 }
}


function cleanInput($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

?>