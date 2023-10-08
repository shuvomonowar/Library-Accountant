<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RFAM</title>
	<link rel="stylesheet" type="text/css" href="CSS/rfam_style.css">
	<script type="text/javascript" src="JS/rfam_validate.js"></script>
</head>
<body>
	<?php include '../View/head.php'; ?>
	<br>
	<br>
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
		$uname = "";
		$unameErrMsg = "";
		$unameDataErrMsg = "";

		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$uname = $errors["Uname"];
			$unameErrMsg = $errors["UnameErrorMsg"];
			$unameDataErrMsg = $errors["UnameDataErrorMsg"];
		}
	?><br><br>
	<tbody id="output">
        
    </tbody>
	<form method="POST" action="../Controller/rfam_action.php" novalidate onsubmit="return validate(this);">
		<fieldset>
		<legend id="lgstyle">User Reader</legend><br>
			<label for="uname">User Name</label>
			<input type="text" name="uname" id="uname" value="<?php echo $uname; ?>" required>
			<input type="submit" name="search" id="sstyle" value="Search"><span id="unameErrorMsg"><?php echo $unameErrMsg; ?></span><br><br>
			<h4 id="nra_style">Want to add new user?<a href="../View/new_reader.php" target="_self">Add Reader</a></h4>
		</fieldset><br>
		<div class="unemstyle">
			<?php echo $unameDataErrMsg; ?>
		</div>
	</form><br><br><br>
	<?php include '../View/footer.php' ?><br><br>
</body>
</html>