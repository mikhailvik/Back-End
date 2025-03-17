<p>Följande kommentarer har lämnats på din profil</p>
<?php include "model_comments.php" ?>
<?php
if (!empty($comments)) {
    foreach ($comments as $comment) {
        // Получаем информацию о пользователе, который оставил комментарий
        $user_sql = "SELECT firstname, lastname FROM profiles_table WHERE prof_id = :user_fk";
        $user_stmt = $conn->prepare($user_sql);
        $user_stmt->bindParam(':user_fk', $comment['user_fk'], PDO::PARAM_INT);
        $user_stmt->execute();
        $user_data = $user_stmt->fetch(PDO::FETCH_ASSOC);

        // Выводим комментарий
        echo "<p><strong>" . htmlspecialchars($user_data['firstname']) . " " . htmlspecialchars($user_data['lastname']) . ":</strong> " . htmlspecialchars($comment['comment']) . "</p>";

        // Если комментарий является ответом на другой комментарий, показываем ответ
        if ($comment['reply_fk'] !== NULL) {
            $reply_sql = "SELECT user_fk, comment FROM comments_table WHERE com_id = :reply_fk";
            $reply_stmt = $conn->prepare($reply_sql);
            $reply_stmt->bindParam(':reply_fk', $comment['reply_fk'], PDO::PARAM_INT);
            $reply_stmt->execute();
            $reply_row = $reply_stmt->fetch(PDO::FETCH_ASSOC);

            // Получаем данные о пользователе, который оставил комментарий, на который ответили
            $reply_user_stmt = $conn->prepare("SELECT firstname, lastname FROM profiles_table WHERE prof_id = :user_fk LIMIT 1");
            $reply_user_stmt->bindParam(':user_fk', $reply_row['user_fk'], PDO::PARAM_INT);
            $reply_user_stmt->execute();
            $reply_user_data = $reply_user_stmt->fetch(PDO::FETCH_ASSOC);

            // Печатаем ответ
            echo "<p><i>Ответ на комментарий от " . htmlspecialchars($reply_user_data['firstname']) . " " . htmlspecialchars($reply_user_data['lastname']) . ": " . htmlspecialchars($reply_row['comment']) . "</i></p>";
        }
    }
} else {
    echo "Нет комментариев для отображения.";
}
?>

