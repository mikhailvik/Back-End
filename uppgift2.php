
<?php 
#Uppgift2
print("Idag är det " .date("N"));
print("och datum är " .date("Y.m.d.") . "<br>");
#Array i PHP
$veckodagar = array("Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lårdag", "Såndag");
print("Idag är det " . $veckodagar[date("N")]);
?>
 

