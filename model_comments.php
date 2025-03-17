<?php

//test uppgift7

//Hämta användar_id fråm sessionen
//print("<b>" .$_SESSION['user_id']. "</b>");

//$sql = "SELECT * FROM comments_table";

//PDO:: query metoden returnerar PDO Statement som vi sparar i $stmt
//$stmt = $conn->query($sql);
// Vi kör -> fetch() method av PDO Statement objektet
// $result = $stmt -> fetch(PDO::FETCH_ASSOC);



// Предполагаем, что у вас уже есть подключение к базе данных $conn

// Получаем имя пользователя из сессии
$username = $_SESSION['username'];

// Подготавливаем SQL-запрос для получения prof_id по username
$sql = "SELECT prof_id FROM profiles_table WHERE username = :username LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Извлекаем результат
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $prof_id = $user['prof_id'];
    // Теперь у вас есть prof_id, можно использовать его для получения комментариев
} else {
    // Если пользователь не найден, обрабатываем ошибку
    echo "Пользователь не найден.";
}
?>

<?php
if (isset($prof_id)) {
    // Подготавливаем SQL-запрос для получения комментариев для данного prof_id
    $sql = "SELECT * FROM comments_table WHERE prof_fk = :prof_id ORDER BY created_time DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
    $stmt->execute();

    // Извлекаем комментарии
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Теперь $comments содержит все комментарии для данного prof_id
    // Вы можете передать этот массив в ваш шаблон для отображения
} else {
    // Если prof_id не установлен, обрабатываем ошибку
    echo "Ошибка: prof_id не установлен.";
}
?>
