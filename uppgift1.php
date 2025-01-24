
<?php
// Set cookie name and value
$cookie_name = "first_visit";
$cookie_value = time(); // Save the time of the first visit (in seconds)

// Check if the cookie is set, if not, set it
if (!isset($_COOKIE[$cookie_name])) {
    // Set the cookie that will last for 30 days
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    echo "Välkommen till sidan! Det här är ditt första besök.<br>";
} else {
    echo "Hej igen! Ditt senaste besök var: " . date("Y-m-d H:i:s", $_COOKIE[$cookie_name]) . "<br>";
}

// Display user and server information
echo "<br>Ditt namn (om känt): " . (isset($_COOKIE['username']) ? $_COOKIE['username'] : "Okänt") . "<br>";
echo "Ditt IP-adress: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "Serverns IP: " .$_SERVER['SERVER_ADDR'] . "<br>";
echo "Serverns namn: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Serverns tidszon: " . date_default_timezone_get() . "<br>";

// Display the current script
echo "Scriptet som körs: " . $_SERVER['PHP_SELF'] . "<br>";

// Additional server information (optional)
// Uncomment this line if you want to display full server info
// phpinfo(); 
?>
