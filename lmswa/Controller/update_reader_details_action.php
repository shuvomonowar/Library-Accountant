<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Reader Details</title>
</head>
<body>
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
	<br>
	<br>
	<?php
		require "../Model/reader_finance_data.php";

		$uname = "";
		$unameErrMsg = "";
		$fname = "";
		$fnameErrMsg = "";
		$mtype = "";
		$mtypeErrMsg = "";
		$cbalance = "";
		$cbalanceErrMsg = "";
		$dbalance = "";
		$dbalanceErrMsg = "";
		$pstatus = "";
		$pstatusErrMsg = "";
		$mstatus = "";
		$mstatusErrMsg = "";
		
		$sunErrMsg = "";
		$dcsn = TRUE;
		$dcsn1 = true;
		$dcsn2 = true;

	    $tuname = $_COOKIE['runame'];

		$exr_data = get_reader_data($tuname);

		function get_rdata() {
			return $GLOBALS['exr_data'];
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test_input($_POST['fname']);
			$mtype = test_input($_POST['mtype']);
			$cbalance = test_input($_POST['cbalance']);
			$dbalance = test_input($_POST['dbalance']);
			$pstatus = test_input($_POST['pstatus']);
			$mstatus = test_input($_POST['mstatus']);

			if($fname === "") {
				$dcsn = FALSE;
				$fnameErrMsg = " *first name is not be empty";
			}
			if($mtype === "") {
				$dcsn = FALSE;
				$mtypeErrMsg = " *membership type is not be empty";
			}
			if($cbalance === "") {
				$dcsn = FALSE;
				$cbalanceErrMsg = " *Current balance is not be empty";
			}
			if($dbalance === "") {
				$dcsn = FALSE;
				$dbalanceErrMsg = " *due balance is not be empty";
			}
			if($pstatus === "") {
				$dcsn = FALSE;
				$pstatusErrMsg = " *payment status is not be empty";
			}
			if($mstatus === "") {
				$dcsn = FALSE;
				$mstatusErrMsg = " *membership status is not be empty";
			}
		}

		if(isset($_POST['upsubmit'])) {
			if($dcsn === TRUE) {
				if(!isset($_SESSION['svalue'])) {
					session_start();
				}

				$dcsn1 = update_reader_data($tuname, $fname, $mtype, $cbalance, $dbalance, $pstatus, $mstatus);

				if($dcsn1 === true) {
					header("Location: ../View/rfam_search.php");
				}	
			}
		}

		if(isset($_POST['delsubmit'])) {
			if($dcsn === TRUE) {
				if(!isset($_SESSION['svalue'])) {
					session_start();
				}

				$dcsn2 = delete_reader_data($tuname);

				if($dcsn2 === true) {
					header("Location: ../View/rfam.php");
				}
			}
		}
	?>
	<br><br>
</body>
</html>