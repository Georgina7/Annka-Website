<?php
require_once("dbconnect.php");
session_start();
//$_POST;
//print_r($_FILES);

$id = $_POST["itemid"];
$name = $_POST["iname"];
$price = $_POST["iprice"];
$type = $_POST["itype"];

//print_r($_FILES);


if($_FILES["newImg"]["name"] != "")
{
	//echo "Yooh";

	$original_file_name = $_FILES["newImg"]["name"];
	$file_tmp_location = $_FILES["newImg"]["tmp_name"];
	$file_path = "Pics/";
	if (move_uploaded_file($file_tmp_location, $file_path.$original_file_name))
	{
		$newPath = $file_path.$original_file_name;
	$sql = "UPDATE menu SET ItemName = '$name', ItemPrice = $price, ItemType = $type, ImageLocation = '$newPath' WHERE ItemID = '$id'";
	if(mysqli_query($conn, $sql))
	{
		echo "<script>alert('Update Successful');window.location.href='adminItemView.php';</script>";
	}
	else{
		echo "Nope".mysqli_error($conn);
	}
	}
	

}
else
{
	$sql1 = "UPDATE menu SET ItemName = '$name', ItemPrice = $price, ItemType = $type WHERE ItemID = '$id'";
	if(mysqli_query($conn, $sql1))
	{
		echo "<script>alert('Update Successful');window.location.href='adminItemView.php';</script>";
	}
	else{
		echo "Nope".mysqli_error($conn);
	}
}

//Remember to add the part where in case the user doesn't change file location newly


?>