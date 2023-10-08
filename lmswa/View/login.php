<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<meta http-equiv="refresh" content="10"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<link rel="stylesheet" href="../View/CSS/login_style.css">
	<script type="text/javascript" src="JS/login_validate.js"></script>
</head>
<body>
	<?php
		//$uname = "";
		$uname_mail = "";
		$uname_mailErrMsg = "";
		$password = "";
		$passwordErrMsg = "";

		$allErrMsg = "";

		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$uname_mail = $errors["Uname"];
			$password = $errors["Password"];
			$uname_mailErrMsg = $errors["UserNameErrMsg"];
			$passwordErrMsg = $errors["PasswordErrMsg"];
			$allErrMsg = $errors["AllErrMsg"];
		}	
	?>

	<br><br><br><br><br>
	<form method="POST" action="../Controller/login_action.php" novalidate onsubmit="return validate(this);">
		<fieldset>
			<legend></legend><br>
			<h3 id="lgstyle">Sign In</h3><br>
			<label for="uname_mail">Username</label>
			<input type="text" name="uname_mail" id="uname_mail" value="<?php echo $uname_mail ?>" required><span id="unameErrorMsg"><?php echo $uname_mailErrMsg; ?></span><br><br>
			<label for="pword">Password</label>
			<input type="text" name="pword" id="pword" value="<?php echo $password ?>" required><span id="passwordErrorMsg"><?php echo $passwordErrMsg; ?></span><br><br>
			<input type="checkbox" id="remember" name="remember" value="">
	  		<label for="remember"> Remember me</label><br><br>
			<input type="submit" name="signin" class="sbutton" value="Sign In">
			<div>
				<h4></h4><a href="../View/forget_password.php" target="_self">Forgotten password?</a><br><br>
			</div>
			<div>
				<h4 id="h4lbrk">Don't have an account?</h4>
				<a href="../View/registration.php" target="_self">Sign Up</a>
			</div><br><br>
		</fieldset><br>
		<div class="emstyle">
			<?php echo $allErrMsg ?>
		</div><br>
		<?php include 'footer.php'; ?><br>
	</form>
</body>
</html>