<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account</title>
</head>
<body>
	<?php
		if(!isset($_COOKIE['username'])) {
			session_unset();
			session_destroy();
			header("refresh:0; url=http://localhost/project/lmswa/View/login.php");
		}
		if(!isset($_SESSION['svalue'])) {
				header("Location: ../Controller/logout_action.php");
		}
	?><br><br>

	<?php 
		$acc_type = "Accountant";
		$email = "";
		$password = "";
		$nothing = "nothing";

		require "../Model/my_data.php";

		$datastore = my_profile_data($_SESSION["svalue"]);
		//print_r(my_profile_data($_SESSION["svalue"]));

		$email = $datastore["Email"];
		$password = $datastore["Password"];

		function acc_det() {
			return $GLOBALS["datastore"];
		}

		if(isset($_POST['adedit'])) {
			if(!isset($_SESSION['svalue'])) {
				session_start();
			}
			
			header("Location: ../View/account_edit.php");
		}
	?>
</body>
</html>