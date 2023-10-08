<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgotten Password</title>
	<link rel="stylesheet" href="../View/CSS/fgpassword_style.css">
	<script type="text/javascript" src="JS/forget_password_validate.js"></script>
</head>
<body>
	<?php
		$uname = "";
		$unameErrMsg = "";
		$npassword = "";
		$npasswordErrMsg = "";
		$cpassword = "";
		$cpasswordErrMsg = "";

		$acerr_message = "";

		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$uname = $errors["Uname"];
			$npassword = $errors["NewPassword"];
			$cpassword = $errors["ConfirmPassword"];
			$unameErrMsg = $errors["UserNameErrMsg"];
			$npasswordErrMsg = $errors["NewPasswordErrMsg"];
			$cpasswordErrMsg = $errors["ConfirmPasswordErrMsg"];
			$acerr_message = $errors["AllErrMsg"];
		}
	?>
	<br>
	<br>
	<br>
	<form method="POST" action="../Controller/forget_password_action.php" novalidate onsubmit="return validate(this);">
		<br><br>
		<fieldset>
			<legend></legend><br>
			<h3 id="fgstyle">Reset Password</h3><br>
			<label for="uname">Username</label><br>
			<input type="text" name="uname" id="uname" value="<?php echo $uname ?>" required><span id="unameErrorMsg"><?php echo $unameErrMsg; ?></span><br><br>
			<label for="npword">New Password</label><br>
			<input type="text" name="npassword" id="npword" value="<?php echo $npassword; ?>" required><span id="npasswordErrorMsg"><?php echo $npasswordErrMsg; ?></span><br><br>
			<label for="cpword">Confirm Password</label><br>
			<input type="text" name="cpassword" id="cpword" value="<?php echo $cpassword; ?>" required><span id="cpasswordErrorMsg"><?php echo $cpasswordErrMsg; ?></span><br><br>
			<input type="submit" name="adsave" class="acesubmit" value="Update Details"><br><br>
			<div>
				<h4 id="h4lbrk">Don't need to update?</h4>
				<a href="../View/login.php">Sign In</a>
			</div><br><br>
		</fieldset><br>
		<div class="emstyle">
			<?php echo $acerr_message; ?>
		</div>
	</form>
	<div>
		<?php include '../View/footer.php'; ?>
	</div>
</body>
</html>