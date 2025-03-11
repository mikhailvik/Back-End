<?php

$sql = "SELECT * FROM profiles_table";
// ToDo: Kör SQL kof på databasen
//$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
//print("Connected to DB");
$stmt = $conn->query($sql);
//$result = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($result);
?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['kommentar'])) {
    // Получаем данные из формы
    $comment = test_input($_POST['kommentar']);
    $prof_id = (int)$_POST['prof_id'];
    $reply_id = isset($_POST['reply_id']) ? (int)$_POST['reply_id'] : 0;  // Если это не ответ, устанавливаем reply_id в 0

    // Если это ответ на комментарий, проверим, существует ли коммент с таким ID
    if ($reply_id !== 0) {
        // Проверяем, существует ли комментарий с данным reply_id
        $stmt_check_reply = $conn->prepare("SELECT com_id FROM comments_table WHERE com_id = :reply_id");
        $stmt_check_reply->bindParam(':reply_id', $reply_id, PDO::PARAM_INT);
        $stmt_check_reply->execute();
        
        // Если комментарий с reply_id не существует, выводим ошибку
        if ($stmt_check_reply->rowCount() == 0) {
            echo "Комментарий, на который вы хотите ответить, не существует!";
            exit;
        }
    }

    // Вставляем комментарий в базу данных
    $sql = "INSERT INTO comments_table (user, comment, prof_fk, reply_id) VALUES (:user, :comment, :prof_id, :reply_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
    $stmt->bindParam(':reply_id', $reply_id, PDO::PARAM_INT); // Если это ответ, сохраняем reply_id

    if ($stmt->execute()) {
        echo "Комментарий успешно добавлен!";
    } else {
        echo "Ошибка при добавлении комментария.";
    }
}
?>