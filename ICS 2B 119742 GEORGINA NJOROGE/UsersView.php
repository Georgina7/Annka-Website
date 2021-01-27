	<?php
				    require_once("dbconnect.php");
				    session_start();
				    $_POST;
				    $email = $_POST["emailAdd"];
				    $password = $_POST["password"];
				    
				    function alert($message){
						echo "<script>alert('$message');</script>";
					}				

				    if(isset($email) && isset($password))
				    {
				    	$sql = "SELECT UserType FROM user WHERE Email = '$email'AND Password = '$password'";
				    	$results = mysqli_query($conn, $sql);
				    	if(mysqli_num_rows($results) > 0)
				    	{
				    		$row = mysqli_fetch_assoc($results);
				    		if($row["UserType"] == 1)
				    		{
				    			echo "<script>alert('Login Successful');window.location.href='AdminOrdersView.php';</script>";
				    			$_SESSION["adminEmail"] = $email;
				    		}
				    		else if($row["UserType"] == 2)
				    		{
				    			echo "<script>alert('Login Successful');window.location.href='Menu.php';</script>";
				    			$_SESSION["custEmail"] = $email;

				    		}
				    		
				    	}
				    	else
				    	{
				    		//alert("Invalid credentials");
				    		echo "<script>alert('Invalid Credentials');window.location.href='Login.php';</script>";
				    	}
				    }
				    else
				    {
				    	alert("Ensure all fields are filled");
				    }

				    ?>


				 

				    