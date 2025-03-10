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
			
				<h2>Profilbild</h2></br>
				<form action="profile.php" method="post" enctype="multipart/form-data">
					Select image to upload:
					<input type="file" name="fileToUpload" id="fileToUpload"><br />
					<br>
					<input type="submit" value="Upload Image" name="submit">
				</form>
				<?php include "uppgift5.php";?>

			</div>
		</div>
	</div>
</section>


<section class="main-section">
	<div class="container">
		<div class="row align-items-center">
		    <div class="col align-self-center text-center">
			
				<h2> Välkommen till min sida</h2></br>
				<?php include "view_account.php";?>
				
			</div>
		</div>
	</div>
</section>


<section class="main-section">
	<div class="container">
		<div class="row align-items-center">
		    <div class="col align-self-center text-center">
			
				<h2> Kommentarer</h2></br>
				<?php include "view_comments.php";?>
				
			</div>
		</div>
	</div>
</section>


<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>