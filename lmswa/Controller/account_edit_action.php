<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account Edit</title>
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
	?>
	<br>
	<br>
	<?php
		require "../Model/my_data.php";

		$email = "";
		$password = "";
		$nemail = "";
		$nemailErrMsg = "";
		$npassword = "";
		$npasswordErrMsg = "";
		$cpassword = "";
		$cpasswordErrMsg = "";

		$err_message = "";
		$nothing = "nothing";
		$dcsn = true;
		$tdcsn = TRUE;
		
		$data_get = my_profile_data($_SESSION["svalue"]);
		function return_get_data() {
			return $GLOBALS["data_get"];
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$email = test_input($_POST['email']);
			$nemail = test_input($_POST['nemail']);
			$password = test_input($_POST['pword']);
			$npassword = test_input($_POST['npword']);
			$cpassword = test_input($_POST['cpword']);

			if(!empty($nemail)) {
				$email = $nemail;
			}
			if(empty($npassword)) {
				if(!empty($cpassword)) {
					$npasswordErrMsg = " *fill up the new password first before confirm password";
					$tdcsn = FALSE;
				}
			}
			if(empty($cpassword)) {
				if(!empty($npassword)) {
					$npasswordErrMsg = " *fill up the confirm password";
					$tdcsn = FALSE;
				}
			}
			if(!empty($npassword) && !empty($cpassword)) {
				if($npassword != $cpassword) {
					$cpasswordErrMsg = " *new password & confirm password must be same";
					$tdcsn = FALSE;
				}
				else {
					$password = $npassword;
				}
			}
		}
		
		if(isset($_POST['adsave'])) {
			if(!isset($_SESSION['svalue'])) {
				session_start();
			}

			if($tdcsn === TRUE) {
				$dcsn = my_account_update($_SESSION["svalue"], $email, $password);
				if($dcsn === true) {
					header("Location: ../View/account.php");
				}
			}
			else {
				$err_message = " *Something went wrong.";
				$datastore = array(
					'Slash' => $nothing,
					'Email' => $email,
					'NewEmail' => $nemail,
					'Password' => $password,
					'NewPassword' => $npassword,
					'ConfirmPassword' => $cpassword,
					'NewEmailErrorMsg' => $nemailErrMsg,
					'NewPasswordErrorMsg' => $npasswordErrMsg,
					'ConfirmPasswordErrorMsg' => $cpasswordErrMsg,
					'ErrorMessage' => $err_message,
				);

				$queries = array("errors" => $datastore);
				$queryString = http_build_query($queries);

				header("Location:../View/account_edit.php?user=".$queryString);
				exit();
			}
		}
	?>
</body>
</html>