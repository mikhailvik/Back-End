

<?php

// Check that the date entered is not in the past
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputDate = $_POST['date'];
    $inputTime = $_POST['time'];

    // Create a DateTime object for the input date and time
    $dateTimeString = $inputDate . " " . $inputTime;
    $dateTime = new DateTime($dateTimeString);
    $now = new DateTime();

    // Check future time
    if ($dateTime < $now) {
        echo "Datumet du angav är i det förflutna. Vänligen välj ett framtida datum.";
    } else {
        // Calculate the difference between the current time and the input time
        $interval = $now->diff($dateTime);

        // Displaying the remaining time
        echo "Det är " . $interval->d . " dagar, " . $interval->h . " timmar, " . $interval->i . " minuter och " . $interval->s . " sekunder kvar till dejten.";
        
        //Calculating and displaying the week number
        echo "<br>Och veckonummer är " . $dateTime->format("W");
    }
} else {
    // function today date
    $veckodagar = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag");
    echo "Idag är det " . $veckodagar[date("N") - 1] . " den " . date("Y-m-d H:i:s") . ". ";
}
?>