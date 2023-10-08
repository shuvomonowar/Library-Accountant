<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="100">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Portal</title>
	<link rel="stylesheet" type="text/css" href="../View/CSS/Portal_style.css">
</head>
<body id="pstyle">
	<?php	
		if(!isset($_COOKIE['username'])) {
			session_unset();
			session_destroy();
			header("refresh:0; url=http://localhost/project/lmswa/View/login.php");
		}
		if(!isset($_SESSION['svalue'])) {
			header("Location: ../Controller/logout_action.php");
		}
		if(isset($_SESSION["svalue"])) {
			include '../View/head.php'; 
		}
		else {
			header("Location: ../View/login.php");
		}
	?>

	<div class="homemsg">
		<br><br>
		<h1>Welcome</h1>
	</div>
	<br>
	<?php
		include '../View/footer.php'
	?>
	<br><br>
</body>
</html>