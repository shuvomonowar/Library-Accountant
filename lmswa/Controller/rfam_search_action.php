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

		$uname = $_COOKIE['runame'];

		$exr_data = get_reader_data($uname);

		function get_rdata() {
			return $GLOBALS['exr_data'];
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			if (isset($_POST['update'])) {
				if(!isset($_SESSION['svalue'])) {
					session_start();
				}

				header("Location: ../View/update_reader_details.php");
			}
		}
	?>
</body>
</html>