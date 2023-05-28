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

    if(isset($_POST["updatedp"]) && !empty($_FILES["file"]["name"])){
	$statusMsg = '';

	$folder= "Img/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $folder . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	
	
		$allowTypes = array('jpg','png','jpeg','gif','pdf');
		if(in_array($fileType, $allowTypes)){
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				$insert = mysqli_query($conn,"UPDATE users SET profile = '$folder$fileName' WHERE id = $id;");
				if($insert){
					$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
				}else{
					$statusMsg = "File upload failed, please try again.";
				} 
			}else{
				$statusMsg = "Sorry, there was an error uploading your file.";
			}
		}else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
		}
	
	echo "<script> alert('".$statusMsg."'); </script>";
	}
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
				<a class="dplink" href="updp.html">
					<div class="profile">	
						<div class="pname">
							<h2><?php echo $row["username"]?> &nbsp;</h2>
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
		<h1>Update Profile</h1>
	</div>
</div>
<!-- end of navbar -->
<div class="tableimg">
    <form class="uploadimg" action="#" method="post" enctype="multipart/form-data">
        <label for="file">Upload a new Profile</label>
        <input class="choose" type="file" name="file">
        <button type="submit" name="updatedp" class="btn">Upload</button>
    </form>
</div>

    <!--footer  -->
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