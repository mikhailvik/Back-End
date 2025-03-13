
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

    // Hantera när användaren klickar på "Gilla"-knappen
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
        // Hämta user_id från sessionen
        $user_id = $_SESSION['user_id']; // Använd user_id från sessionen

        // Kontrollera om användaren redan har gillat profilen
        $sql_check_like = "SELECT * FROM likes_table WHERE user_id = :user_id AND prof_id = :prof_id";
        $stmt_check_like = $conn->prepare($sql_check_like);
        $stmt_check_like->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt_check_like->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
        $stmt_check_like->execute();

        // Om användaren inte har gillat profilen
        if ($stmt_check_like->rowCount() == 0) {
            // Lägg till en ny rad i likes_table
            $sql_insert_like = "INSERT INTO likes_table (user_id, prof_id) VALUES (:user_id, :prof_id)";
            $stmt_insert_like = $conn->prepare($sql_insert_like);
            $stmt_insert_like->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt_insert_like->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
            $stmt_insert_like->execute();
            
            // Uppdatera antalet likes i profiles_table
            $sql_update_likes = "UPDATE profiles_table SET likes = likes + 1 WHERE prof_id = :prof_id";
            $stmt_update_likes = $conn->prepare($sql_update_likes);
            $stmt_update_likes->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);
            $stmt_update_likes->execute();

            echo "<p>Du har framgångsrikt gillat denna användare!</p>";
        } else {
            echo "<p>Du har redan gillat denna användare.</p>";
        }
    }
}
?>

<!-- Formulär för att skicka in "Gilla"-knappen -->
<form action="userannons.php?prof_id=<?= $prof_id ?>" method="POST">
    <button type="submit" name="like" id="like">Gilla</button>
	<button type="button" onclick="window.location.href='annons.php';">Tillbaka</button>
</form>