
<?php
// Kontrollera om prof_id finns i URL:en
if (isset($_GET['prof_id'])) {
    $prof_id = (int)$_GET['prof_id'];

    // Förbered SQL-frågan för att hämta profilinformation
    $sql = "SELECT * FROM profiles_table WHERE prof_id = :prof_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);

    // Utför frågan
    if ($stmt->execute()) {
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($profile) {
            // Visa profilinformation
            echo "<h3>Användarprofil: " . htmlspecialchars($profile['firstname']) . " " . htmlspecialchars($profile['lastname']) . "</h3><br>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($profile['email']) . "</p>";
            echo "<p><strong>Lön:</strong> " . htmlspecialchars($profile['salary']) . "</p>";
            echo "<p><strong>Preferenser:</strong> " . htmlspecialchars($profile['preference']) . "</p>";
            echo "<p><strong>Gilla:</strong> " . htmlspecialchars($profile['likes']) . "</p>";
            echo "<p><strong>Om mig:</strong> " . nl2br(htmlspecialchars($profile['text'])) . "</p>";
        } else {
            echo "<p>Profilen hittades inte.</p>";
        }
    } else {
        echo "<p>Fel vid hämtning av profildata.</p>";
    }

    //Delete profilinformation
    echo "<form action='adminannons.php?prof_id=" . htmlspecialchars($profile['prof_id']) . "' method='POST'>";
    echo "<button type='submit' name='delete' class='btn btn-danger'>Ta bort annons</button><br></br>";
    echo "</form>";


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
         // Se till att ID för annonsen finns
        if (isset($_GET['prof_id'])) {
            $prof_id = (int)$_GET['prof_id'];
    
            // Ta bort alla likes som är kopplade till profilen
            $sql_delete_likes = "DELETE FROM likes_table WHERE prof_id = :prof_id";
            $stmt_delete_likes = $conn->prepare($sql_delete_likes);
            $stmt_delete_likes->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
            $stmt_delete_likes->execute(); 
    
             // Ta bort alla kommentarer som är kopplade till profilen
            $sql_delete_comments = "DELETE FROM comments_table WHERE prof_fk = :prof_id";
            $stmt_delete_comments = $conn->prepare($sql_delete_comments);
            $stmt_delete_comments->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
            $stmt_delete_comments->execute(); 
    
            //  ta bort annonsen
            $sql_delete = "DELETE FROM profiles_table WHERE prof_id = :prof_id";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
    
             // Utför borttagningsfrågan
            if ($stmt_delete->execute()) {
                echo "Annonsen har tagits bort.";
                echo "Flyttar dig till din profilsida om 3 sekunder.";
                header("Refresh:3; url= annons.php"); // till annons sidan
                exit;
            } else {
                echo "<p>Fel vid borttagning av annonsen.</p>";
            }
        }
    }

}
?>

<!-- Formulär för att skicka in "Gilla"-knappen -->
<form action="userannons.php?prof_id=<?= $prof_id ?>" method="POST">
	<button type="button" onclick="window.location.href='annons.php';">Tillbaka</button>
</form>