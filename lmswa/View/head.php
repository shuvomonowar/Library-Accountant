<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="../View/CSS/head_style.css">
</head>
<body>
	<?php
		if(isset($_SESSION['svalue'])) {
			if(isset($_POST['logout'])) {
				header('Location: ../Controller/logout_action.php');
			}
		}
		else {
			header("Location: ../View/login.php");
		}

		if(isset($_SESSION['svalue'])) {
			if(isset($_POST['myprofile'])) {
				header("Location: ../View/profile.php");
			}
		}

		if(isset($_SESSION['svalue'])) {
			if(isset($_POST['settings'])) {
				header("Location: ../View/account.php");
			}
		}

		if(isset($_SESSION['svalue'])) {
			if(isset($_POST['rfam'])) {
				header("Location: ../View/rfam.php");
			}
		}
	?>
	<div class="header">
		<!--<h1>Library Management System</h1>-->
		<h2 class="lgstyle">Digital Library</h2>
		<div class="navbar">
			<a href="../View/portal.php">Home</a>
			<div class="subnav">
				<button class="subnavbtn">Profile</button>
				<div class="subnavcontent">
					<ul>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="myprofile" name="myprofile" value="<?php echo $_SESSION['svalue'] ?>"></form></li>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="settings" name="settings" value="Settings"></form></li>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="lgout" name="logout" value="Logout"></form></li>
					</ul>	
				</div>
			</div>
			<div class="subnav">
				<button class="subnavbtn">Financial Details</button>
				<div class="subnavcontent">
					<ul>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="rfam" name="rfam" value="Reader"></form></li>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="vfam" name="vfam" value="Vendor"></form></li>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="efam" name="efam" value="Employee"></form></li>
						<li><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><input type="submit" id="lfam" name="lfam" value="Library"></form></li>
					</ul>
					
				</div>
			</div>
			<div class="subnav">
				<button class="subnavbtn">Others</button>
				<div class="subnavcontent">
					<ul>
						<li><a href="#fd">Form Download</a></li>
					</ul>
				</div>
			</div>
			<div class="subnav">
				<button class="subnavbtn">Message</button>
				<div class="subnavcontent">
					<ul>
						<li><a href="https://mail.google.com/mail/u/0/#inbox" target="_parent">Email</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>