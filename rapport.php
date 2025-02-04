<?php include "handy_methods.php" ?>
<!DOCTYPE html>
<html>
<head>
<title>Min sida</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body>


<?php 
include "navigeringen.php";	
?>


<!-- Här börjar sidans "rapport-section" -->

<section id="rapport-section">
	<div class="container">
		<div class="row align-items-center">
		    <div class="col align-self-center">
		
				<h1>Reflektion och feedback</h1>
				<p>Här reflekterar jag över min inlärningsprocess och genomförandet av PHP-projektet. Nedan följer mina tankar kring varje deluppgift och mina erfarenheter från kursen.</p>

				<h3>Uppgift 1: Landningssidan</h3>
				<p>
					Den första uppgiften var att skapa en enkel funktionalitet för att lagra och visa en cookie med användarens besöksinformation. Jag tyckte att det var en bra introduktion till hur cookies fungerar och hur man kan arbeta med dem i PHP. Vad jag uppskattade var den omedelbara återkopplingen från servern som visade om användaren var ny eller återkommande.
				</p>
				<p><strong>Vad var bra:</strong> Första gången jag jobbade med cookies och det var ganska intuitivt att implementera.</p>
				<p><strong>Vad var svårt:</strong> Förståelsen för exakt hur cookies lagras och tas emot i olika sessioner tog en stund.</p>

				<h3>Uppgift 2: Countdown till dejten</h3>
				<p>
					I den här uppgiften skapade jag en funktion för att beräkna skillnaden mellan ett inmatat framtida datum och den aktuella tiden. Jag tyckte det var kul att leka med datum och tider och lära mig om DateTime klassen i PHP.
				</p>
				<p><strong>Vad var bra:</strong> Att förstå hur man kan manipulera och jämföra datum och tider, samt formatera dem för att få meningsfull information.</p>
				<p><strong>Vad var svårt:</strong> Förståelsen för hur man korrekt konverterar mellan olika format av datum och tid var lite klurigt till en början.</p>

				<h3>Uppgift 3: Registeringssidan</h3>
				<p>
					Uppgiften handlade om att skapa ett formulär och validera användardata, såsom användarnamn, lösenord och e-postadress. Jag insåg hur viktigt det är att validera och sanera användardata för att undvika säkerhetsproblem.
				</p>
				<p><strong>Vad var bra:</strong> Jag lärde mig mycket om att hantera formulär och felhantering. Att se hur felmeddelanden visas för användaren var också bra.</p>
				<p><strong>Vad var svårt:</strong> Att implementera alla säkerhetsåtgärder på rätt sätt och vara säker på att jag skyddade användardata på ett korrekt sätt.</p>

				<h3>Uppgift 4: Login</h3>
				<p>
					Denna uppgift lärde mig hur man använder sessioner för att hålla reda på användarinloggning. Jag upptäckte hur sessioner fungerar och hur man kan spara och hämta användardata mellan sidor.
				</p>
				<p><strong>Vad var bra:</strong> Förståelsen för sessioner var mycket givande, och det kändes bra att kunna implementera en enkel inloggning och välkomstmeddelande.</p>
				<p><strong>Vad var svårt:</strong> Att se till att sessioner var korrekt implementerade och att data inte förlorades när användaren navigerade mellan sidor.</p>

				<h3>Uppgift 5: Ladda upp filer</h3>
				<p>
					I uppgift 5 arbetade jag med att skapa en funktion för att ladda upp bilder till servern. Det var spännande att arbeta med filhantering och säkerställa att endast giltiga bildfiler laddades upp.
				</p>
				<p><strong>Vad var bra:</strong> Att förstå hur filhantering fungerar i PHP och hantera eventuella säkerhetsrisker vid uppladdning av filer.</p>
				<p><strong>Vad var svårt:</strong> Säkerställa att filer var av rätt typ och storlek samt hantera fel vid uppladdningen.</p>

				<h3>Uppgift 6: Besöksräknare</h3>
				<p>
					Den här uppgiften gav mig förståelse för hur man kan spara besöksinformation och räkna unika besökare. Det var också intressant att arbeta med textfiler för att spara och läsa data.
				</p>
				<p><strong>Vad var bra:</strong> Att förstå hur man kan spara data mellan besök och hur man beräknar unika användare baserat på IP-adresser.</p>
				<p><strong>Vad var svårt:</strong> Att säkerställa att varje besök loggas korrekt och att man hanterar IP-adresser på ett korrekt sätt.</p>

				<h3>Uppgift 7: Gästbok</h3>
				<p>
					Den sista uppgiften handlade om att skapa ett enkelt kommentarsystem där användare kan lämna kommentarer och dessa sparas i en textfil. Det var kul att se hur jag kunde implementera en enkel databaslösning (textfil) för att lagra användargenererat innehåll.
				</p>
				<p><strong>Vad var bra:</strong> Att se hur kommentarer sparas och visas dynamiskt på sidan.</p>
				<p><strong>Vad var svårt:</strong> Att förstå hur man hanterar filoperationer och ser till att den senaste kommentaren visas först.</p>

				<h3>Allmän Reflektion</h3>
				<p>
					Jag har lärt mig mycket om PHP, inklusive att arbeta med formulär, sessions, filer, och även grundläggande säkerhet. Det har varit både roligt och utmanande att skapa en fullständig webbplats med alla dessa funktioner. Den största utmaningen var nog att förstå hur man hanterar data korrekt och ser till att användardata är säker. 
				</p>
				<p><strong>Vad jag spenderade för mycket tid på:</strong> Jag tror att jag spenderade för mycket tid på att säkerställa att alla formulärdata validerades korrekt och att ingen ogiltig data skulle sparas.</p>

			</div>
		</div>
	</div>
</section>
<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>