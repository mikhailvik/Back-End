<?php

//test uppgift7

//Hämta användar_id fråm sessionen
//print("<b>" .$_SESSION['user_id']. "</b>");

//$sql = "SELECT * FROM comments_table";

//PDO:: query metoden returnerar PDO Statement som vi sparar i $stmt
//$stmt = $conn->query($sql);
// Vi kör -> fetch() method av PDO Statement objektet
// $result = $stmt -> fetch(PDO::FETCH_ASSOC);


// Hämtar användarnamnet från sessionen
$username = $_SESSION['username'];

// att hämta prof_id baserat på användarnamn
$sql = "SELECT prof_id FROM profiles_table WHERE username = :username LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Hämtar resultatet
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $prof_id = $user['prof_id'];
    // Nu har du prof_id, du kan använda det för att hämta kommentarer
} else {
    // Om användaren inte hittades, fel
    echo "Användare inte hittad.";
}
?>

<?php
if (isset($prof_id)) {
    // att hämta kommentarer för detta prof_id
    $sql = "SELECT * FROM comments_table WHERE prof_fk = :prof_id ORDER BY created_time DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
    $stmt->execute();

    // Hämtar kommentarer
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Nu innehåller $comments alla kommentarer för detta prof_id
   
} else {
    // Om prof_id inte är inställt, fel
    echo "Fel: prof_id är inte inställt.";
}
?>