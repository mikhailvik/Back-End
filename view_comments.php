<p>Följande kommentarer har lämnats på din profil</p>
<?php include "model_comments.php" ?>
<?php
if (!empty($comments)) {
    foreach ($comments as $comment) {
        // Hämtar information från database
        $user_sql = "SELECT firstname, lastname FROM profiles_table WHERE prof_id = :user_fk";
        $user_stmt = $conn->prepare($user_sql);
        $user_stmt->bindParam(':user_fk', $comment['user_fk'], PDO::PARAM_INT);
        $user_stmt->execute();
        $user_data = $user_stmt->fetch(PDO::FETCH_ASSOC);

        // Visar kommentaren
        echo "<p><strong>" . htmlspecialchars($user_data['firstname']) . " " . htmlspecialchars($user_data['lastname']) . ":</strong> " . htmlspecialchars($comment['comment']) . "</p>";

        // Om kommentaren är ett svar på en annan kommentar, visar vi svaret
        if ($comment['reply_fk'] !== NULL) {
            $reply_sql = "SELECT user_fk, comment FROM comments_table WHERE com_id = :reply_fk";
            $reply_stmt = $conn->prepare($reply_sql);
            $reply_stmt->bindParam(':reply_fk', $comment['reply_fk'], PDO::PARAM_INT);
            $reply_stmt->execute();
            $reply_row = $reply_stmt->fetch(PDO::FETCH_ASSOC);

            // Hämtar information om användaren som lämnade kommentaren som svarades på
            $reply_user_stmt = $conn->prepare("SELECT firstname, lastname FROM profiles_table WHERE prof_id = :user_fk LIMIT 1");
            $reply_user_stmt->bindParam(':user_fk', $reply_row['user_fk'], PDO::PARAM_INT);
            $reply_user_stmt->execute();
            $reply_user_data = $reply_user_stmt->fetch(PDO::FETCH_ASSOC);

            // Skriver ut svaret
            echo "<p><i>Svar på kommentar från " . htmlspecialchars($reply_user_data['firstname']) . " " . htmlspecialchars($reply_user_data['lastname']) . ": " . htmlspecialchars($reply_row['comment']) . "</i></p>";
        }
    }
} else {
    echo "Inga kommentarer att visa.";
}
?>