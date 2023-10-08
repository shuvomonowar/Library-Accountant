<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="../View/CSS/account_style.css">
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
		require "../Controller/account_action.php";

		$acc_type = "Accountant";
		$email = "";
		$password = "";

		$data_store = acc_det();
		$email = $data_store["Email"];
		$password = $data_store["Password"];
	?>
	<br><br><br><br><br><br>
	<form method="POST" action="../Controller/account_action.php" novalidate>
		<fieldset>
			<legend></legend><br>
			<h3 id="acstyle">Account Details</h3><br>
			<div class="accpadding">
				<label for="actype">Account Type</label><br>
				<input type="text" id="actype" name="actype" value="<?php echo $acc_type; ?>" readonly><br><br>
				<label for="email">Email</label><br>
				<input type="email" id="email" name="email" value="<?php echo $email ?>" readonly><br><br>
				<label for="pword">Password</label><br>
				<input type="text" name="password" id="pword" value="<?php echo $password ?>" readonly><br><br>
				<input type="submit" name="adedit" class="acesubmit" value="Edit Details"><br><br><br>
			</div>
		</fieldset><br>
	</form>
	<div>
		<?php include '../View/footer.php'; ?>
	</div>
</body>
</html>