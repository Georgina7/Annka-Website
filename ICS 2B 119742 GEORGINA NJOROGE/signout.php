<?php
session_start();

session_unset();

//header("location : homepage.php");

echo "<script>window.location.href = 'homepage.php'</script>";

?>