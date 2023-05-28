<?php
	require "conn.php";
	if(!empty($_SESSION["id"])){
		$id = $_SESSION["id"];
		$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
		$row = mysqli_fetch_assoc($result);
	}
	else{
		header("location: login.php");
	}
	$id = $_SESSION["id"];
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
			<?php 
				if($id){
					echo '<li> <a href="logout.php"><button>Log-out</button></a></li>';
			?>
			<li>
				<a class="dplink" href="updp.php">
					<div class="profile">	
						<div class="pname">
							<h2><?php echo $row["username"]?> &nbsp;</h2>
							<!-- <h6> &nbsp; Id:</h6> -->
						</div>
						<img src="<?php echo $row['profile']?>">
					</div>
				</a>
			</li>
			<?php
				}
			?>
		</ul>
		<button class="men-btn" onclick="menutoggle()"><i class="fa-sharp fa-solid fa-bars" ></i>
		</button>
	</nav>
	<div class="today">
		<h1>Today's Menu</h1>
	</div>
</div>
	
	
<div class="food-menu">
	<?php
		$sql = mysqli_query($conn, "SELECT * FROM cardtable");
			if(!mysqli_num_rows($sql) < 1){
				while($row = mysqli_fetch_assoc($sql)){
	?>
			<div class="card">
				<img src=" 
					<?php 
						echo $row['foodimg'] ;	
					?>" >
				<header class="food-name"><?php echo $row ['foodtitle'];?></header>
				<div class="buy-price">
					<span class="price">PHP:<?php echo $row['foodprice'];?></span>
					<a href="buy.php?id=<?php echo $row['id'];?>"><button class="buy-btn">Buy Now</button></a>
				</div>
			</div>
	<?php
				}
			}
			else {
				echo 'no food';
			}		
	?>
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
<html>