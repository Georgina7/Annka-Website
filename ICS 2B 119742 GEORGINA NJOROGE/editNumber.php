<?php
 session_start();


//print_r($_GET);
//print_r($_SESSION["basket"]);

if($_GET["action"] == "add")
{
	$index = $_GET["id"];
	$_SESSION["basket"][$index]["count"]++;
	echo "<script>window.location.href = 'Menu.php'</script>";
}

else if($_GET["action"] == "delete")
{
	$index = $_GET["id"];
	if($_SESSION["basket"][$index]["count"] == 1)
	{
		array_splice($_SESSION["basket"], $index, 1);
	}
	else
	{
		$_SESSION["basket"][$index]["count"]--;
	}

	echo "<script>window.location.href = 'Menu.php'</script>";		
}

else if($_GET["action"] == "empty")
{
	unset($_SESSION["basket"]);
	echo "<script>window.location.href = 'Menu.php'</script>";
}
?>