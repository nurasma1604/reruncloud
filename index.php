<?php

$host = "127.0.0.1";
$user = "appruncloudTTT";
$password = "_-R5p%f}HV7w2PiWLleO5G40Kaa5-5Qj";
$database = "appruncloudTTT";

$conn = mysqli_connect($host, $user, $password, $database);

?>

<html>
<head><title>User List</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>List of User for runcloud</h1>

		<table border="1">
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Password</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($conn, "select * from wp_users");	
			$count = mysqli_num_rows($result);
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			

			<tr>
				<td><?php echo $row["user_login"]; ?></td>
				<td><?php echo $row["user_email"]; ?></td>
				<td><?php echo $row["user_pass"]; ?></td>
			</tr>
			<?php
			
			}
			
			?>
		</table>


		<p> Number of records : <?php echo $count; ?></p>

	</div>
	
</div>


</body>
</html>
