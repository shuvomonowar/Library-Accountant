<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" href="../View/CSS/registration_style.css">
	<script src="JS/registration_validate.js"></script>
</head>
<body>
	<?php
		$fname = "";
		$fnameErrMsg = "";
		$uname = "";
		$unameErrMsg = "";
		$gender = "";
		$genderErrMsg = "";
		$email = "";
		$emailErrMsg = "";
		$mobileno = "";
		$mobilenoErrMsg = "";
		$country = "";
		$countryErrMsg = "";
		$password = "";
		$passwordErrMsg = "";
		$cpassword = "";
		$cpasswordErrMsg = "";

		$sunErrMsg = "";

		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$fname = $errors["FullName"];
			$uname = $errors["Uname"];
			$gender = $errors["Gender"];
			$email = $errors["Email"];
			$mobileno = $errors["MobileNo"];
			$country = $errors["Country"];
			$password = $errors["Password"];
			$cpassword = $errors["CPassword"];
			$fnameErrMsg = $errors["FullNameErrMsg"];
			$unameErrMsg = $errors["UserNameErrMsg"];
			$genderErrMsg = $errors["GenderErrMsg"];
			$emailErrMsg = $errors["EmailErrMsg"];
			$mobilenoErrMsg = $errors["MobileNoErrMsg"];
			$countryErrMsg = $errors["CountryErrMsg"];
			$passwordErrMsg = $errors["PasswordErrMsg"];
			$cpasswordErrMsg = $errors["CPasswordErrMsg"];
			$sunErrMsg = $errors["SunErrMsg"];
		}	
	?>

	<br>
	<form method="POST" action="../controller/registration_action.php" novalidate onsubmit="return validate(this);">
		<fieldset>
			<legend></legend>
			<h3 id="lgstyle">Sign Up</h3><br>
			<label for="fname">Full Name</label><br>
			<input type="text" id="fname" name="fname" value="<?php echo $fname ?>" required><span id="fnameErrorMsg"><?php echo $fnameErrMsg; ?></span><br><br>
			<label for="name">User Name</label><br>
			<input type="text" name="uname" id="uname" value="<?php echo $uname ?>" required><span id="unameErrorMsg"><?php echo $unameErrMsg; ?></span><br><br>
			<label>Gender</label>
			<input type="radio" name="gender" id="male" value="Male" required>
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="Female">
			<label for="female">Female</label><span id="genderErrorMsg"><?php echo $genderErrMsg; ?></span><br><br>
			<label for="email">Email</label><br>
			<input type="email" name="email" id="email" value="<?php echo $email ?>" required><span id="emailErrorMsg"><?php echo $emailErrMsg; ?></span><br><br>
			<label for="mobileno">Mobile No</label><br>
			<input type="text" name="mobileno" id="mobileno" value="<?php echo $mobileno ?>" required><span id="mobilenoErrorMsg"><?php echo $mobilenoErrMsg; ?></span><br><br>
			<label for="country">Country</label>
			<select name="country" id="country">
				  <option value="Not Selected">--Select Country--</option>
				  <option value="Bangladesh">Bangladesh</option>
				  <option value="India">India</option>
				  <option value="Saudi Arabia">Saudi Arabia</option>
				  <option value="USA">USA</option>
				  <option value="Australia">Australia</option>
			</select><span id="countryErrorMsg"><?php echo $countryErrMsg; ?></span><br><br>
			<label for="password">Password</label><br>
			<input type="text" name="password" id="password" value="<?php echo $password ?>" required><span id="passwordErrorMsg"><?php echo $passwordErrMsg; ?></span><br><br>
			<label for="cpassword">Confirm Password</label><br>
			<input type="text" name="cpassword" id="cpassword" value="<?php echo $cpassword ?>" required><span id="cpasswordErrorMsg"><?php echo $cpasswordErrMsg; ?></span><br><br>
			<input type="submit" name="submit" class="sbutton" value="Sign Up"><br><br>
			<div>
				<h4 id="h4lbrk">Already have an account?</h4>
				<a href="login.php" target="_self">Sign In</a>
			</div><br><br>
		</fieldset>
	</form>
	<?php
	/*
	if($_GET) {
		//$errors =  $_GET['errors'];
		//$sunErrMsg = $errors;
		$sunErrMsg = $_GET['user'];
	}
	*/
	?>
	<div class="emstyle">
		<br><?php echo $sunErrMsg; ?>
	</div>
	<?php include 'footer.php'; ?><br>
</body>
</html>