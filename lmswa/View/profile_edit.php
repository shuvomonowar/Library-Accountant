<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Edit</title>
	<link rel="stylesheet" type="text/css" href="../View/CSS/profile_edit_style.css">
	<script type="text/javascript" src="JS/profile_edit_validate.js"></script>
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
		require "../Controller/profile_edit_action.php";

		$fname = "";
		$fnameErrMsg = "";
		//$gender = "";
		//$genderErrMsg = "";
		$mobileno = "";
		$mobilenoErrMsg = "";
		$country = "";
		$countryErrMsg = "";
		$emessage = "";
		
		$data_get = return_get_data();
		$fname = $data_get["FullName"];
		//$gender = $data_get["Gender"];
		$mobileno = $data_get["MobileNo"];
		$country = $data_get["Country"];

		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$fname = $errors["FullName"];
			//$gender = $errors["Gender"];
			$mobileno = $errors["MobileNo"];
			$country = $errors["Country"];
			$emessage = $errors["ErrMessage"];
			$fnameErrMsg = $errors["FullNameErrMsg"];
			//$genderErrMsg = $errors["GenderErrMsg"];
			$mobilenoErrMsg = $errors["MobileNoErrMsg"];
			$countryErrMsg = $errors["CountryErrMsg"];
		}
	?>
	<br><br><br><br><br><br>
	<form method="POST" action="../Controller/profile_edit_action.php" novalidate onsubmit="return validate(this);">
		<fieldset>
			<legend></legend><br>
			<h3 id="predstyle">Edit Profile Details</h3><br>
			<label for="fname">Full Name</label><br>
			<input type="text" id="fname" name="fname" value="<?php echo $fname ?>" required><span id="fnameErrorMsg"><?php echo $fnameErrMsg ?></span><br><br>
			<!--<label for="gender">Gender</label><span style="color: green; font-weight: bold;"><?php //echo " *Gender must be either 'Male' or 'Female' " ?></span><br>
			<input type="text" name="gender" id="gender" value="<?php //echo $gender ?>" required><span id="genderErrorMsg"><?php //echo $genderErrMsg ?></span><br><br>-->
			<label for="mobileno">Mobile No</label><br>
			<input type="text" name="mobileno" id="mobileno" value="<?php echo $mobileno ?>" required><span id="mobilenoErrorMsg"><?php echo $mobilenoErrMsg ?></span><br><br>
			<label for="country">Country</label><br>
			<input type="text" name="country" id="country" value="<?php echo $country ?>" required><span id="countryErrorMsg"><?php echo $countryErrMsg ?></span><br><br>
			<input type="submit" name="pdsave" class="pdsubmit" value="Save"><br><br><br>
		</fieldset><br>
		<?php echo $emessage; ?>
		<br>
	</form>
	<?php echo $gender; ?>
	<div><?php include '../View/footer.php' ?></div><br><br>
</body>
</html>