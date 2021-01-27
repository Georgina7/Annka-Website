<?php
require_once("dbconnect.php");
session_start();

if(isset($_SESSION["adminEmail"]))
{
	$curAdmin = $_SESSION["adminEmail"];
	$sql = "SELECT UserID, FName, LName, Email, Contact, Password FROM user WHERE Email = '$curAdmin'";

	$results = mysqli_query($conn, $sql);

	if(mysqli_num_rows($results) > 0)
	{
		while($row = mysqli_fetch_assoc($results))
		{
			$userID = $row["UserID"];
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
	<title>Add Food</title>
	<link rel="stylesheet" type="text/css" href="MenuDesign.css">
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

</body>
</html>

<?php
$sql4 = "SELECT OrderID FROM customerorder LIMIT 1";
$firstRecord = mysqli_query($conn, $sql4);
if(mysqli_num_rows($firstRecord) > 0)
{
	$row = mysqli_fetch_assoc($firstRecord);
	$curOrder = $row["OrderID"];	
}

$sql4 = "SELECT customerorder.OrderID, customerorder.Date_Time, customerorder.CustomerID, user.FName, user.LName, user.Email, user.Contact FROM customerorder INNER JOIN user ON customerorder.CustomerID = user.UserID";


$results = mysqli_query($conn, $sql4);
if(mysqli_num_rows($results) > 0)
{
	// $row = mysqli_fetch_assoc($results);
	// $curOrder = $row["OrderID"];

	echo " <div>
	<h3><center>Orders</center></h3>";
	echo"<center>
	<table id = \"userTable\">
			<tr>
			<th colspan = 1>Order ID</th>
			<th colspan = 1>Date_Time</th>
			<th colspan = 1>Order Total</th>
			<th colspan = 1>Order Items</th>			
		 ";

		 echo "
		<th colspan = 1>CustomerID</th>
		<th colspan = 1>First Name</th>
		<th colspan = 1>Last Name</th>
		<th colspan = 1>Email</th>
		<th colspan = 1>Contact</th>
		<th colspan = 1>View Items</th>
		</tr>";
		// echo "<tr><th colspan = 5>Customer Details</th></tr><tr>
		// <th colspan = 1>CustomerID</th>
		// <th colspan = 1>First Name</th>
		// <th colspan = 1>Last Name</th>
		// <th colspan = 1>Email</th>
		// <th colspan = 1>Contact</th>
		// </tr>";

		//echo "<tr><td>".$row["OrderID"]."</td>"."<td>".$row["Date_Time"]."</td>"."<td>".$row["Quantity"]."</td>"."<td><td>".$row["CustomerID"]."</td><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["Email"]."</td><td>".$row["Contact"]."</td></tr>";
		 //$OrderTot = 0;
	while($row = mysqli_fetch_assoc($results))
	{
		$id = $row["OrderID"];
		$sql3 = "SELECT orderitem.Quantity, menu.ItemPrice FROM orderitem INNER JOIN customerorder ON orderitem.OrderID= customerorder.OrderID INNER JOIN menu ON orderitem.ItemID = menu.ItemID AND orderitem.OrderID = '$id'";

		$orderItems = mysqli_query($conn, $sql3);
		if(mysqli_num_rows($orderItems) > 0)
		{
			$OrderTot = 0;
			$items = 0;
			while($item = mysqli_fetch_assoc($orderItems))
			{
				$itemTot = $item["Quantity"] * $item["ItemPrice"];
				$OrderTot = $OrderTot + $itemTot; 
				$items = $items + $item["Quantity"];
			}
		}
		echo "<tr><td>".$row["OrderID"]."</td>"."<td>".$row["Date_Time"]."</td><td>".$OrderTot."</td><td>".$items."</td><td>".$row["CustomerID"]."</td><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["Email"]."</td><td>".$row["Contact"]."</td><td><form action = \"AdminOrderItemView.php\" method = \"post\"><button type = submit value = '$id' name = \"ID\" >Click To View</button></form></td></tr>";
		

		if($row["OrderID"] != $curOrder)
		{
			$curOrder = $row["OrderID"];
			// echo "<tr><th colspan = 5>Order Total</th><td><b>".$OrderTot."</b></td></tr>";
			// $OrderTot = 0;
			

		
			
		}
		// $itemTot = $row["Quantity"] * $row["ItemPrice"];
		// $OrderTot = $OrderTot + $itemTot; 
		// echo "<tr><td>".$row["OrderID"]."</td>"."<td>".$row["Date_Time"]."</td>"."<td>".$row["Quantity"]."</td>"."<td>".$row["ItemName"]."</td>"."<td>".$itemTot."</td>"."</tr>";
		//print_r($row);
	}
    // echo "<tr><th colspan = 5>Order Total</th><td><b>".$OrderTot."</b></td></tr>";
    echo "<br><br><br><br>";
	echo "</table></center><br><br>";

	//echo "<script>window.location.href='AdminOrdersView.php'</script>";
}



?>