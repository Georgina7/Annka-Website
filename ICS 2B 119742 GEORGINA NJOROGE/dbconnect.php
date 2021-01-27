<?php
$dbserver = "localhost";
$dbuser = "Enter your username";
$password = "Enter your password";
$dbname = "annkafruits";

$conn = mysqli_connect($dbserver, $dbuser, $password, $dbname);

if($conn){
	//echo "Connected sucsessfully";
}
else{
	echo "Did not connect".mysqli_connect_error();
}

?>