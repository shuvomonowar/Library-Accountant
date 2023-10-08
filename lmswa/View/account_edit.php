<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account Edit</title>
	<link rel="stylesheet" type="text/css" href="../View/CSS/account_edit_style.css">
	<script type="text/javascript" src="../View/JS/account_edit_validate.js"></script>
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
		require "../Controller/account_edit_action.php";

		$email = "";
		$password = "";
		$nemail = "";
		$nemailErrMsg = "";
		$npassword = "";
		$npasswordErrMsg = "";
		$cpassword = "";
		$cpasswordErrMsg = "";

		$err_message = "";
		
		$data_get = return_get_data();
		$email = $data_get["Email"];
		$password = $data_get["Password"];


		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$email = $errors["Email"];
			$nemail = $errors["NewEmail"];
			$password = $errors["Password"];
			$npassword = $errors["NewPassword"];
			$cpassword = $errors["ConfirmPassword"];
			$nemailErrMsg = $errors["NewEmailErrorMsg"];
			$npasswordErrMsg = $errors["NewPasswordErrorMsg"];
			$cpasswordErrMsg = $errors["ConfirmPasswordErrorMsg"];
			$err_message = $errors["ErrorMessage"];
		}
	?>
	<br><br><br>
	<form method="POST" action="../Controller/account_edit_action.php" novalidate onsubmit="return validate(this);">
		<fieldset>
			<legend></legend><br>
			<h3 id="acedstyle">Edit Account Details</h3><br>
			<label for="email">Current Email</label><br>
			<input type="email" id="email" name="email" value="<?php echo $email ?>" readonly><br><br>
			<label for="nemail">New Email</label><br>
			<input type="email" id="nemail" name="nemail" value="<?php echo $nemail ?>"><span id="nemailErrorMsg"><?php echo $nemailErrMsg; ?></span><br><br>
			<label for="pword">Current Password</label><br>
			<input type="text" name="pword" id="pword" value="<?php echo $password ?>" readonly><br><br>
			<label for="npword">New Password</label><br>
			<input type="text" name="npword" id="npword" value="<?php echo $npassword ?>"><span id="npasswordErrorMsg"><?php echo $npasswordErrMsg; ?></span><br><br>
			<label for="cpword">Confirm Password</label><br>
			<input type="text" name="cpword" id="cpword" value="<?php echo $cpassword ?>"><span id="cpasswordErrorMsg"><?php echo $cpasswordErrMsg; ?></span><br><br>
			<input type="submit" name="adsave" class="acesubmit" value="Update"><br><br><br>
		</fieldset><br>
		<div class="errmsg">
			<?php echo $err_message; ?>
		</div>
	</form><br>
	<div><?php include '../View/footer.php' ?></div><br><br>
</body>
</html>