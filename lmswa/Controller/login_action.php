<?php
	session_start();

	$cookie_name = "username";
	$cookie_value = "shuvomonowar";
	setcookie($cookie_name, $cookie_value, time() + 20, "/");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--<meta http-equiv="refresh" content="1">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
</head>
<body>
	<?php 
		require "../Model/my_data.php";

		//$uname = "";
		$uname_mail = "";
		$uname_mailErrMsg = "";
		$password = "";
		$passwordErrMsg = "";
		$allErrMsg = "";
		$nothing = "nothing";
		$dcsn = TRUE;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$uname_mail = test_input($_POST['uname_mail']);
			$password = test_input($_POST['pword']);

			if (empty($uname_mail)) {
				$uname_mailErrMsg = " *Username is not be empty";
				$dcsn = FALSE;
			}
			else {
				$uname_mailErrMsg = "";
				$dcsn = TRUE;
			}

			if (empty($password)) {
				$passwordErrMsg = " *Password is not be empty";
				$dcsn = FALSE;
			}
			else {
				$passwordErrMsg = "";
				$dcsn = TRUE;
			}
			
			$dcsn = validate_data_for_login($uname_mail, $password);

			if($dcsn) {
				$_SESSION["svalue"] = $uname_mail;
				if(isset($_POST['remember'])) {
					if(isset($_POST['signin'])) {
						if(isset($_COOKIE["username"])) {
							if(count($_COOKIE) > 0) {
								header("Location: ../View/portal.php");
							}
						}
					}
				}
				else if(!isset($_POST['remember'])) {
					if(isset($_COOKIE["username"])) {
						setcookie("username", "shuvomonowar", time()+360000, "/");
					}
					if(isset($_POST['signin'])) {
						header("Location: ../View/portal.php");
					}
				}
			}
			else {
				$allErrMsg = " *Try using valid username and password";
				$datastore = array(
					'Slash' => $nothing,
					'Uname' => $uname_mail,
					'Password' => $password,
			        'UserNameErrMsg' => $uname_mailErrMsg,
					'PasswordErrMsg' => $passwordErrMsg,
					'AllErrMsg' => $allErrMsg
				);

				$queries = array("errors" => $datastore);
				$queryString = http_build_query($queries);

				header("Location:../View/login.php?user=".$queryString);
				exit();
			}
		}
	?>
</body>
</html>