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
				<p>Under kursen har jag haft möjlighet att utveckla en webbaserad lösning där användare kan interagera med profiler, lägga till kommentarer och filtrera annonser genom olika parametrar. Projektet har gett mig en chans att förbättra mina tekniska färdigheter inom webbutveckling och min förståelse för användarupplevelse samt databasinteraktion. Denna rapport reflekterar över de olika aspekterna av min inlärningsprocess och genomförandet av projektet.</p>
        
				<h3>Database:</h3>
				<div class="image-container">
        			<img src="images/database.png" alt="Database tables">
   				</div>
				
				<h3>Vad Har Gått Bra?</h3>
				<ul>
					<li><strong>Inlärning av SQL och Databashantering:</strong> En av de bästa delarna av projektet var att jag fick fördjupa mina kunskaper inom SQL och databashantering. Att implementera funktioner som paginering, filtrering och sortering gav mig praktisk erfarenhet av hur man effektivt hämtar och visar data från en databas.</li>
					<li><strong>Paginering och Filtrering:</strong> Att implementera funktioner för paginering och filtrering av annonser var både intressant och lärorikt. Detta gav mig en bra inblick i hur stora mängder data hanteras på ett effektivt sätt i webbapplikationer.</li>
					<li><strong>Kommentarer och Användarinteraktion:</strong> Att implementera en kommentarsfunktion där användare kan lägga till kommentarer och svara på dem gav mig en bättre förståelse för hur användare interagerar med webbapplikationer och hur man hanterar dessa interaktioner i databasen.</li>
				</ul>
        
     			<h3>Svåra Delar</h3>
				<ul>
					<li><strong>Hantera SQL-Injektioner och Säkerhet:</strong> En av de svåraste delarna var att säkerställa att webbapplikationen var säker mot SQL-injektioner och andra säkerhetshot. Jag spenderade mycket tid på att lära mig om parametriserade SQL-frågor och hur man skyddar användardata på ett korrekt sätt.</li>
					<li><strong>Dynamisk Hantering av Filter och Parametrar:</strong> Att skapa en flexibel och dynamisk SQL-fråga som kan anpassas beroende på användarens val var en utmaning. Jag behövde skapa en lösning som skulle hantera alla filter och sorteringsalternativ på ett korrekt sätt.</li>
					<li><strong>Kommentarer och Relationer:</strong> Att implementera svar på kommentarer (och hantera relationer mellan kommentarer och användare) var en annan utmaning. Jag behövde förstå hur man strukturerar databasen för att möjliggöra denna funktionalitet.</li>
				</ul>
        
        		<h3>Tråkiga och Tidskrävande Delar</h3>
				<ul>
					<li><strong>Databasdesign:</strong> Att skapa databasstrukturer och tabeller var en ganska monoton och tidskrävande uppgift. Även om det var nödvändigt för projektets framgång kände jag att det var tråkigt, men jag förstod vikten av en god databasdesign för hela projektet.</li>
					<li><strong>Felhantering:</strong> Att implementera ordentlig felhantering, särskilt för formulär och kommentarer, var också en tidskrävande uppgift. Jag behövde säkerställa att alla felmeddelanden var användarvänliga och att data skickades korrekt till databasen.</li>
				</ul>

				<h3>Vad Tog Lång Tid Att Förstå?</h3>
				<ul>
					<li><strong>Sessionshantering och Användarautentisering:</strong> Att förstå hur man hanterar användarsessioner och autentisering tog en hel del tid.</li>
				</ul>

				<h3>Vad tog för lång tid?</h3>
				<ul>
					<li><strong>Felavkodning och buggfixning:</strong> Jag spenderade mycket tid på att åtgärda mindre problem med kommentarsfunktionen och dess koppling till användare.</li>
					<li><strong>Förbättring av användargränssnittet:</strong> Jag spenderade också för mycket tid på att förbättra användargränssnittet, vilket ibland fick mig att tappa fokus från mer funktionella aspekter av projektet.</li>
					<li><strong>Att arbeta ensam:</strong> Eftersom jag genomförde projektet ensam och inte i en grupp om två personer var det svårt att hinna klart i tid. Den största utmaningen var bristen på tid, eftersom det krävs betydligt mer tid och energi för att genomföra projektet ensam än i en grupp.</li>
				</ul>

				<h3>Hur Kursen Kunde Ha Lämpat Sig Bättre</h3>
				<ul>
					<li><strong>Mer Detaljerad Handledning om Säkerhet:</strong> Jag skulle gärna ha fått mer omfattande utbildning om säkerhet i webbutveckling, särskilt om SQL-injektioner och hur man skyddar webbapplikationer från vanliga hot.</li>
					<li><strong>Komplexa SQL-Frågor och Optimering:</strong> Jag skulle ha uppskattat att lära mig mer om komplexa SQL-frågor och optimering, särskilt för att bygga skalbara och effektiva databasfrågor.</li>
				</ul>

				<h3>Slutsats</h3>
                <p>Sammanfattningsvis har detta projekt varit en lärorik och utmanande upplevelse. Jag har fått en bättre förståelse för de tekniska aspekterna av webbutveckling, särskilt när det gäller databashantering, säkerhet och användarinteraktion. Trots de svårigheter jag stött på, har projektet gett mig värdefull erfarenhet som kommer att vara användbar i framtida utvecklingsprojekt. Jag ser fram emot att fortsätta förbättra mina färdigheter och använda de lärdomar jag fått under denna kurs i framtida uppgifter.</p>
    
			</div>
		</div>
	</div>
</section>
<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>