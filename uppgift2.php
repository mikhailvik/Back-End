
<?php 
#Uppgift2
print("Idag är det " .date("N"));
print("och datum är " .date("Y.m.d.") . "<br>");
#Array i PHP
$veckodagar = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag");
print("Idag är det " . $veckodagar[date("N")]);
?>
 

