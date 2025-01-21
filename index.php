<!DOCTYPE html>
<html>
<head>
<title>Boksystem</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="js/javascript.js"></script>
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
				<h1 class="text-uppercase">Det största Boksystemet</h1>
				<h2 class="display-6">Har kan man hitta bara de mest intressanta böckerna!</h2>
				
				
				<button type="button" onclick="document.location='omoss.php'" class="btn bg-primary text-white p-3 mt-5 rounded-pill">Läs mera här</button>
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
				<h2 >Uppgift 1</h2>
				<?php include "uppgift1.php";?>

				
				<h2 >Uppgift 2</h2>
				<?php include "uppgift2.php";?>

				<h2 >Uppgift 3</h2>
				<form action = "index.php" method = "GET">
					Name: <input type = "text" name = "name"><br>
					E-mail: <input type = "text" name = "email"><br>
					<input type = "submit">
				</form>	
				Welcome <?php print($_REQUEST["name"]); ?> <br>
				Your email address is : <?php print($_REQUEST["email"]); ?> <br>
				<?php include "uppgift3.php";?>
			</div>
		</div>
	</div>
</section>


</body>
<?php include "footer.php";?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>