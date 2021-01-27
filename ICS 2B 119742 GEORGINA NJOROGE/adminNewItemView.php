<?php session_start();
require_once("dbconnect.php");
if(isset($_SESSION["adminEmail"]))
{
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
	<div class = "Cust">
	<form action = "adminnewitem.php" method = "post" enctype = "multipart/form-data">
		<fieldset>
		<legend><h2>Item Details</h2></legend>
		<label for = iName>Item Name </label>
		<br><br>
		<input type = text name = iname id = IName >
		<br><br>
		<label for = iPrice>Item Price </label>
		<br><br>
		<input type = number name = iprice id = iPrice >
		<br><br>
		<label for = iType >Select Item Type </label>
		<br><br>
		<select name = "types" id = "iType">
			<option value = "Juice">Juice</option>
			<option value = "Smoothie">Smoothie</option>
			<option value = "FruitSalad">Fruit Salad</option>
		</select>
		<br><br>
		<label for = imgtoupload>Upload new image</label>
		<br><br>
		<input type = file name = newImg id = imgtoupload>
		<br><br>
		<button type = submit id = delBut>Add</button>
		</fieldset>
		</form>
		</div>
		<br><br>
</body>
</html>

