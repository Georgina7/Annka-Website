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
			$actionink = "signout.php";
		}
	}
	else
	{
		echo "No data";
	}
}else
{
	$fname = "Join Us";
	$lname = "Today";
	$action = "Sign In";
	$actionink = "Login.php";
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
			<button>Menu</button>
			<div class="dropdown">
				<button class="dropbtn"><?php echo $fname."   ".$lname?></button>
				<div class="dropdown-content">
					<a href="CustomerView.php">My Profile</a>
					<a href="MyOrders.php">My Orders</a>
					<a href='<?php echo $actionink ?>'><?php echo $action?></a>
				</div>
			</div>
			
		</div>
	</div>

	<div class = "Cust">
		<h3>My Order</h3>
		<?php
		//print_r($_SESSION["basket"]);

		if(isset($_SESSION["basket"]))
		{
			$total = 0;				
			for($i = 0; $i < sizeof($_SESSION["basket"]); $i++)
			{
					
					$name = $_SESSION["basket"][$i]["name"];
					$price = $_SESSION["basket"][$i]["price"];
					$quantity = $_SESSION["basket"][$i]["count"];
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
		 <button onclick =\"var c = confirm('Are you sure you want to place this order?'); window.location.href = c == true ? 'MyOrders.php?action=add':'Order.php'\" id = \"checkOut\">Check Out</button>
			
			";
		}
		else
		{
			echo "<script>window.location.href = 'Menu.php'</script>";
		}
		//\"editNumber.php?action=add&id=$i\"

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

