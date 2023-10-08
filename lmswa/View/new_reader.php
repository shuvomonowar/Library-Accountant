<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Reader Record</title>
	<link rel="stylesheet" type="text/css" href="CSS/new_reader_style.css">
	<script type="text/javascript" src="JS/new_reader_validate.js"></script>
</head>
<body>
	<?php include '../View/head.php'; ?>
	<br>
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
	<?php
		//require "../Controller/new_reader_action.php";
		
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

		$sunErrMsg = "";

		if($_GET) {
			$errors =  $_GET['errors'];
			//print_r($errors);
			$fname = $errors["FullName"];
			$uname = $errors["Uname"];
			$mtype = $errors["MembershipType"];
			$cbalance = $errors["CurrentBalance"];
			$dbalance = $errors["DueBalance"];
			$pstatus = $errors["PaymentStatus"];
			$mstatus = $errors["MembershipStatus"];
			$sunErrMsg = $errors["SunErrMsg"];
		}	
	?>
	<br>
	<form method="POST" action="../Controller/new_reader_action.php" novalidate onsubmit="return validate(this);">
		<fieldset><br>
			<legend></legend>
			<h3 id="lgstyle">Add New Reader Record</h3><br>
			<label for="fname">Full Name</label><br>
			<input type="text" name="fname" id="fname" value="<?php echo $fname ?>" required><span id="fnameErrorMsg"><?php echo $fnameErrMsg; ?></span><br><br>
			<label for="uname">User Name</label><br>
			<input type="text" name="uname" id="uname" value="<?php echo $uname ?>" required><span id="unameErrorMsg"><?php echo $unameErrMsg; ?></span><br><br>
			<label for="mtype">Membership Type</label><br>
			<input type="text" name="mtype" id="mtype" value="<?php echo $mtype ?>" required><span id="mtypeErrorMsg"><?php echo $mtypeErrMsg; ?></span><br><br>
			<label for="cbalance">Current Balance</label><br>
			<input type="text" name="cbalance" id="cbalance" value="<?php echo $cbalance ?>" required><span id="cbalanceErrorMsg"><?php echo $cbalanceErrMsg; ?></span><br><br>
			<label for="dbalance">Due Balance</label><br>
			<input type="text" name="dbalance" id="dbalance" value="<?php echo $dbalance ?>" required><span id="dbalanceErrorMsg"><?php echo $dbalanceErrMsg; ?></span><br><br>
			<label for="pstatus">Payment Status</label><br>
			<input type="text" name="pstatus" id="pstatus" value="<?php echo $pstatus ?>" required><span id="pstatusErrorMsg"><?php echo $pstatusErrMsg; ?></span><br><br>
			<label for="mstatus">Membership Status</label><br>
			<input type="text" name="mstatus" id="mstatus" value="<?php echo $mstatus ?>" required><span id="mstatusErrorMsg"><?php echo $mstatusErrMsg; ?></span><br><br>
			
			<input type="submit" name="addsubmit" id="addbutton" value="Add Record"><br><br>
		</fieldset>
	</form>
	<div class="emstyle">
			<br><?php echo $sunErrMsg; ?>
	</div>
	<?php include '../View/footer.php'; ?><br>
</body>
</html>