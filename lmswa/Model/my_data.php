<?php
	require "my_database_connection.php";

	function store_data_for_registration($datastore) {
		$fname = $datastore["FullName"];
		$uname = $datastore["UserName"];
		$gender = $datastore["Gender"];
		$email = $datastore["Email"];
		$mobileno = $datastore["MobileNo"];
		$country = $datastore["Country"];
		$password = $datastore["Password"];

		$conn = connect_database();
		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$tsql = "SELECT UserName FROM registration_data WHERE UserName = '$uname' AND Password = '$password' ";
		$res = mysqli_query($conn, $tsql);
		if (mysqli_num_rows($res) === 1) {
			return false;
		}
		else {
			$sql = "INSERT INTO registration_data (FullName, UserName, Gender, Email, MobileNo, Country, Password) VALUES ('$fname', '$uname', '$gender', '$email', '$mobileno', '$country', '$password')";
			mysqli_query($conn, $sql);

			return true;
		}
		mysqli_close($conn);
	}


	function validate_data_for_login($uname_mail, $f_password) {
		$conn = connect_database();

		if ($conn) {
			$sql = "SELECT UserName, Password FROM registration_data WHERE UserName = '$uname_mail' AND Password = '$f_password' ";
			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) === 1) {
				return true;
			}
			else {
				return false;
			}
		}
		mysqli_close($conn);
	}

	function my_profile_data($uname) {
		$conn = connect_database();

		if ($conn) {
			$sql = "SELECT FullName, UserName, Gender, Email, MobileNo, Country, Password FROM registration_data WHERE UserName = '$uname'";
			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) === 1) {
				$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
				return $row;
			}
			else {
				return false;
			}
		}
		mysqli_close($conn);
	}

	function my_profile_update($uname, $fname, $mobileno, $country) {
		$conn = connect_database();

		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE registration_data SET FullName = '$fname', MobileNo = '$mobileno', Country = '$country' WHERE UserName = '$uname'";
		$res = mysqli_query($conn, $sql);

		return true;

		mysqli_close($conn);
	}

	function forget_password_update($uname, $password) {
		$conn = connect_database();
		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$tsql = "SELECT UserName FROM registration_data WHERE UserName = '$uname'";
		$res = mysqli_query($conn, $tsql);
		if (mysqli_num_rows($res) !== 1) {
			return false;
		}
		else {
			$sql = "UPDATE registration_data SET Password = '$password' WHERE UserName = '$uname'";
			mysqli_query($conn, $sql);

			return true;
		}
		mysqli_close($conn);
	}

	function my_account_update($uname, $email, $password) {
		$conn = connect_database();

		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE registration_data SET Email = '$email', Password = '$password' WHERE UserName = '$uname'";
		$res = mysqli_query($conn, $sql);

		return true;

		mysqli_close($conn);
	}
?>