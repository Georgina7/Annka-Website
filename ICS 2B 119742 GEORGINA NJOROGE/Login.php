<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="AnkaStyling.css">
	<title> Annka Delicacies Login Page</title>
</head>

<body>
	<!-- <h1 id="Title">ANNKA</h1> -->

	<form action="UsersView.php" method="post">
			<fieldset class="divide">
				<div class="circle bluefont">ANNKA
					<img src="Pics/this.jpg" class="img">
				</div>
				<div>
				    <legend><h3>Login</h3></legend>				    
				    <input type="Email" name="emailAdd" id="user_email" placeholder="Email" required>
					<br><br>					
					<input type="Password" name="password" id="user_pass" placeholder="Password" required>
					<br><br>
					<button class="button" type="submit">Login</button>
					<br><br>
					<label>Don't have an account? <a href="Register.php">Click here to register</a></label>		
				 </div>
		</fieldset>
	</form>
</body>
</html>
