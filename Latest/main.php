<?php
	require "conn.php";
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$Rpassword =$_POST['Rpassword'];
		$address = $_POST['address'];
		$duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username ='$username' OR email='$email'");
	
	if(mysqli_num_rows($duplicate) >0){
				echo "<script> alert('Email or Username already taken'); </script>";
	}
	else{
		if($password == $Rpassword){
			$sql = "INSERT INTO users (id, username, password, email, address, last_activity ) VALUES (NULL,'$username', '$password', '$email','$address', NOW());";
			mysqli_query($conn, $sql);
			echo "<script> alert('Registration Complete'); </script>";
		}
		else{
			echo "<script> alert('Password Does not match'); </script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="veiwport" content="width=device-width, initial-scale=1.0"/>
	<title>Main Page</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
<header>
	<nav class="navbar">
		<h1> Delica-Sea's</h1>
	<!--	<ul id="dropdown">
			<li> <a href="main.html"><button class="drop-btn">Home</button></a></li>
			<li> <a href="ourstory.html"><button class="drop-btn">Our Story</button></a></li>
			<li> <a href="blog.html"><button class="drop-btn">Blog</button></a></li>	
			<li> <a href="feedback.html"><button class="drop-btn">Feedback</button></a></li>
		</ul>
	<button class="men-btn"onclick="menutoggle()"><i class="fa-sharp fa-solid fa-bars" ></i></button> -->
	</nav>
</header>

<section id="showcase">
	<div class="container">
		<h1>Delica-Sea's where you can find fresh and affordable Quality dish</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu luctus ipsum, rhoncus semper magna. Nulla nec magna sit amet sem interdum condimentum.</p>
	</div>
</section>
 
<section id="newsletter">
	<div class="logbox">
			<div class="logbtn">
				<span>Register here!</span>
			</div>
		<form id="regform" action="main.php" method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="email" name="email" placeholder="Email" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="Rpassword" placeholder="Repeat Password" required>
			<input type="text" name="address" placeholder="Address" required>
			<button type="submit"  name="submit" class="btn">Sign-up</button>	
			<a class="login" href="Login.php" >Already have account? <br>Log-in here</a>
		</form>
	</div>
</section>

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
		<a href="help.html" >Help</a>
	</div>
	
	<div class="col col-">
		<h3>Contact us</h3>
		<a href="" ><i class="bi bi-facebook"> Facebook</i></a>
		<a href="" ><i class="bi bi-twitter"> Twitter</i></a>
		<a href="" ><i class="bi bi-instagram"> Intsagram</i></a>
		<a href="" ><i class="bi bi-envelope-at-fill"> Email</i></a>
	</div>
</footer>
<script src="main.js"></script>
<script src="https://kit.fontawesome.com/a2ecc9f30f.js" crossorigin="anonymous"></script>
</body>
<html>