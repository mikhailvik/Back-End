<?php

//test uppgift7

//Hämta användar_id fråm sessionen
//print("<b>" .$_SESSION['user_id']. "</b>");

//$sql = "SELECT * FROM comments_table";

//PDO:: query metoden returnerar PDO Statement som vi sparar i $stmt
//$stmt = $conn->query($sql);
// Vi kör -> fetch() method av PDO Statement objektet
// $result = $stmt -> fetch(PDO::FETCH_ASSOC);



// Получаем user_id из сессии

$user_id = $_SESSION['user_id']; // Получаем user_id из сессии

// SQL запрос, который вытаскивает все комментарии на профиль
$sql = "SELECT * FROM comments_table WHERE prof_fk = :user_id ORDER BY com_id DESC"; 
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();


?>


