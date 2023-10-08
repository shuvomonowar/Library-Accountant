<?php 
	session_start();

	$cookie_name = "runame";
	$cookie_value = "something";
	setcookie($cookie_name, $cookie_value, time() + 360000, "/");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RFAM</title>
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
	<br><br>
	<?php
		require "../Model/reader_finance_data.php";

		$uname = "";
		$unameErrMsg = "";
		$unameDataErrMsg = "";
		$nothing = "nothing";

		$dcsn = false;
		$tdcsn = TRUE;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$uname = test_input($_POST['uname']);

			if (empty($uname)) {
				$unameErrMsg = " *User name is not be empty";
				$tdcsn = FALSE;
			}
			if(!empty($uname)) {
				$unameErrMsg = "";
			}

			if (isset($_POST['search'])) {
				if($tdcsn === TRUE) {
					if(!isset($_SESSION['svalue'])) {
						session_start();
					}
					$dcsn = get_reader_udata($uname);

					if($dcsn === true) {
						if(isset($_COOKIE["runame"])) {
							setcookie("runame", $uname, time() + 360000, "/");

							header("Location: ../View/rfam_search.php");
							/*
							$datastore = array(
							'Slash' => $nothing,
							'Uname' => $uname,
							);

							$queries = array("errors" => $datastore);
							$queryString = http_build_query($queries);

							header("Location:../View/rfam_search.php?user=".$queryString);
							exit();
							*/
						}				
					}
					else {
						$unameDataErrMsg = " *Reader is not found";
						$datastore = array(
							'Slash' => $nothing,
							'Uname' => $uname,
							'UnameErrorMsg' => $unameErrMsg,
							'UnameDataErrorMsg' => $unameDataErrMsg
						);

						$queries = array("errors" => $datastore);
						$queryString = http_build_query($queries);

						header("Location:../View/rfam.php?user=".$queryString);
						exit();
					}
				}
				else {
					$unameDataErrMsg = "";
					$datastore = array(
						'Slash' => $nothing,
						'Uname' => $uname,
						'UnameErrorMsg' => $unameErrMsg,
						'UnameDataErrorMsg' => $unameDataErrMsg
					);

					$queries = array("errors" => $datastore);
					$queryString = http_build_query($queries);

					header("Location:../View/rfam.php?user=".$queryString);
					exit();
				}
			}
		}
	?>
</body>
</html>