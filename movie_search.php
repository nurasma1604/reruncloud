<?php include("dataconnection.php"); ?>

<html>
<head><title>Search Movie</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>Search for a Movie</h1>

		<form name="addfrm" method="post" action="">

			<p><label>Title:</label><input type="text" name="mov_title" size="80">
		
			<p><input type="submit" name="searchbtn" value="SEARCH MOVIE">

		</form>
		
		<?php

		if (isset($_POST["searchbtn"])) 	
		{
			$mtitle = $_POST["mov_title"]; 
			
			$result = mysqli_query($conn, "select * from movie where movie_title like '%$mtitle%'");	
			$count = mysqli_num_rows($result);
			
			if ($count<1)
				echo "Sorry, no records were found for $mtitle<br><br>";
			else
			{
			
			?>
				<h2>Results:</h2>
			
				<table border="1">
				<tr>
					<th>Movie ID</th>
					<th>Movie Title</th>
					<th>Movie Ticket Price</th>
				</tr>
				
				<?php
				
				while($row = mysqli_fetch_assoc($result))
				{
				
				?>			

				<tr>
					<td><?php echo $row["movie_id"]; ?></td>
					<td><?php echo $row["movie_title"]; ?></td>
					<td><?php echo $row["movie_ticket_price"]; ?></td>
				</tr>
				<?php
				
				}
				
				?>
			</table>


			<p> <?php echo $count; ?> records found</p>
			<?php
			}
		}
	?>
	</div>
	
</div>


</body>
</html>
