<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RFAM</title>
	<link rel="stylesheet" type="text/css" href="CSS/rfam_search_style.css">
</head>
<body>
	<?php include '../View/head.php'; ?>
	<br>
	<br>
	<br>
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
		require "../Controller/rfam_search_action.php";

		$fname = "";
		$uname = "";
		$mtype = "";
		$cbalance = "";
		$dbalance = "";
		$pstatus = "";
		$mstatus = "";

		$err_msg = "";	

		$gdata = get_rdata();
	
		$fname = $gdata["FullName"];
		$mtype = $gdata["MembershipType"];
		$cbalance = $gdata["CurrentBalance"];
		$dbalance = $gdata["DueBalance"];
		$pstatus = $gdata["PaymentStatus"];
		$mstatus = $gdata["MembershipStatus"];
		
	?><br><br>
	<table class="tclass">
		<caption id="cstyle">Reader Financial Account Details</caption>
		<tr>
			<th>Full Name</th>
			<th>Membership Type</th>
			<th>Current Balance</th>
			<th>Due Balance</th>
			<th>Payment Status</th>
			<th>Membership Status</th>
		</tr>
		<tr>
			<td><?php echo $fname; ?></td>
			<td><?php echo $mtype; ?></td>
			<td><?php echo $cbalance; ?></td>
			<td><?php echo $dbalance; ?></td>
			<td><?php echo $pstatus; ?></td>
			<td><?php echo $mstatus; ?></td>
		</tr>
	</table>
	<div class="edetails">
		<form method="POST" action="../Controller/rfam_search_action.php">
			<input type="submit" name="update" class="bstyle" value="Update Record">
		</form><br>
		<div class="udemsg">
			<?php echo $err_msg; ?>
		</div>
	</div>
	<?php include '../View/footer.php' ?><br><br>
</body>
</html>