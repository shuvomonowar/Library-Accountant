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
	<title>New Reader Record</title>
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
		
		$nothing = "nothing";
		$sunErrMsg = "";
		$dcsn = TRUE;
		$dcsn1 = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test_input($_POST['fname']);
			$uname = test_input($_POST['uname']);
			$mtype = test_input($_POST['mtype']);
			$cbalance = test_input($_POST['cbalance']);
			$dbalance = test_input($_POST['dbalance']);
			$pstatus = test_input($_POST['pstatus']);
			$mstatus = test_input($_POST['mstatus']);

			if($fname === "") {
				$dcsn = FALSE;
				$fnameErrMsg = " *first name is not be empty";
			}
			if($uname === "") {
				$dcsn = FALSE;
				$fnameErrMsg = " *user name is not be empty";
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

		if(isset($_POST['addsubmit'])) {
			if($dcsn === TRUE) {
				if(!isset($_SESSION['svalue'])) {
					session_start();
				}

				if(isset($_COOKIE["runame"])) {
					setcookie("runame", $uname, time() + 360000, "/");
				}

				$dcsn1 = add_reader_data($fname, $uname, $mtype, $cbalance, $dbalance, $pstatus, $mstatus);

				if($dcsn1 === true) {
					header("Location: ../View/rfam_search.php");
				}
				else {
					$sunErrMsg = " *User data is already exist.";

					$datastore = array(
						'Slash' => $nothing,
						'FullName' => $fname,
						'Uname' => $uname,
						'MembershipType' => $mtype,
						'CurrentBalance' => $cbalance,
						'DueBalance' => $dbalance,
						'PaymentStatus' => $pstatus,
						'MembershipStatus' => $mstatus,
						'SunErrMsg' => $sunErrMsg
			        );
	
					$queries = array("errors" => $datastore);
					$queryString = http_build_query($queries);

					header("Location:../View/new_reader.php?user=".$queryString);
					exit();
				}	
			}
		}
	?>
	<br><br>
</body>
</html>