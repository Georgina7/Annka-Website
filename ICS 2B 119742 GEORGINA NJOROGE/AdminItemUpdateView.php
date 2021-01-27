<?php session_start();
require_once("dbconnect.php");

if(isset($_SESSION["adminEmail"]))
{
	$_POST;
	//print_r($_POST);
	$id = $_POST["itemID"];
	$curAdmin = $_SESSION["adminEmail"];
	$sql = "SELECT FName, LName FROM user WHERE Email = '$curAdmin'";

	$results = mysqli_query($conn, $sql);

	if(mysqli_num_rows($results) > 0)
	{
		while($row = mysqli_fetch_assoc($results))
		{
			$fname = $row["FName"];
			$lname = $row["LName"];
		}
	}
	else
	{
		echo "No data";
	}
}else
{
	echo "<script>window.location.href = 'Login.php'</script>";
}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Update View</title>
	<link rel="stylesheet" type="text/css" href="Updates-Delete.css">
</head>
<body>
	<div class="topNav">
		<div class="label">ANNKA</div>
		<div class="navBut">
			<button onclick ="window.location.href='homepage.php'">Home</button>
			<button style="width: 120px;" onclick ="window.location.href='adminItemView.php'">Food Details</button>
			<div class="dropdown">
				<button class="dropbtn"><?php echo $fname."   ".$lname?></button>
				<div class="dropdown-content">
					<a href="admindashboard.php">Users</a>
					<a href="AdminOrdersView.php">Orders</a>
					<a href="signout.php">Sign Out</a>
				</div>
			</div>
			
		</div>
	</div>
	<?php
	function alert($message){
		echo "<script>alert('$message');</script>";
	}	

	$sql1 = "SELECT ItemName, ItemPrice, ItemType, ImageLocation FROM menu WHERE ItemID = '$id'";
	$results1 = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($results1) > 0)
	{
		while($row = mysqli_fetch_assoc($results1))
		{
			$iname = $row["ItemName"];
			$iprice = $row["ItemPrice"];
			$itype = $row["ItemType"];
			$imgloc = $row["ImageLocation"];
		}

		echo "<div class = \"Cust\">
	<form action = \"adminitemupdate.php\" method = \"post\" enctype = \"multipart/form-data\">
		<fieldset>
		<legend><h2>Item Details</h2></legend>
		<input type = number name = itemid value = '$id' hidden>
		<label for = iName>Item Name </label>
		<br><br>
		<input type = text name = iname id = IName value = '$iname' >
		<br><br>
		<label for = iPrice>Item Price </label>
		<br><br>
		<input type = number name = iprice id = iPrice value = '$iprice' >
		<br><br>
		<input type = number name = itype id = iType value = '$itype' hidden>
		<br><br>
		<img src = '$imgloc'>
		<br><br>
		<label for = imgtoupload>Upload new image</label>
		<br><br>
		<input type = file name = newImg id = imgtoupload>
		<br><br>
		<button type = submit id = delBut>Update</button>
		</fieldset>
		</form>
		</div>
		<br><br>
		";


	}


	else 
	{
		echo "<script>alert('Item not present');window.location.href='adminItemView.php';</script>";
	}
	
	?>
</body>
</html>