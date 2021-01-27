<?php
require_once("dbconnect.php");
session_start();
function alert($message){
	echo "<script>alert('$message');</script>";
}
if(isset($_SESSION["custEmail"]))
{
	$curCust = $_SESSION["custEmail"];
	$sql = "SELECT UserID, FName, LName, Email, Contact, Password FROM user WHERE Email = '$curCust'";

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
if(isset($_SESSION["basket"]) && isset($_GET["action"]))
{
	date_default_timezone_set("Africa/Nairobi");
$DTime = date("Y-m-d h:i:sa");
$sql1 = "INSERT INTO customerorder(CustomerID, Date_Time) VALUES('$userID', '$DTime')";
mysqli_query($conn, $sql1);

$sql2 = "SELECT OrderID FROM customerorder WHERE CustomerID = '$userID' AND Date_Time = '$DTime'";

$result = mysqli_query($conn, $sql2);

if(mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_assoc($result);
	$id = $row["OrderID"];
}
for($i = 0; $i < sizeof($_SESSION["basket"]); $i++)
{
	$itemId = $_SESSION["basket"][$i]["id"];
	$quantity = $_SESSION["basket"][$i]["count"];
	$sql3 = "INSERT INTO orderitem(OrderID, ItemID, Quantity) VALUES('$id', '$itemId', '$quantity')";
	mysqli_query($conn, $sql3);
}
alert("Order Successful");
unset($_SESSION["basket"]);
}else
{
	//alert("Order Not Successful");
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
	<link rel="stylesheet" type="text/css" href="Updates-Delete.css">
</head>
<body>
	<div class="topNav">
		<div class="label">ANNKA</div>
		<div class="navBut">
			<button onclick ="window.location.href='homepage.php'">Home</button>
			<button onclick ="window.location.href='Menu.php'">Menu</button>
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php

$sql4 = "SELECT OrderID FROM customerorder WHERE CustomerID = '$userID' LIMIT 1";
$firstRecord = mysqli_query($conn, $sql4);
if(mysqli_num_rows($firstRecord) > 0)
{
	$row = mysqli_fetch_assoc($firstRecord);
	$curOrder = $row["OrderID"];	
}

$sql3 = "SELECT orderitem.OrderID, orderitem.Quantity, menu.ItemName, menu.ItemPrice, customerorder.Date_Time FROM orderitem INNER JOIN customerorder ON orderitem.OrderID = customerorder.OrderID AND customerorder.CustomerID = '$userID' INNER JOIN menu ON orderitem.ItemID = menu.ItemID";
$sql3 = "SELECT customerorder.OrderID, customerorder.Date_Time FROM customerorder INNER JOIN user ON customerorder.CustomerID = user.UserID AND customerorder.CustomerID = '$userID'";

$results = mysqli_query($conn, $sql3);
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
    <th colspan = 1>Order Items</th>
    <th colspan = 1>Order Total</th>
    <th colspan = 1>View Items</th>
    </tr>
			
		 ";
		 // $itemTot = $row["Quantity"] * $row["ItemPrice"];

		 // echo "<tr><td>".$row["OrderID"]."</td>"."<td>".$row["Date_Time"]."</td>"."<td>".$row["Quantity"]."</td>"."<td>".$row["ItemName"]."</td>"."<td>".$row["ItemPrice"]."</td>"."<td>".$itemTot."</td>"."</tr>";

		$OrderTot = 0;
	while($row = mysqli_fetch_assoc($results))
	{
		$ordId = $row["OrderID"];
		$sql = "SELECT orderitem.Quantity, menu.ItemPrice FROM orderitem INNER JOIN customerorder ON orderitem.OrderID = customerorder.OrderID INNER JOIN menu ON orderitem.ItemID = menu.ItemID AND orderitem.OrderID = '$ordId'";
		$orderItems = mysqli_query($conn, $sql);
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

		// if($row["OrderID"] != $curOrder)
		// {
		// 	$curOrder = $row["OrderID"];
		// 	echo "<tr><th colspan = 5>Order Total</th><td><b>".$OrderTot."</b></td></tr>";
		// 	$OrderTot = 0;
			
		// }
		// $itemTot = $row["Quantity"] * $row["ItemPrice"];
		// $OrderTot = $OrderTot + $itemTot; 
		echo "<tr><td>".$row["OrderID"]."</td>"."<td>".$row["Date_Time"]."</td>"."<td>".$items."</td><td>".$OrderTot."</td><td><form action = \"CustomerOrderItemView.php\" method = \"post\"><button type = submit value = '$ordId' name = \"ID\" >Click To View</button></form></td></tr>";
		//print_r($row);
	}
    //echo "<tr><th colspan = 5>Order Total</th><td><b>".$OrderTot."</b></td></tr>";
    echo "<br><br><br><br>";
	echo "</table></center><br><br>";


}else
{
	echo "<script>alert(\"You do not have previous orders\");window.location.href = 'Menu.php'</script>";
}


//unset($_SESSION["basket"]);

?>