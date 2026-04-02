<?php
	include_once("conn.php");
	
	$res=mysqli_query($con,"select * from tblusers");

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
					<th>NAME:</th>
					<th>PASSWORD:</th>
					<th>CONTACT:</th>
					<th>EMAIL:</th>
					<th>GENDER:</th>
					
				</tr>
				<?php
					while($x=mysqli_fetch_array($res))
					{
				?>
					<tr>
						<td><?php echo $x['name']?></td>
						<td><?php echo $x['password']?></td>
						<td><?php echo $x['contact']?></td>
						<td><?php echo $x['email']?></td>
						<td><?php echo $x['gender']?></td>
					</tr>
				<?php
					}
				?>
									
			</table>
		</form>
	</body>
</html>