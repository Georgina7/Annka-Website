<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="HomepageStyling.css">
</head>
<body>
	<div class="topNav">
		<div class="label">ANNKA</div>
		<div class="navBut">

			<button>Home</button>
			<button onclick="window.location.href='menu.php'">Menu</button>
			<button onclick="window.location.href='#Contacts'">Contact</button>
			<button id="SignIn" onclick="window.location.href='login.php'">Sign In</button>
		</div>
	</div>
	
	<div class="overFold">
		<div class="circle bluefont">ANNKA
		<img src="Pics/this.jpg" class="img">
		</div>
		<p><h1 class="bluefont">Build your immunity on the go</h1></p>
		<!-- <br><br> -->
		<p><h2 class="bluefont">Order your fruit salads, smoothies and fruit juice and have them delivered to you fresh and ready to be enjoyed</h2></p>
		<button id="Order" onclick="window.location.href='Menu.php'">Order Now</button>
		<!-- <br><br> -->
		

	</div>

	<h3 class="bluefont">Why ANNKA?</h3>


	<div class="another">
		<div><img src="Pics/Garden.jpg" class="img2" ></div>
		<div class="textInDivs">
			<br>
			<p>Fruits freshly picked from the farm</p>
			<!-- <br> -->
			<p>All grown organically by trusted partners</p>
		</div>
		
	</div>

	<div class="bigdiv">
		<div class="white">
			<div>
				<img src="Pics/Smoothie.jpg" class="imgInDivs">
			</div>
			<div class="textInDivs">
				<p>Additive free smoothies</p>
			</div>
		</div>

		<div class="white">
			<div>
				<img src="Pics/2.jpg" class ="imgInDivs">
			</div>
			<div class="textInDivs">
				<p>Fruit Salads with wide variety of fruits</p>
			</div>
		</div>
		<br><br>

		
		<br><br>

		<div class="white">
			<div>
				<img src="Pics/Juice2.jpg" class="imgInDivs">
			</div>
			<div class="textInDivs">
				<p>Freshly squeezed juice</p>
			</div>
		</div>
	</div>

	<div class="bottomNav" id = "Contacts">
		<div class="extras">
			
			<ul>
				<li><h3>Contact Us</h3></li>
				<li>customercare@annka.co.ke</li>
				<li>+254 788 878 982</li>
				<li>+254 788 878 982</li>
			</ul>
		</div>
		<div class="extras">
			
			<ul>
				<li><h3>Follow Us</h3></li>
				<li>Twitter</li>
				<li>Facebook</li>
				<li>Instagram</li>
			</ul>
		</div>
		<div class="extras">
			
			<ul>
				<li><h3>Offers</h3></li>
				<li>Coupons</li>
				<li>Monthly Newsletters</li>
				<li>Blogs</li>
			</ul>
		</div>
	</div>


</body>
</html>