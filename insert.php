<?php
	include_once("conn.php");
	if(isset($_REQUEST['btnAdd']))
	{
		$name=$_REQUEST['txtname'];
		$pwd=$_REQUEST['txtpwd'];
		$contact=$_REQUEST['txtcon'];
		$email=$_REQUEST['txtemail'];
		$gendere=$_REQUEST['gender'];

		mysqli_query($con,"insert into tblusers values('$name','$pwd','$contact','$email','$gender')")
			or die("Couldn't insert the data!!!");

		header("Location:view.php");
	}

?>
<html>
	<head>
		<title>INSERTPage</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/bootstrap.min.css">
		<script src="assets/angular.min.js"></script>
		<script src="assets/angular-route.min.js"></script>
	</head>
	<body>
		<form method="post">
			<table align="center" border="2">
				<tr>
					<td>Enter Name:</td>
					<td>
						<input type="text" name="txtname">
					</td>
				</tr>
				<tr>
					<td>Enter Password:</td>
					<td>
						<input type="text" name="txtpwd">
					</td>
				</tr>
				<tr>
					<td>Enter Contact:</td>
					<td>
						<input type="text" name="txtcon">
					</td>
				</tr>
				<tr>
					<td>Enter Email:</td>
					<td>
						<input type="text" name="txtemail">
					</td>
				</tr>
				<tr>
					<td>Enter Gender:</td>
					<td>
						<input type="text" name="gender">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="Add to USERS"
							name="btnAdd">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>