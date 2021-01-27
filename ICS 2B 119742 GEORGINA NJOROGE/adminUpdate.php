<?php
require_once("dbconnect.php");
session_start();
$_POST;
//print_r($_POST);
$curCust = $_POST["origEmail"];

$newEmail = $_POST["email"];
$newFName = $_POST["fname"];
$newLName = $_POST["lname"];
$newContact = $_POST["cont"];


if($newEmail == $curCust)
{
	$sql2 = "UPDATE user SET FName = '$newFName', LName = '$newLName', Email = '$newEmail', Contact = '$newContact' WHERE Email = '$curCust'";
	if(mysqli_query($conn, $sql2))
	{
		echo "<script>alert('Update Successful');window.location.href='admindashboard.php';</script>";
		
	}
}
else
{
	$sql1 = "SELECT Email FROM user WHERE Email = '$newEmail'";
	$result = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result) > 0)
	{
		echo "<script>alert('Email is already in use');window.location.href='AdminUpdateView.php';</script>";
		
	}
	else
	{
		$sql2 = "UPDATE user SET FName = '$newFName', LName = '$newLName', Email = '$newEmail', Contact = '$newContact' WHERE Email = '$curCust'";
		if(mysqli_query($conn, $sql2))
		{
			if ($_SESSION["adminEmail"] == $curCust)
			{
				$_SESSION["adminEmail"] = $newEmail;
			}
			echo "<script>alert('Update Successful');window.location.href='admindashboard.php';</script>";
			
		}

	}
}


?>
