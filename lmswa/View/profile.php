<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../View/CSS/profile_style.css">
</head>
<body>
	<?php include '../View/head.php'; ?>
	<br>
	<br>
	<?php
		if(!isset($_COOKIE['username'])) {
			session_unset();
			session_destroy();
			header("Location: ../View/login.php");
		}
		if(!isset($_SESSION['svalue'])) {
			header("Location: ../Controller/logout_action.php");
		}
	?>
	<?php
		require "../Controller/profile_action.php";
		
		$fname = "";
		$uname = "";
		$gender = "";
		$email = "";
		$mobileno = "";
		$country = "";

		$data_store = prof_det();
		$fname = $data_store["FullName"];
		$uname = $data_store["UserName"];
		$gender = $data_store["Gender"];
		$email = $data_store["Email"];
		$mobileno = $data_store["MobileNo"];
		$country = $data_store["Country"];

		//print_r($data_store);
	?>
	<br>
	<form method="POST" action="../Controller/profile_action.php" novalidate>
		<fieldset>
			<legend></legend><br>
			<h3 id="prstyle">Profile Details</h3><br>
			<div class="fpadding">
				<label for="fname">Full Name</label><br>
				<input type="text" id="fname" name="fname" value="<?php echo $fname ?>" readonly><br><br>
				<label for="name">User Name</label><br>
				<input type="text" name="uname" id="uname" value="<?php echo $uname ?>" readonly><br><br>
				<label for="gender">Gender</label><br>
				<input type="text" name="gender" id="gender" value="<?php echo $gender ?>" readonly><br><br>
				<label for="email">Email</label><br>
				<input type="email" name="email" id="email" value="<?php echo $email ?>" readonly><br><br>
				<label for="mobileno">Mobile No</label><br>
				<input type="text" name="mobileno" id="mobileno" value="<?php echo $mobileno ?>" readonly><br><br>
				<label for="country">Country</label><br>
				<input type="text" name="country" id="country" value="<?php echo $country ?>" readonly><br><br>
				<input type="submit" name="pdedit" class="pdsubmit" value="Edit Details"><br><br><br>
			</div>
		</fieldset><br><br>
	</form>
	<div><?php include '../View/footer.php' ?></div><br><br>
</body>
</html>