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

<!-- Här börjar login-formular -->
<div class = "formularlogin">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
		<h3>Log in</h3><br />
		<label for="username">Username:</label><br />
		<input type="text" id="username" placeholder="alex25" name="username" required="required"><br />
				
		<label for="password">Password:</label><br />
		<input type="password" id="password" placeholder="xxxxx" name="password" required="required"><br />
		<br>
		<input type="submit" name="submit_login" value="Log in"><br />
		<br>		
	</form>
	<?php include "uppgift4.php";?>
</div>


<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>