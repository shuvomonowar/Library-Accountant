<!DOCTYPE html>
<html>
<head>
	<title>Profile Edit</title>
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

		$fname = "";
		$fnameErrMsg = "";
		$gender = "";
		$genderErrMsg = "";
		$mobileno = "";
		$mobilenoErrMsg = "";
		$country = "";
		$countryErrMsg = "";

		$emessage = "";
		$nothing = "nothing";
		$tdcsn = TRUE;
		$dcsn = false;

		$data_get = my_profile_data($_SESSION["svalue"]);
		function return_get_data() {
			return $GLOBALS["data_get"];
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test_input($_POST['fname']);
			$gender = test_input($_POST['gender']);
			$mobileno = test_input($_POST['mobileno']);
			$country = test_input($_POST['country']);

			if(empty($fname)) {
				$fnameErrMsg = " *Full name is not be empty.";
				$tdcsn = FALSE;
			}
			/*
			if(empty($gender)) {
				$genderErrMsg = " *Gender is not be empty.";
				$tdcsn = FALSE;
			}
			if(!empty($gender)) {
				if($gender != "Male" or $gender != "Female") {
					$genderErrMsg = " *Gender must be either 'Male' or 'Female'.";
					$tdcsn = FALSE;
				}
			}
			*/
			if(empty($mobileno)) {
				$mobilenoErrMsg = " *Mobile no is not be empty.";
				$tdcsn = FALSE;
			}
			if(empty($country)) {
				$countryErrMsg = " *Country is not be empty.";
				$tdcsn = FALSE;
			}
		}

		if(isset($_POST['pdsave'])) {
			if(!isset($_SESSION['svalue'])) {
				session_start();
			}


			if($tdcsn === TRUE) {
				$dcsn = my_profile_update($_SESSION["svalue"], $fname, $mobileno, $country);
				if($dcsn === true) {
					header("Location: ../View/profile.php");
				}
			}
			else {
				$emessage = " *Something went wrong.";
				$datastore = array(
					'Slash' => $nothing,
					'FullName' => $fname,
					//'Gender' => $gender,
					'MobileNo' => $mobileno,
					'Country' => $country,
					'ErrMessage' => $emessage,
					'FullNameErrMsg' => $fnameErrMsg,
			        //'GenderErrMsg' => $genderErrMsg,
					'MobileNoErrMsg' => $mobilenoErrMsg,
					'CountryErrMsg' => $countryErrMsg
				);

				$queries = array("errors" => $datastore);
				$queryString = http_build_query($queries);

				header("Location:../View/profile_edit.php?user=".$queryString);
				exit();

				//header("Location: ../View/profile_edit.");
			}
		}
	?>
</body>
</html>