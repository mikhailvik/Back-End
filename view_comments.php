

<p>Följande kommentarer har lämnats på din profil</p>
<?php include "model_comments.php" ?>

<?php
//Visa upp inte bara en användare utan alla med hjälp av en freach loop
//foreach ($stmt as $row)
//{
	//print("<p>" .$row['comment']."</p>");

//}



// Выводим комментарии
foreach ($stmt as $row) {
    print("<p><strong>" . htmlspecialchars($row['user']) . ":</strong> " . htmlspecialchars($row['comment']) . "</p>");

    // Если это ответ на комментарий, отображаем, на какой комментарий отвечали
    if ($row['reply_id']) {
        $reply_sql = "SELECT user, comment FROM comments_table WHERE com_id = :reply_id";
        $reply_stmt = $conn->prepare($reply_sql);
        $reply_stmt->bindParam(':reply_id', $row['reply_id'], PDO::PARAM_INT);
        $reply_stmt->execute();
        $reply_row = $reply_stmt->fetch(PDO::FETCH_ASSOC);
        print("<p><i>Ответ на комментарий от " . htmlspecialchars($reply_row['user']) . ": " . htmlspecialchars($reply_row['comment']) . "</i></p>");
    }
}


?>

