<?php


//test uppgift7



//Hämta användar_id fråm sessionen
print("<b>" .$_SESSION['user_id']. "</b>");

$sql = "SELECT * FROM comments_table";

//PDO:: query metoden returnerar PDO Statement som vi sparar i $stmt
$stmt = $conn->query($sql);
// Vi kör -> fetch() method av PDO Statement objektet
// $result = $stmt -> fetch(PDO::FETCH_ASSOC);

?>