<?php 
	function connect_database() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "my_data";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		return $conn;
	}
?>