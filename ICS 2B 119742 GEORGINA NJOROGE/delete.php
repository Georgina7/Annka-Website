<?php
require_once("dbconnect.php");
session_start();
function alert($message){
			echo "<script>alert('$message');</script>";
		}

		$_POST;
		//print_r($_SESSION);
		$id = $_POST["userID"];
		//echo $id;
		$sql1 = "DELETE FROM user WHERE UserID = '$id'";
		$sql2 = "SELECT* FROM user WHERE UserID = '$id'";
		$results = mysqli_query($conn, $sql2);
		//echo $_SESSION["adminEmail"];
		if(mysqli_num_rows($results) > 0)
		{
			while($row = mysqli_fetch_assoc($results))
			{
				if ($row["Email"] == $_SESSION["adminEmail"])
				{
					echo "<script>alert('You cannot delete your own record');window.location.href='admindashboard.php';</script>";
					break;
				}
				else if(mysqli_query($conn, $sql1))
		{
			//alert("Record Succesfully Deleted");
			echo "<script>alert('Record Succesfully Deleted');window.location.href='admindashboard.php';</script>";
			//$_POST= "";
		}
		else
		{
			echo "<script>alert('Record Not Deleted');window.location.href='admindashboard.php';</script>";
			//alert("Record Not Deleted");
		}
			}
			

		

		}
		else
		{
			echo "<script>alert('Record Not Present');window.location.href='admindashboard.php';</script>";
			//alert("Record Not Present");
		}
		
		
?>