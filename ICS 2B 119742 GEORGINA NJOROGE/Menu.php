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
			$action = "Sign Out";
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



function displayBasket()
{
	if(isset($_SESSION["basket"]))
{
	echo "<div class = \"sidenav\" id = \"Basket\">
				<h3>Fruit Basket</h3>
				
				";

	$total = 0;				
			for($i = 0; $i < sizeof($_SESSION["basket"]); $i++)
			{
					
					$name = $_SESSION["basket"][$i]["name"];
					$price = $_SESSION["basket"][$i]["price"];
					$quantity = $_SESSION["basket"][$i]["count"];
					$itemtotal = $price * $quantity;
					$total = $total + $itemtotal;
					echo "<div class= \"basketItem\">
					<label>$name: </label>
					<label>$itemtotal </label>
					<a href=\"editNumber.php?action=delete&id=$i\" id = \"remove\">-</a>
					<label>$quantity</label>
					<a href=\"editNumber.php?action=add&id=$i\" id = \"add\">+</a>
					
					</div>
					<br>
					";
			}

			echo "<label id = \"total\">Total: $total</label>
			<br><br>
			<button onclick =\"window.location.href='Order.php'\">Order</button>
			<br><br>
			<a href=\"editNumber.php?action=empty\" id = \"empty\">Empty Basket</a>
			<br><br>
			</div>"; 
}
	
}


displayBasket();

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

	

	
	<!-- </a> -->

</body>
</html>

<script>

	function getID(btn)
	{
		var idbtn = btn.id;
		return idbtn;		
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
		<div class = \"gridContainer\" >"
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

			echo "<div class=\"Item\">
			<img src='$imagePath?'>
			<br><br>".
			$Name."<br><br>Ksh: ".$Price."
			<br><br>
			<form action=\"Menu.php?action=add&id=<?php echo $id; ?>\" method=\"post\">			
			<button type = \"submit\" value = '$id' name = \"itemID\">Add To Basket</button>
			</form>
			</div>";
		}
		//onclick = \"getID(this);  return false;\" 
		echo "
	</div>
	</div>";
	}

	else
	{
		//print_r($_POST);
	}

}


function myBasket($conn)
{
			$id = $_POST["itemID"];
			if(!isset($_SESSION["basket"])){
					$_SESSION["basket"] = array();
					}

			$index = -1;

			for($i = 0; $i < sizeof($_SESSION["basket"]); $i++)
			{
				if($_SESSION["basket"][$i]["id"] == $id)
				{
					$index = $i;
				}
			}

			if($index != -1)
			{
				$_SESSION["basket"][$index]["count"]++;
			}
			else
			{
				$sql = "SELECT ItemName, ItemPrice FROM menu WHERE ItemID = '$id'";
				$val = 1;
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0) 
				{
					while($row = mysqli_fetch_assoc($result))
					{					
						$itemArray = array("id" => $id, "name" => $row["ItemName"], "price" => $row["ItemPrice"], "count" => $val);					
					}

					$arrSize = count($_SESSION["basket"]);

					$_SESSION["basket"][$arrSize] = $itemArray;
				}

			}


	displayBasket();

	}




display($sql2, $conn);
display($sql3, $conn);
display($sql4, $conn);
if(!empty($_POST))
{
	myBasket($conn);
}

echo"<br><br><br><br>";
//print_r($_SESSION["basket"]);
//unset($_SESSION["basket"]);

?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>