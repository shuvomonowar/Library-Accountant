<?php
	require "reader_finance_database_connection.php";

	function get_reader_udata($uname) {
		$conn = connect_database();

		if ($conn) {
			$sql = "SELECT UserName FROM reader_finance_data WHERE UserName = '$uname'";
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

	function get_reader_data($uname) {
		$conn = connect_database();

		if ($conn) {
			$sql = "SELECT UserName, FullName, MembershipType, CurrentBalance, DueBalance, PaymentStatus, MembershipStatus FROM reader_finance_data WHERE UserName = '$uname'";
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

	function update_reader_data($uname, $fname, $mtype, $cbalance, $dbalance, $pstatus, $mstatus) {
		$conn = connect_database();

		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE reader_finance_data SET FullName = '$fname', MembershipType = '$mtype', CurrentBalance = '$cbalance', DueBalance = '$dbalance', PaymentStatus = '$pstatus', MembershipStatus = '$mstatus' WHERE UserName = '$uname'";
		$res = mysqli_query($conn, $sql);

		return true;

		mysqli_close($conn);
	}

	function delete_reader_data($uname) {
		$conn = connect_database();

		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE FROM reader_finance_data WHERE UserName = '$uname'";
		$res = mysqli_query($conn, $sql);

		return true;

		mysqli_close($conn);	
	}

	function add_reader_data($fname, $uname, $mtype, $cbalance, $dbalance, $pstatus, $mstatus) {
		$conn = connect_database();
		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$tsql = "SELECT UserName FROM reader_finance_data WHERE UserName = '$uname'";
		$res = mysqli_query($conn, $tsql);
		if (mysqli_num_rows($res) === 1) {
			return false;
		}
		else {
			$sql = "INSERT INTO reader_finance_data (FullName, UserName, MembershipType, CurrentBalance, DueBalance, PaymentStatus, MembershipStatus) VALUES ('$fname', '$uname', '$mtype', '$cbalance', '$dbalance', '$pstatus', '$mstatus')";
			mysqli_query($conn, $sql);

			return true;
		}
		mysqli_close($conn);
	}

?>