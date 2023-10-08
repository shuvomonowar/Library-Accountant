<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgotten Password</title>
</head>
<body>
	<?php
		require "../Model/my_data.php";

		$uname = "";
		$unameErrMsg = "";
		$npassword = "";
		$npasswordErrMsg = "";
		$cpassword = "";
		$cpasswordErrMsg = "";

		$acerr_message = "";
		$nothing = "nothing";
		$dcsn = TRUE;
		$fdcsn = TRUE;
		
		if(isset($_POST['adsave'])) {
			if ($_SERVER['REQUEST_METHOD'] === "POST") {
				function test_input($data) {
					$data = htmlspecialchars($data);
					return $data;
				}

				$uname = test_input($_POST['uname']);
				$npassword = test_input($_POST['npassword']);
				$cpassword = test_input($_POST['cpassword']);

				if(empty($uname)) {
					$unameErrMsg = " *Username is not be empty.";
					$dcsn = FALSE;
				}
				if(empty($npassword)) {
					$npasswordErrMsg = " *New password is not be empty.";
					$dcsn = FALSE;
				}
				if(empty($cpassword)) {
					$cpasswordErrMsg = " *Confirm password is not be empty.";
					$dcsn = FALSE;
				}
				if($npassword != $cpassword) {
					$cpasswordErrMsg = " *New password and confirm password will be same";
					$dcsn = FALSE;
				}
			}
		}

		if(isset($_POST["adsave"])) {
			if($dcsn === TRUE) {
				$fdcsn = forget_password_update($uname, $npassword);

				if($fdcsn === true) {
					header("Location: ../View/login.php");
				}
				else {
					$acerr_message = " *The username is not exist.";
					$datastore = array(
						'Slash' => $nothing,
						'Uname' => $uname,
						'NewPassword' => $npassword,
						"ConfirmPassword" => $cpassword,
				        'UserNameErrMsg' => $unameErrMsg,
						'NewPasswordErrMsg' => $npasswordErrMsg,
						'ConfirmPasswordErrMsg' => $cpasswordErrMsg,
						'AllErrMsg' => $acerr_message
					);

					$queries = array("errors" => $datastore);
					$queryString = http_build_query($queries);

					header("Location:../View/forget_password.php?user=".$queryString);
					exit();
				}
			}
			else {
				$acerr_message = " *Please fill up all the necessary information properly to reset your account password.";
				$datastore = array(
					'Slash' => $nothing,
					'Uname' => $uname,
					'NewPassword' => $npassword,
					"ConfirmPassword" => $cpassword,
			        'UserNameErrMsg' => $unameErrMsg,
					'NewPasswordErrMsg' => $npasswordErrMsg,
					'ConfirmPasswordErrMsg' => $cpasswordErrMsg,
					'AllErrMsg' => $acerr_message
				);

				$queries = array("errors" => $datastore);
				$queryString = http_build_query($queries);

				header("Location:../View/forget_password.php?user=".$queryString);
				exit();
			}
		}
	?>
</body>
</html>