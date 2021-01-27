<?php
session_start();

if(isset($_SESSION["adminEmail"]))
{
	require_once("dbconnect.php");
	$curAdmin = $_SESSION["adminEmail"];	
	$sql3 = "SELECT* FROM user WHERE Email = '$curAdmin'";
	$result = mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$fname = $row["FName"];
			$lname = $row["LName"];
		}
	}
}else
{
	echo "<script>window.location.href = 'Login.php'</script>";
}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin View</title>
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
	$sql4 = "SELECT user.UserID, user.FName, user.LName, user.Email, user.Contact, usertype.TypeName FROM user JOIN usertype ON user.UserType = usertype.TypeID;";
$result = mysqli_query($conn, $sql4);
if(mysqli_num_rows($result) > 0){
	//echo "Results obtained";
	echo " <div class = \"main\"><center>
	<h3>Users</h3>";
	echo"
	<table id = \"userTable\">
			<tr>
			<th colspan = 1>UserID</th>
    <th colspan = 1>FName</th>
    <th colspan = 1>LName</th>
    <th colspan = 1>Email</th>
    <th colspan = 1>Contact</th>
    <th colspan = 1>User Type</th>
    
			</tr>
			
		 ";

		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>".$row["UserID"]."</td>"."<td>".$row["FName"]."</td>"."<td>".$row["LName"]."</td>"."<td>".$row["Email"]."</td>"."<td>".$row["Contact"]."</td>"."<td>".$row["TypeName"]."</td>"."</tr>";
		}

		echo "</table></center>";
}

else{
	echo "Results not obtained";
}



echo "<div class = \"sidenav\">";
echo "<form action = \"delete.php\" method = \"post\">
<fieldset><center>
<legend><h3>Deleting users</h3></legend>

		<input type = text name = userID id = usID class = \"basketItem\" placeholder=\"Enter Item ID\">
		<br><br>
		<button type = submit id = delBut>Delete</button>
		<br><br></center>

		</fieldset>
		</form>
		
		";	

		echo "<form action = \"AdminUpdateView.php\" method = \"post\">
<fieldset><center>
<legend><h3>Update users</h3></legend>

		<input type = text name = userIDUpdate id = userID class = \"basketItem\" placeholder=\"Enter Item ID\">
		<br><br>
		<button type = submit id = delBut>Update</button>
		<br><br></center>

		</fieldset>
		</form>
		</div>"	;
	?>



	<!-- <h3>Update users</h3>
		 -->
</body>
</html>