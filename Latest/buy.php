<?php
	require 'conn.php';
	
	$id = $_GET['id'];
	
	$sql = mysqli_query($conn, "SELECT * FROM cardtable WHERE id='$id'");
	$row = mysqli_fetch_assoc($sql);
	
	$img = $row['foodimg'];
	$title = $row['foodtitle'];
	$price = $row['foodprice'];
	$foodinfo = $row['foodinfo'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="veiwport" content="width=device-width, initial-scale=1.0"/>
	<title>Activity 2</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
<div class="navbox">
	<nav class="navbar">
		<h1> <img src="Logo1.png"></h1>
		<ul id="dropdown">
			<li> <a href="menu.php"><button>Home</button></a></li>
			<li> <a href="help.html"><button>Help</button></a></li>
			<li> <a href="feedback.html"><button>Feedback</button></a></li>	
			<li> <a href="address.php"><button>Address</button></a></li>	
		</ul>
		<button class="men-btn" onclick="menutoggle()"><i class="fa-sharp fa-solid fa-bars" ></i>
		</button>
	</nav>
	<div class="today">
		<h1>Your Order</h1>
	</div>
</div>

<div class="sel-prod">
	<img class="prod-img" src="<?php echo $img;?>">
	<div class="prod-info">
		<h1 class="prod-title"><?php echo $title;?></h1>
		<h2 class="prod-Price">PHP: <?php echo $price;?></h2>	
	</div>
	<div class="prod-desc">
		<p><?php echo $foodinfo; ?></p>
	</div>
</div>

<div class="container-buy">
		<form id="del-buy">
			<input type="email" placeholder="Email" >
			<input type="text" placeholder="Contact Number" >
			
			<div class="radbtn">
				<input id="radio-btn" type="radio" name="pay" id="gcash" onclick="showValue()" value="Gcash">
				<label for="gcash">Gcash</label>
			
				<input id="radio-btn" type="radio" name="pay" id="card" onclick="showValue()" value="Card">
				<label for="card">Card</label>
			
				<input id="radio-btn" type="radio" name="pay" id="load" onclick="showValue()" value="COD">
				<label for="load">Cash On Delivery</label>
			</div>
			
			<input type="text" id="plch-box" class="number" placeholder="Choose your payment!" >
			<button type="Submit" onclick="payNow()"class="btn">Buy Now</button>
		</form>
</div>	
<footer>
	<div class="col col-1">
		<h3>Seafoods</h3>
		<a href="" >Recipe</a>
		<a href="" >Suggestions</a>
		<a href="" >About Food</a>
		<a href="" >Services</a>
	</div>
	
	<div class="col col-2">
		<h3>More from us</h3>
		<a href="" >Refund Policy</a>
		<a href="" >Privacy Policy</a>
		<a href="" >Payments</a>
		<a href="" >Help</a>
	</div>
	
	<div class="col col-">
		<h3>Contact us</h3>
		<a href="" ><i class="bi bi-facebook"> Facebook</i></a>
		<a href="" ><i class="bi bi-twitter"> Twitter</i></a>
		<a href="" ><i class="bi bi-instagram"> Intsagram</i></a>
		<a href="" ><i class="bi bi-envelope-at-fill"> Email</i></a>
	</div>
</footer>
	<script src="script.js"></script>
	<script src="https://kit.fontawesome.com/a2ecc9f30f.js" crossorigin="anonymous"></script>
</body>
</html>