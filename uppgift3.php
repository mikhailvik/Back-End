
<?php 
#Uppgift3
$allowedChars = array("a", "b", "c", 1, 2, 3);
$password = "";
#Select chars from allowedChars at random
#Add chars to a password string
for
#Use rand() to select character by index from allowedChars
rand(0, 5);

#Email the password to the user
mail("someone@example.com", "Your password", $password);
?>
 

