<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
	<div>
		<h3 id="welcome">Welcome</h1>
		<h3 id="user" style="color: limegreen;"> <?php echo $_SESSION['svalue'] ?> </h3>
	</div><br>

	<?php
		$fname = "";
		$uname = "";
		$gender = "";
		$email = "";
		$mobileno = "";
		$country = "";
		$password = "";
		$nothing = "nothing";

		require "../Model/my_data.php";

		$datastore = my_profile_data($_SESSION["svalue"]);
		//print_r(my_profile_data($_SESSION["svalue"]));

		$fname = $datastore["FullName"];
		$gender = $datastore["Gender"];
		$mobileno = $datastore["MobileNo"];
		$country = $datastore["Country"];
		
		function prof_det() {
			return $GLOBALS["datastore"];
		}
	
		//print_r($datastore);

		if(isset($_POST['pdedit'])) {
			if(!isset($_SESSION['svalue'])) {
				session_start();
			}

			header("Location: ../View/profile_edit.php");
		}
	?>
</body>
</html>