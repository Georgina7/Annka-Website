<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="TableStyling.css">
</head>
<body>
	<?php
require_once("dbconnect.php");
$_POST;

function alert($message){
	echo "<script>alert('$message');</script>";
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];

if(is_numeric($_POST["contact"])){
	$contact = $_POST["contact"];
}
else
{
	alert("Ensure contact values are all digits");
}


if($_POST["password"] == $_POST["confirmpass"]){
	$password = $_POST["confirmpass"];
}
else
{
	alert("Ensure password field and confirm password field have the same value");
}

if(isset($fname) && isset($lname) && isset($email) && isset($contact) && isset($password))
{
	
	// $sql2 = "INSERT INTO admin(FName, LName, Email, Contact, Password) VALUES('$fname', '$lname', '$email', '$contact', '$password')";

	$parts = explode("@", $email);
	if($parts[1] == "annka.co.ke")
	{
		$user = 1;
		$sql1 = "INSERT INTO user(FName, LName, Email, Contact, Password, UserType) VALUES('$fname', '$lname', '$email', '$contact', '$password', '$user')";
		if(mysqli_query($conn, $sql1)){
			echo "<script>alert('Registration Successful');window.location.href='Login.php';</script>";
			//alert("Registration Successful");
		}
		else
		{
			alert("Registration Unsuccessful");
			echo mysqli_error($conn);
		}
	}
	else
	{
		$user = 2;
		$sql1 = "INSERT INTO user(FName, LName, Email, Contact, Password, UserType) VALUES('$fname', '$lname', '$email', '$contact', '$password', '$user')";
		if(mysqli_query($conn, $sql1)){
			echo "<script>alert('Registration Successful');window.location.href='Login.php';</script>";
			//alert("Registration Successful");
		}
		else
		{
			alert("Registration Unsuccessful");
			echo mysqli_error($conn);
		}
	}
	
	
}
else
{
	alert("Ensure all fields are filled");
}

?>

</body>
</html>