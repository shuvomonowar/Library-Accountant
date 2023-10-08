<!DOCTYPE html>
<html>
<head>
	<title>Registration Action</title>
</head>
<body>
	<?php
		require "../Model/my_data.php";

		$fname = "";
		$fnameErrMsg = "";
		$uname = "";
		$unameErrMsg = "";
		$gender = "";
		$genderErrMsg = "";
		$email = "";
		$emailErrMsg = "";
		$mobileno = "";
		$mobilenoErrMsg = "";
		$country = "";
		$countryErrMsg = "";
		$password = "";
		$passwordErrMsg = "";
		$cpassword = "";
		$cpasswordErrMsg = "";

		$nothing = "nothing";

		$sunErrMsg = "";
		$successMsg = FALSE;

		$dcsn = FALSE;
		$fdcsn = FALSE;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test_input($_POST['fname']);
			$uname = test_input($_POST['uname']);
			$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
			$email = test_input($_POST['email']);
			$mobileno = test_input($_POST['mobileno']);
			$country = isset($_POST['country']) ? test_input($_POST['country']) : "";
			$password = test_input($_POST['password']);
			$cpassword = test_input($_POST['cpassword']);

			if (empty($fname)) {
				$fnameErrMsg = " *Full name is not be empty";
				$dcsn = FALSE;
			}
			else if(!empty($fname)) {
				if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
					$fnameErrMsg = "  *Try using valid character";
					$dcsn = FALSE;
				}
			}

			if (empty($uname)) {
				$unameErrMsg = " *User name is not be empty";
				$dcsn = FALSE;
			}
       		if (empty($gender)) {
				$genderErrMsg = "  *Gender is not be unselected";
				$dcsn = FALSE;
			}
			if (empty($email)) {
				$emailErrMsg = "  *Email is not be empty";
				$dcsn = FALSE;
			}
			if (empty($mobileno)) {
				$mobilenoErrMsg =  " * Mobile no is not be empty";
				$dcsn = FALSE;
			}
			if ($country == "Not Selected") {
				$countryErrMsg = "  *Please select valid country name.";
				$dcsn = FALSE;
			}
			if (empty($password)) {
				$passwordErrMsg = "  *Password is not be empty";
				$dcsn = FALSE;
			}
			if (empty($cpassword)) {
				$cpasswordErrMsg = " *Confirm password is not be empty";
				$dcsn = FALSE;
			}
			else if ($password != $cpassword) {
				$cpasswordErrMsg = " *Confirm password is not match with password";
				$dcsn = FALSE;
			}

			if (!empty($fname) && preg_match("/^[a-zA-Z ]*$/",$fname) && !empty($uname) && !empty($gender) && !empty($email) && !empty($mobileno) && !empty($password) && !empty($cpassword) && $password === $cpassword) {
				$dcsn = TRUE;
			}


			if(isset($_POST['submit'])) {
				if($dcsn) {
					if(file_exists('../Model/my_data.php')) {
						$datastore = array(
							    //'Slash' => $nothing,
							    'FullName' => $fname,
							    'UserName' => $uname,
							    'Gender' => $gender,
								'Email' => $email,
								'MobileNo' => $mobileno,
								'Country' => $country,
								'Password' => $password
						   	);

						$fdcsn = store_data_for_registration($datastore);

						if($fdcsn == true) {
							header("Location: ../View/login.php");
						}
						else {
							$sunErrMsg = " *Provided username is already taken. Please, try using different username.";

							$datastore = array(
								'Slash' => $nothing,
								'FullName' => $fname,
								'Uname' => $uname,
								'Gender' => $gender,
								'Email' => $email,
								'MobileNo' => $mobileno,
								'Country' => $country,
								'Password' => $password,
								'CPassword' => $cpassword,
						        'FullNameErrMsg' => $fnameErrMsg,
						        'UserNameErrMsg' => $unameErrMsg,
						        'GenderErrMsg' => $genderErrMsg,
								'EmailErrMsg' => $emailErrMsg,
								'MobileNoErrMsg' => $mobilenoErrMsg,
								'CountryErrMsg' => $countryErrMsg,
								'PasswordErrMsg' => $passwordErrMsg,
								'CPasswordErrMsg' => $cpasswordErrMsg,
								'SunErrMsg' => $sunErrMsg
					        );
							//$sunErrMsg = " *Please fill up all the sections of the form properly.";
							$queries = array("errors" => $datastore);
							$queryString = http_build_query($queries);

							header("Location:../View/registration.php?user=".$queryString);
							exit();
						}

						/*
						$queries = array("errors" => $datastore);

						$queryString = http_build_query($queries);

							//header("Location:../Model/my_data.php?user=".$queryString);
							//exit();
						*/
						/*
						function get_input_exist_file() {
							$cnt = TRUE;
							$jsonfile = 'my_data.json';
					       
						    $readjsonfile = file_get_contents($jsonfile);
							$datadriven = json_decode($readjsonfile, TRUE);
							$arr_len = count($datadriven);
							for($i = 0; $i < $arr_len; $i++) {
								if($datadriven[$i]['UserName'] === $GLOBALS['uname'] || $datadriven[$i]['Email'] === $GLOBALS['email']) {
									$cnt = FALSE;
									break;							
								}
						    }

						    if($cnt) {
						    	$datastore = array(
							        'FullName' => $_POST['fname'],
							        'UserName' => $_POST['uname'],
							        'Gender' => $_POST['gender'],
									'Email' => $_POST['email'],
									'MobileNo' => $_POST['mobileno'],
									'Country' => $_POST['country'],
									'Password' => $_POST['password']
						        );

						        $datadriven[] = $datastore;
						        $final_data = json_encode($datadriven, JSON_PRETTY_PRINT);
						        if(file_put_contents($jsonfile, $final_data)) {
						        	header("Location: login.php");
						        }
						    }
						    else {
						    	$GLOBALS['sunErrMsg'] = " *Provided username or email is already taken. Please, try using different username.";
						    }
						
			       		}

			       		get_input_exist_file();
			       		*/
					}
					else {
						$sunErrMsg = " *Something went wrong, please try later.";
						/*
						function assign_input_new_file() {
							$jsonfile = "my_data.json";
							$jsonfileAd = fopen($jsonfile, "w");
							
							$datadriven = array();
					        $datastore = array(
					        'FullName' => $_POST['fname'],
					        'UserName' => $_POST['uname'],
					        'Gender' => $_POST['gender'],
							'Email' => $_POST['email'],
							'MobileNo' => $_POST['mobileno'],
							'Country' => $_POST['country'],
							'Password' => $_POST['password'],
							'CPassword' => $_POST['cpassword']
					        );

					        $datadriven[] = $datastore;
					        $final_data = json_encode($datadriven);
					        fclose($jsonfileAd);

					        if(file_put_contents($jsonfile, $final_data)) {
						        header("Location: login.php");
						    }
			        	}

			        	assign_input_new_file();
			        	*/
			        }
				}
				else {
					//$sunErrMsg = " *Please fill up all the sections of the form properly.";

					$datastore = array(
						'Slash' => $nothing,
						'FullName' => $fname,
						'Uname' => $uname,
						'Gender' => $gender,
						'Email' => $email,
						'MobileNo' => $mobileno,
						'Country' => $country,
						'Password' => $password,
						'CPassword' => $cpassword,
				        'FullNameErrMsg' => $fnameErrMsg,
				        'UserNameErrMsg' => $unameErrMsg,
				        'GenderErrMsg' => $genderErrMsg,
						'EmailErrMsg' => $emailErrMsg,
						'MobileNoErrMsg' => $mobilenoErrMsg,
						'CountryErrMsg' => $countryErrMsg,
						'PasswordErrMsg' => $passwordErrMsg,
						'CPasswordErrMsg' => $cpasswordErrMsg,
						'SunErrMsg' => $sunErrMsg
			        );
					//$sunErrMsg = " *Please fill up all the sections of the form properly.";
					$queries = array("errors" => $datastore);
					$queryString = http_build_query($queries);

					header("Location:../View/registration.php?user=".$queryString);
					exit();
					//header("Location:../View/registration.php?user=".$sunErrMsg);
				}
			}
		}
	?>
</body>
</html>