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



<div class = "formularregister">
	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
	    <h3>Register</h3><br />
			<label for="username">Username:</label><br />
			<input type="text" id="username" placeholder="alex25" name="username" value="<?php echo htmlspecialchars($username); ?>"><br />
			<?php if ($usernameError) { echo "<p style='color:red;'>$usernameError</p>"; } ?>

			<label for="password">Password:</label><br />
			<input type="text" id="password" placeholder="xxxxx" name="password" value="<?php echo htmlspecialchars($password); ?>"><br />
			<?php if ($passwordError) { echo "<p style='color:red;'>$passwordError</p>"; } ?>

			<label for="password_again">Password again:</label><br />
			<input type="text" id="password_again" placeholder="xxxxx" name="password_again" value="<?php echo htmlspecialchars($password_again); ?>"><br />
			<?php if ($passwordAgainError) { echo "<p style='color:red;'>$passwordAgainError</p>"; } ?>

			<label for="firstname">First name:</label><br />
			<input type="text" id="firstname" placeholder="Alex" name="firstname" ><br />
			<label for="lastname">Last name:</label><br />
			<input type="text" id="lastname" placeholder="Snow" name="lastname" ><br />

			<label for="email-field">E-mail:</label><br />
			<input type="text" id="email-field" placeholder="alex25@gmail.com" name="email-field" value="<?php echo htmlspecialchars($email); ?>"><br />
			<?php if ($emailError) { echo "<p style='color:red;'>$emailError</p>"; } ?>	
			<br>
			<input type="submit" name="submit_register" value="Register"><br />
			<br>
	</form>


	<div class="">
	<span>Already a user?  </span><a class="" href="login.php">Login here!</a>
	</div><br />

	Welcome <?php print($_REQUEST["username"]); ?> <br>
	Your email address is : <?php print($_REQUEST["email-field"]); ?> <br>
	<?php include "uppgift3.php";?>	
</div>	

<?php include "footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>