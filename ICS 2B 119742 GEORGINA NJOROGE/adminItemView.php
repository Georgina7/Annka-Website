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

	<a name = "myBasket">

	<div class = "sidenav">
		<h3>My Options</h3>
		<button id = "New"><a href="adminNewItemView.php">Add New Item</a></button>
		<form action = "AdminItemUpdateView.php" method = "post">
			<fieldset>
				<h4>Update</h4>
				<!-- <label for = "ID">Enter Item ID</label> -->
				<input type="text" name="itemID" id = "ID" class = "basketItem" placeholder="Enter Item ID">
				<br>
				<button type = "submit">Update</button>
			</fieldset>
		</form>	
		<form action = "adminitemdelete.php" method = "post">
			<fieldset>
				<h4>Delete</h4>
				<!-- <label for = "ID">Enter Item ID</label> -->
				<input type="text" name="itemID" id = "ID" class = "basketItem" placeholder="Enter Item ID">
				<br>
				<button type = "submit">Delete</button>
			</fieldset>
		</form>	
	</div>
	</a>

</body>
</html>

<script>

	

	function getID(btn)
	{
		var idea = btn.id;
		//alert("Button Clicked: " + idea);
		return idea;
		
		
	}

	function changeView(btn1)
	{
		var j = document.getElementById("juice");
		var sm = document.getElementById("smoothie");
		var sl = document.getElementById("salad");

		var view = getID(btn1);
		
		if(view == "juiceBtn")
		{
			//alert("JUUIIICCEEE" + j.id + sm.id + sl.id);
			sm.style.display = 'none';
			sl.style.display = 'none';
			j.style.display = 'block';
		}
		else if(view == "smoothieBtn")
		{
			//alert("SMOOTHIIEEE");
			sm.style.display = 'block';
			sl.style.display = 'none';
			j.style.display = 'none';
			
		}
		else if(view == "fsaladBtn")
		{
			//alert("SALAAAADDD");
			sm.style.display = 'none';
			sl.style.display = 'block';
			j.style.display = 'none';
		}
	}

	function juice()
	{
		sm.style.display = none;
		sl.style.display = none;
		j.style.display = block;

	}

	function smoothie()
	{
		sm.style.display = block;
		sl.style.display = none;
		j.style.display = none;
	}

	function salad()
	{
		sm.style.display = none;
		sl.style.display = block;
		j.style.display = none;
		alert("Salad has been clicked");
	}
</script>

<?php

$sql2 = "SELECT * FROM menu WHERE ItemType = 2";
$sql3 = "SELECT * FROM menu WHERE ItemType = 1";
$sql4 = "SELECT * FROM menu WHERE ItemType = 3";
function display($sql1, $link)
{
	$results2 = mysqli_query($link, $sql1);

	if($sql1 == $GLOBALS["sql2"])
	{
		$prefix = "Smoothie";
		$divID = "smoothie";

	}else if($sql1 == $GLOBALS["sql3"])
	{
		$prefix = "Juice";
		$divID = "juice";

	}else if($sql1 == $GLOBALS["sql4"])
	{
		$prefix = "FruitSalad";
		$divID = "salad";
	}

	echo "<div class=\"main\" id = \"$divID\">
		<div class = \"MenuSwitch\">
			<button id =\"juiceBtn\" onclick =\"changeView(this)\">Juice</button>
			<button id =\"fsaladBtn\" onclick =\"changeView(this)\">Fruit Salads</button>
			<button id =\"smoothieBtn\" onclick =\"changeView(this)\">Smoothies</button>
			<br><br>	
		</div>
		<div class = \"gridContainer\">"
		;
	
	if(mysqli_num_rows($results2) > 0)
	{
		while($row = mysqli_fetch_assoc($results2))
		{
			$id = $row["ItemID"];
			$Name = $row["ItemName"];
			$Price = $row["ItemPrice"];
			$category = $row["ItemType"];
			$imagePath = $row["ImageLocation"];

			echo "<div class=\"Item\" >
			<img src='$imagePath?'>
			<br><br>
			Item ID: ".$id."<br><br>".
			$Name."<br><br>Ksh: ".$Price."
			</div>";
		}
		echo "
	</div>
	</div>";
	}

	else
	{
		echo "";
	}

}

display($sql2, $conn);
display($sql3, $conn);
display($sql4, $conn);

?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>