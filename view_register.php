
<!-- Här börjar register-formular -->

<h3>Register</h3><br />
	<form action="register.php" method = "get">
	
		<label for="username">Username:</label><br />
		<input type="text" id="username" placeholder="alex25" name="username"><br />
		
		<label for="firstname">First name:</label><br />
		<input type="text" id="firstname" placeholder="Alex" name="firstname" ><br />

		<label for="lastname">Last name:</label><br />
		<input type="text" id="lastname" placeholder="Snow" name="lastname" ><br />

		<label for="password">Password:</label><br />
		<input type="text" id="password" placeholder="xxxxx" name="password"><br />

		<label for="email-field">E-mail:</label><br />
		<input type="text" id="email-field" placeholder="alex25@gmail.com" name="email-field"><br />

		<label for="zipcode">Zip-code:</label><br />
		<input type="text" id="zipcode" placeholder="10300" name="zipcode" ><br />

		<label for="text">Tell about yourself:</label><br />
		<textarea name="text" id="text"></textarea><br />

		<label for="salaryname">Salary:</label><br />
			<select type="text" id="salaryname" placeholder="salary" name="salary"><br />
				<option value="1">0-1000€</option>
				<option value="2">1000-2000€</option>
				<option value="3">2000-3000€</option>
				<option value="4">3000-4000€</option>
				<option value="5">4000-5000€</option>
			</select>
			<br />	

		<label for="preferencename">Preference:</label><br />
			<select type="text" id="preferencename" placeholder="preference" name="preference"><br />
				<option value="1">Man</option>
				<option value="2">Woman</option>
				<option value="3">Both</option>
				<option value="4">Other</option>
				<option value="5">Everything</option>
			</select>
			<br />	
		<br>
		<input type="submit" name="form-submit" value="Register"><br />
		<br>
	</form> 
	
	<div class="">
		<span>Already a user?  </span><a class="" href="login.php">Login here!</a>
	</div>
	<br />

	Welcome <?php echo isset($_REQUEST["username"]) ? htmlspecialchars($_REQUEST["username"]) : ''; ?> <br>
    Your email address is: <?php echo isset($_REQUEST["email-field"]) ? htmlspecialchars($_REQUEST["email-field"]) : ''; ?> <br>

    <?php include "model_register.php" ?>





	

