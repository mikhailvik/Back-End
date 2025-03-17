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

// Förbered filter
$forwhere = [];
$forparameter = [];

// Filtrera efter preferens
if (isset($_GET['preference']) && $_GET['preference'] != '') {
    $forwhere[] = 'preference = :preference';
    $forparameter[':preference'] = $_GET['preference'];
}

// Filtrera efter antal likes
if (isset($_GET['likes']) && $_GET['likes'] != '') {
    $forwhere[] = 'likes >= :likes';
    $forparameter[':likes'] = $_GET['likes'];
}

// Om det finns filter, lägg till det i frågan
$whereSql = '';
if (count($forwhere) > 0) {
    $whereSql = 'WHERE ' . implode(' AND ', $forwhere);
}

/// SQL-fråga med paginering
$sql = "SELECT * FROM profiles_table $whereSql ORDER BY $order_by $order_dir LIMIT $amount_onepage OFFSET $offset";
$stmt = $conn->prepare($sql);
$stmt->execute($forparameter);



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
// Kontrollera om formuläret har skickats och om data finns
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kommentar']) && isset($_POST['prof_fk'])) {
    
    // Rensa kommentartexten
    $comment = test_input($_POST['kommentar']);  
    
    // Profil-ID och svar-ID för kommentaren
    $prof_fk = $_POST['prof_fk'];  // Profil-ID som kommentaren tillhör
    $reply_fk = isset($_POST['reply_fk']) && $_POST['reply_fk'] != 0 ? (int)$_POST['reply_fk'] : NULL;  // Kommentar-ID som detta är ett svar på (eller NULL)

    // Kontrollera om användaren är inloggad
    if (!empty($_SESSION['username'])) {
        // Hämta användarnamn från sessionen
        $username = $_SESSION['username'];

        // Hämta användarens ID baserat på användarnamnet från sessionen
        $sql_user = "SELECT prof_id FROM profiles_table WHERE username = :username";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt_user->execute();
        $user = $stmt_user->fetch();

        if ($user) {
            $user_fk = $user['prof_id'];  // Användarens ID

            // Om reply_fk inte är NULL, kontrollera om kommentaren finns
            if ($reply_fk !== NULL) {
                // Kontrollera om kommentaren finns med detta ID
                $sql_check_reply = "SELECT com_id FROM comments_table WHERE com_id = :reply_fk";
                $stmt_check_reply = $conn->prepare($sql_check_reply);
                $stmt_check_reply->bindParam(':reply_fk', $reply_fk, PDO::PARAM_INT);
                $stmt_check_reply->execute();
                
                // Om kommentaren inte hittas, skriv ut ett felmeddelande
                if ($stmt_check_reply->rowCount() == 0) {
                    echo "Kommentaren som du försöker svara på finns inte!";
                    exit;
                }
            }

            // insert kommentaren
            $sql = "INSERT INTO comments_table (prof_fk, user_fk, comment, reply_fk) 
                    VALUES (:prof_fk, :user_fk, :comment, :reply_fk)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':prof_fk', $prof_fk, PDO::PARAM_INT); 
            $stmt->bindParam(':user_fk', $user_fk, PDO::PARAM_INT);  
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);  
            $stmt->bindParam(':reply_fk', $reply_fk, PDO::PARAM_INT); 



            // Utför frågan och kontrollera resultatet
            if ($stmt->execute()) {
                echo "Kommentaren har lagts till!";
            } else {
                echo "Fel vid tillägg av kommentar.";
                // Logga felet om frågan inte kunde genomföras
                print_r($stmt->errorInfo());
            }

        }   else {
                echo "Användaren hittades inte!";
            }

        }   else {
                echo "Du måste vara inloggad för att lägga till en kommentar!";
            }


    }  
?>


