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

<!-- Här börjar sidans "hero" -->
<header id="page-hero">
	<div class="container">
		<div class="row vh-100 justify-content-center">
			<div class="col align-self-center text-center text-white">
                <h2> <?php include "uppgift1.php";?> </h2></br>
			</div>
		</div>
	</div>
</header>
<!-- Här slutar sidans "hero" -->

<!-- Här börjar sidans "main-section" -->
<section id="main-section">
	<div class="container">
		<div class="row align-items-center">
		    <div class="col align-self-center text-center">
			
				<h2>Annonser</h2></br>
				<p>Följande annonser finns på dejtingsajten</p>
				<?php include ?>
				<?php
				//Visa upp inte bara en användare utan alla med hjälp av en freach loop
				foreach ($stmt as $row)
				{
					print("<h3>" .$row['realname']."'s profil:</h3>");
					print("<p>" .$row['bio']."</p>");
				
				?>
				Lämna kommentar:

				<form action="index.php">
					<label for="kommentar">Kommentar:</label>
					<input type="text" id="kommentar" name="kommentar"><br><br>

					<label for="reciver_id">Reciever:</label><br>
					<input type="number" id="reciver_id" name="reciver_id" value='<?= $row['id'] ?>'><br><br>

					<input type="submit" value="Skicka">
				</form>

				<?php
			    }
				?>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>