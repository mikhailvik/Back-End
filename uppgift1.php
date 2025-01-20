
<?php 
#Uppgift1
print("Serverns ip:" .$_SERVER['SERVER_ADDR']);
print("Skriptet som körs:" .$_SERVER['PHP_SELF']);
# phpinfo();

# Cookies!
$_COOKIE_NAME = "username";
$_COOKIE_VALUE = "mikhailv";
setcookie($_COOKIE_NAME, $_COOKIE_VALUE, time() + (86400 * 30), "/"); 

if (!isset($_COOKIE[$_COOKIE_NAME])) {
	echo "Cookie named ' " . $_COOKIE_NAME . " ' is not set!";
} else {
	echo "Cookie ' " . $_COOKIE_NAME . " ' is set! <br>";
	echo "Value is: " . $_COOKIE[$_COOKIE_NAME];
}

?>


