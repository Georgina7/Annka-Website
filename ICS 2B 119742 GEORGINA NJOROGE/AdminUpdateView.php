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
	</div>
	<?php
	$_POST;
	$id = $_POST["userIDUpdate"];

	function alert($message){
		echo "<script>alert('$message');</script>";
	}		


	$sql1 = "SELECT FName, LName, Email, Contact, Password FROM user WHERE UserID = '$id'";
	$results1 = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($results1) > 0)
	{
		while($row = mysqli_fetch_assoc($results1))
		{
			$fname1 = $row["FName"];
			$lname1 = $row["LName"];
			$em1 = $row["Email"];
			$contact1 = $row["Contact"];
		}

	}


	else 
	{
		echo "<script>alert('User not present');window.location.href='admindashboard.php';</script>";
	}
	echo "<div class = \"Cust\">
	<form action = \"adminupdate.php\" method = \"post\">
		<fieldset>
		<legend><h2>User Details</h2></legend>
		<label for = FName>First Name </label>
		<br><br>
		<input type = hidden name = origEmail value = '$em1' >
		<input type = text name = fname id = FName value = '$fname1' >
		<br><br>
		<label for = LName>Last Name </label>
		<br><br>
		<input type = text name = lname id = LName value = '$lname1' >
		<br><br>
		<label for = usEmail>Email </label>
		<br><br>
		<input type = Email name = email id = usEmail value = '$em1'>
		<br><br>
		<label for = Contact>Contact </label>
		<br><br>
		<input type = text  name = cont id = Contact value = '$contact1'>
		<br><br>
		<button type = submit id = delBut>Update</button>
		</fieldset>
		</form>
		</div>
		";

	?>
</body>
</html>