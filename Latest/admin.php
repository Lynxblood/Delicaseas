<?php
	include "conn.php";	
	if(!empty($_SESSION["id"])){
		$id = $_SESSION["id"];
		$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
		$row = mysqli_fetch_assoc($result);
		
		$typeactive = $row['type'];
		if($typeactive == 1){
			header("location: menu.php");
		}
	}
	else{
		header("location:login.php");
	}
if(isset($_POST['menu'])){
		header("location: menu.php");
	}
if(isset($_POST['logout'])){
		header("location: logout.php");
	}

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
$statusMsg = '';

$foodtitle = $_POST['foodtitle'];
$foodprice = $_POST['foodprice'];
$foodinfo = $_POST['foodinfo'];

$folder= "Img/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $folder . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $insert = mysqli_query($conn,"INSERT into cardtable VALUES (NULL, '".$folder.$fileName."','$foodtitle', '$foodprice', '$foodinfo')");
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
	<title>Admin</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
<div class="navbox">
	<nav class="admin-navbar">
		<div class="profile">
			<img src="<?php echo $row['profile']?>">
			<div class="name">
				<h2>Admin: <?php echo $row["username"]?></h2>
				<h6>Id: <?php echo $row["id"]; ?></h6>
			</div>
		</div>
		<div class="btns">
		<form action="#" method="post">
			<button class="navbtn" name="menu">Menu</button>
			<button class="navbtn" name="useracc">User Accounts</button>
			<button class="navbtn" name="products">Products</button>
			<button class="navbtn" name="newdp">Upload profile</button>
			<button class="navbtn" name="logout">Log-out</button>
		</form>
		</div>
	</nav>
	
	<div class="admin-title">
		<h1><?php 
		if(!isset($_POST["useracc"]) && !isset($_POST["products"])){
			echo "Admin Login History";
		}
		if(isset($_POST["useracc"])){
			echo "User Accounts Table";
		}
		if(isset($_POST["products"])){
			echo "New Products";
		}
		?> </h1>
	</div>
</div>

<div class="whole">

<?php
if(isset($_POST['useracc'])){
echo'
	<div class="useracc">
<table class="table userlog" border="3" >
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Address</th>
		</tr>
	</thead>
	<tbody>';
?>
		<?php
			$allusers = mysqli_query($conn, "SELECT * FROM users WHERE type='1'");
			while($rowuser = mysqli_fetch_assoc($allusers)){
		?>	
		<tr>
			<td><?php echo $rowuser['username'];?></td>
			<td><?php echo $rowuser['email'];?></td>
			<td><?php echo $rowuser['address'];?></td>
		</tr>
		<?php
		}
		?>
<?php
echo '
	</tbody>
</table>
	</div>';
}
?>

<?php
if(isset($_POST['products'])){
	echo'
	<div class="table products">
		<form class="uploadimg" action="#" method="post" enctype="multipart/form-data">
	    	<label for="file">Upload a new Product</label>
    		<input class="choose" type="file" name="file">
    		<input type="text" name="foodtitle" placeholder="food name">
	    	<input type="text" name="foodprice" placeholder="food price">
    		<input type="text" name="foodinfo" placeholder="food description">
    		<button type="submit" name="upload" class="upload">Upload</button>
		</form>
	</div>';
	}
?>

<?php
	if(isset($_POST['newdp'])){
		echo'
	<div class="table img">
		<form class="uploadimg" action="#" method="post" enctype="multipart/form-data">
	    	<label for="file">Upload a new Profile</label>
    		<input class="choose" type="file" name="file">
    		<button type="submit" name="updatedp" class="upload">Upload</button>
		</form>
	</div>';
	}
?>
	<div class="history">
<table class="table Loghist" border="3">
	<thead>
		<tr>
			<th>Admin Username</th>
			<th>Date/Time</th>	
		</tr>
	</thead>
	<tbody>
		<?php
			$alladmin = mysqli_query($conn, "SELECT * FROM users WHERE type='0'");
			while($rowall = mysqli_fetch_assoc($alladmin)){
		?>	
		<tr>
			<td><?php echo $rowall['username'];?></td>
			<td><?php echo $rowall['last_activity'];?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
	</div>
</div>
	<script src="script.js"></script>
	<script src="https://kit.fontawesome.com/a2ecc9f30f.js" crossorigin="anonymous"></script>
</body>
</html>