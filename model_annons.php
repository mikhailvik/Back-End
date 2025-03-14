<?php

//$sql = "SELECT * FROM profiles_table";
// ToDo: Kör SQL kof på databasen
//$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
//print("Connected to DB");
//$stmt = $conn->query($sql);
//$result = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($result);
?>


<?php
// Antal annonser per sida
$amount_onepage = 3; // 5 annonser per sida

// Hämta aktuell sida
// Visa sida 1 om ingen är angiven,
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Beräkna offset för SQL-frågan
$offset = ($page - 1) * $amount_onepage;

// Bestäm sortering
$order_by = 'salary'; // Som standard sortera efter lön
$order_dir = 'ASC'; // Sorteringsriktning (ASC eller DESC)

// Kontrollera vilket sorteringskriterium som valts
if (isset($_GET['sort_by'])) {
    if ($_GET['sort_by'] == 'salary') {
        $order_by = 'salary';
    } elseif ($_GET['sort_by'] == 'likes') {
        $order_by = 'likes';  // Sortera efter 'likes' från profiles_table
    }
}

// Ny SQL-fråga med paginering och sortering
$sql = "SELECT profiles_table.* 
        FROM profiles_table
        ORDER BY $order_by $order_dir
        LIMIT $amount_onepage OFFSET $offset";

// Förbered och kör SQL-frågan
$stmt = $conn->prepare($sql);
$stmt->execute();

// Hämta totalt antal annonser för att beräkna antal sidor
$sql_count = "SELECT COUNT(*) FROM profiles_table";
$stmt_count = $conn->prepare($sql_count);
$stmt_count->execute();
$total_ads = $stmt_count->fetchColumn();

// Beräkna totalt antal sidor
$total_pages = ceil($total_ads / $amount_onepage);
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