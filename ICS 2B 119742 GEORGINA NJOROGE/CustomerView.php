<?php session_start();
require_once("dbconnect.php");

if(isset($_SESSION["custEmail"]))
{
	$curCust = $_SESSION["custEmail"];
	$sql = "SELECT FName, LName, Email, Contact, Password FROM user WHERE Email = '$curCust'";

	$results = mysqli_query($conn, $sql);

	if(mysqli_num_rows($results) > 0)
	{
		while($row = mysqli_fetch_assoc($results))
		{
			$fname = $row["FName"];
			$lname = $row["LName"];
			$em = $row["Email"];
			$contact = $row["Contact"];
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
	<title>Customer View</title>
	<link rel="stylesheet" type="text/css" href="Updates-Delete.css">
</head>
<body>
	<div class="topNav">
		<div class="label">ANNKA</div>
		<div class="navBut">
			<button onclick ="window.location.href='homepage.php'">Home</button>
			<button onclick="window.location.href = 'Menu.php'">Menu</button>
			<div class="dropdown">
				<button class="dropbtn"><?php echo $fname."   ".$lname?></button>
				<div class="dropdown-content">
					<a href="CustomerView.php">My Profile</a>
					<a href="MyOrders.php">My Orders</a>
					<a href="signout.php">Sign Out</a>
				</div>
			</div>
			
		</div>
	</div>
	<?php
	
	echo "<div class = \"Cust\">
	<form action = \"update.php\" method = \"post\">
		<fieldset>
		<legend><h2>User Details</h2></legend>
		<label for = FName>First Name </label>
		<br><br>
		<input type = text name = fname id = FName value = '$fname' >
		<br><br>
		<label for = LName>Last Name </label>
		<br><br>
		<input type = text name = lname id = LName value = '$lname' >
		<br><br>
		<label for = usEmail>Email </label>
		<br><br>
		<input type = Email name = email id = usEmail value = '$em'>
		<br><br>
		<label for = Contact>Contact </label>
		<br><br>
		<input type = text  name = cont id = Contact value = '$contact'>
		<br><br>
		<button type = submit id = delBut>Update</button>
		</fieldset>
		</form>
		</div>
		";


	?>
</body>
</html>