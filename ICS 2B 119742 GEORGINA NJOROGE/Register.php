<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="AnkaStyling.css">
	<title>Annka Delicacies Registration Page</title>
</head>

<body id ="Reg">
	<!-- <h1 id="Title">ANNKA</h1> -->
	<form action = "process_register.php" method="post">
		<fieldset class="divide reg"><div class="circle bluefont">ANNKA
					<img src="Pics/this.jpg" class="img">
				</div>
				
			<div class="div">
				<legend><h3>Register</h3></legend>
				<!-- <label for="user_fname">First Name</label> -->
				<input type="text" name="fname" id="user_fname" placeholder="First Name" required>
				<br><br>
				<!-- <label for="user_lname">Last Name</label> -->
				<input type="text" name="lname" id="user_lname" placeholder="Last Name" required>
				<br><br>
				<!-- <label for="user_email">Email</label> -->
				<input type="Email" name="email" id="user_email" placeholder="Email" required>
				<br><br>
				<!-- <label for="user_contact">Contact</label> -->
				<input type="text" name="contact" id="user_contact" placeholder="Contact: 07..." maxlength="10" minlength="10" required>
				<br><br>
				<!-- <label for="user_pass">Password</label> -->
				<input type="Password" name="password" id="user_pass" placeholder="Password" required>
				<br><br>
				<!-- <label for="user_confirmpass">Confirm Password</label> -->
				<input type="Password" name="confirmpass" id="user_confirmpass" placeholder="Confirm Password" required>
				<br><br>
				<button class="button" type="submit">Register</button>
				<br><br>
			</div>

	</fieldset>
	</form>

</body>
</html>
