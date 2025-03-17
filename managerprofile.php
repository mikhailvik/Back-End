
<?php

ob_start();
// Kontrollera om prof_id finns i URL
if (isset($_GET['prof_id'])) {
    $prof_id = (int)$_GET['prof_id'];

    //att hämta profilinformation från databasen
    $sql = "SELECT * FROM profiles_table WHERE prof_id = :prof_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Formulär för att redigera profil
            echo "<h3>Redigera Profil</h3>";

            echo "<form action='managerannons.php?prof_id=" . htmlspecialchars($row['prof_id']) . "' method='POST'>";
            
            // Förnamn
            echo "<label for='firstname'>Förnamn:</label><br />";
            echo "<input type='text' id='firstname' name='firstname' value='" . htmlspecialchars($row['firstname']) . "'><br />";

            // Efternamn
            echo "<label for='lastname'>Efternamn:</label><br />";
            echo "<input type='text' id='lastname' name='lastname' value='" . htmlspecialchars($row['lastname']) . "'><br />";

            // E-post
            echo "<label for='email'>E-post:</label><br />";
            echo "<input type='email' id='email' name='email' value='" . htmlspecialchars($row['email']) . "'><br />";

            // Postnummer
            echo "<label for='zipcode'>Postnummer:</label><br />";
            echo "<input type='text' id='zipcode' name='zipcode' value='" . htmlspecialchars($row['zipcode']) . "'><br />";

            // Om dig
            echo "<label for='text'>Om dig:</label><br />";
            echo "<input type='text' id='text' placeholder='...' name='text' value='" . htmlspecialchars($row['text']) . "'><br />";

            // Lön
            echo "<label for='salaryname'>Lön:</label><br />";
            echo "<select id='salaryname' name='salary'>";
            echo "<option value='1'" . ($row['salary'] == 1 ? ' selected' : '') . ">0-1000€</option>";
            echo "<option value='2'" . ($row['salary'] == 2 ? ' selected' : '') . ">1000-2000€</option>";
            echo "<option value='3'" . ($row['salary'] == 3 ? ' selected' : '') . ">2000-3000€</option>";
            echo "<option value='4'" . ($row['salary'] == 4 ? ' selected' : '') . ">3000-4000€</option>";
            echo "<option value='5'" . ($row['salary'] == 5 ? ' selected' : '') . ">4000-5000€</option>";
            echo "</select><br />";

            // Preferens
            echo "<label for='preferencename'>Preferens:</label><br />";
            echo "<select id='preferencename' name='preference'>";
            echo "<option value='1'" . ($row['preference'] == 1 ? ' selected' : '') . ">Man</option>";
            echo "<option value='2'" . ($row['preference'] == 2 ? ' selected' : '') . ">Kvinna</option>";
            echo "<option value='3'" . ($row['preference'] == 3 ? ' selected' : '') . ">Båda</option>";
            echo "<option value='4'" . ($row['preference'] == 4 ? ' selected' : '') . ">Annat</option>";
            echo "<option value='5'" . ($row['preference'] == 5 ? ' selected' : '') . ">Allt</option>";
            echo "</select><br /><br>";

           
            echo "<button type='submit' name='update' class='btn btn-primary'>Uppdatera</button>";
            echo "</form><br>";
        } else {
            echo "<p>Profilen hittades inte.</p>";
        }
    } else {
        echo "<p>Fel vid hämtning av profilinformation.</p>";
    }

    // Hantera formulärinlämning (uppdatering)
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        // Hämta formulärdata
        $firstname = test_input($_POST['firstname']);
        $lastname = test_input($_POST['lastname']);
        $email = test_input($_POST['email']);
        $zipcode = test_input($_POST['zipcode']);
        $text = test_input($_POST['text']);
        $salary = test_input($_POST['salary']);
        $preference = test_input($_POST['preference']);

        // att uppdatera profilinformationen
        $sql_update = "UPDATE profiles_table SET
                        firstname = :firstname,
                        lastname = :lastname,
                        email = :email,
                        zipcode = :zipcode,
                        text = :text,
                        salary = :salary,
                        preference = :preference
                        WHERE prof_id = :prof_id";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bindParam(':firstname', $firstname);
        $stmt_update->bindParam(':lastname', $lastname);
        $stmt_update->bindParam(':email', $email);
        $stmt_update->bindParam(':zipcode', $zipcode);
        $stmt_update->bindParam(':text', $text);
        $stmt_update->bindParam(':salary', $salary, PDO::PARAM_INT);
        $stmt_update->bindParam(':preference', $preference, PDO::PARAM_INT);
        $stmt_update->bindParam(':prof_id', $prof_id, PDO::PARAM_INT);

        // Utför uppdateringen
        if ($stmt_update->execute()) {
        
            header("Refresh:3; url=annons.php"); //  till 'annons.php'
            exit;
            echo "Profilen har uppdaterats.";
            echo "Omdirigerar till din profilsida om 3 sekunder...";
           
        } else {
            echo "<p>Fel vid uppdatering av profil.</p>";
        }
    }
} else {
    echo "<p>Inget profil-ID angivet.</p><br><br>";
}

?>

<!-- Formulär för att skicka in "Gilla"-knappen -->
<form action="managerannons.php?prof_id=<?= $prof_id ?>" method="POST">
	<button type="button" onclick="window.location.href='annons.php';">Tillbaka</button>
</form>