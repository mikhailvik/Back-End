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

<!-- Här börjar comments-formular -->
<div class = "formular">
   <h2>Kommentarer:</h2>
	<form action="comments.php" method="POST">
        <label for="name">Ditt namn:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="comment">Kommentar:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Skicka">
    </form>
	<?php include "uppgift7.php";?>
</div>

<!-- Här börjar sidans "main-section" -->
<section id="main-section">
	<div class="container">
		<div class="row align-items-center">
		    <div class="col align-self-center text-center">
			<h2>Tidigare kommentarer:</h2>
			<?php

			if (!empty($comments)) {
				foreach ($comments as $comment) {
					list($time, $name, $text) = explode(' | ', $comment, 3);
					echo "<p><strong>$time</strong> - <strong>$name</strong>: $text</p>";
				}
			} else {
				echo "<p>No comments</p>";
			}

			// comments från filen my test
			//$comments = file_get_contents('comments.txt');
			//$comments = explode("\n", trim($comments));
			// all comments
			//foreach(array_reverse($comments) as $comment) {
			//	echo "<p>$comment</p><br>";
			//}
        	?>
			</div>
		</div>
	</div>
</section>

<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>