<?php
require_once("dbconnect.php");
session_start();
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

	<div class = "Cust">
		<h3>My Order</h3>
		<?php
		$total = 0;

		$ordID = $_POST["ID"];


		$sql3 = "SELECT orderitem.Quantity, menu.ItemName, menu.ItemPrice FROM orderitem INNER JOIN menu ON orderitem.ItemID = menu.ItemID AND orderitem.OrderID = '$ordID'";
		$items = mysqli_query($conn, $sql3);
		if(mysqli_num_rows($items) > 0)
		{
			while($item = mysqli_fetch_assoc($items))
			{
				$name = $item["ItemName"];
				$price = $item["ItemPrice"];
				$quantity = $item["Quantity"];
				$itemtotal = $price * $quantity;
				$total = $total + $itemtotal;
				echo "<div class= \"basketItem\">
					<label>$quantity - </label>
					<label>$name: </label>
					<label>Ksh. $itemtotal </label>											
					</div>
					<br>
					";
			}

			echo "<label id = \"total\">Total: $total</label>
			<br><br>
			<button onclick =\"window.location.href = 'MyOrders.php'\" id = \"checkOut\">Back</button>
			<br><br>
			";
		}				
			?>
		
	</div>
	<br><br>

	<!-- <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	</script> -->

</body>
</html>