<?php
require_once("dbconnect.php");
$_POST;

function alert($message){
	echo "<script>alert('$message');</script>";
}

//print_r($_POST);
//print_r($_FILES);
$name = $_POST["iname"];
$price = $_POST["iprice"];
$type = $_POST["types"];

if($name == "" && $price == "" && $_FILES["newImg"]["name"] == "")
{
	//echo "Yooo";
	echo "<script>alert('Ensure all fields are filled');window.location.href='adminNewItemView.php';</script>";
}
else
{
	if($type == "Juice")
	{
		$cat = 1;
	}
	else if($type == "Smoothie")
	{
		$cat = 2; 
	}
	else if($type == "FruitSalad")
	{
		$cat = 3;
	}

	$original_file_name = $_FILES["newImg"]["name"];
	$file_tmp_location = $_FILES["newImg"]["tmp_name"];
	$file_path = "Pics/";
	if (move_uploaded_file($file_tmp_location, $file_path.$original_file_name))
	{
		$newPath = $file_path.$original_file_name;
	
		$sql = "INSERT INTO menu (ItemName, ItemPrice, ItemType, ImageLocation) VALUES ('$name', '$price', '$cat', '$newPath')";
		if(mysqli_query($conn, $sql))
		{
			echo "<script>alert('Item Successfully Added');window.location.href='adminItemView.php';</script>";
		}
		else
		{
			echo "<script>alert('Item Not Added');window.location.href='adminNewItemView.php';</script>";
		}
	}

	
}
?>
