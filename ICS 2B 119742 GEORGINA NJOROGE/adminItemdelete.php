<?php
require_once("dbconnect.php");

function alert($message){
			echo "<script>alert('$message');</script>";
		}

		$_POST;
		$id = $_POST["itemID"];
		
		if($id == "")
		{
			echo "<script>alert('You have not entered an item id');window.location.href='adminItemView.php';</script>";

		}else
		{
			$sql = "SELECT * FROM menu WHERE ItemID = '$id'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				$sql1 = "DELETE FROM menu WHERE ItemID = '$id'";
				if(mysqli_query($conn, $sql1))
				{
					echo "<script>alert('Item Deleted Succesfully');window.location.href='adminItemView.php';</script>";
				}
				else
				{
					echo "<script>alert('Item has not been deleted');window.location.href='adminItemView.php';</script>";
				}

			}
			else
			{
				echo "<script>alert('Item id not valid');window.location.href='adminItemView.php';</script>";
			}
					
		}
		//echo $_SESSION["adminEmail"];
		// if(mysqli_num_rows($results) > 0)
		// {
		// 	while($row = mysqli_fetch_assoc($results))
		// 	{
		// 		if ($row["Email"] == $_SESSION["adminEmail"])
		// 		{
		// 			echo "<script>alert('You cannot delete your own record');window.location.href='admindashboard.php';</script>";
		// 			break;
		// 		}
		// 		else if(mysqli_query($conn, $sql1))
		// {
		// 	//alert("Record Succesfully Deleted");
		// 	echo "<script>alert('Record Succesfully Deleted');window.location.href='admindashboard.php';</script>";
		// 	//$_POST= "";
		// }
		// else
		// {
		// 	echo "<script>alert('Record Not Deleted');window.location.href='admindashboard.php';</script>";
		// 	//alert("Record Not Deleted");
		// }
		// 	}
			

		

		// }
		// else
		// {
		// 	echo "<script>alert('Record Not Present');window.location.href='admindashboard.php';</script>";
		// 	//alert("Record Not Present");
		// }




?>