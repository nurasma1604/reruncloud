<?php include("dataconnection.php"); ?>

<html>
<head><title>Edit a Movie</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<?php
		 
			$movid = $_REQUEST["movid"];

			$result = mysqli_query($conn, "select * from movie where movie_id = $movid");
			$row = mysqli_fetch_assoc($result);
		?>
		
		<h1>Edit a Movie</h1>

		<form name="addfrm" method="post" action="">

			<p><label>Title:</label><input type="text" name="mov_title" size="80" value="<?php echo $row['movie_title']; ?>">
		 
			<p><label>Ticket Price:</label><input type="text" name="mov_price" size="10" value="<?php echo $row['movie_ticket_price']; ?>">
			
			<p><label>Summary:</label><textarea cols="60" rows="4" name="mov_summary"><?php echo $row['movie_summary']; ?></textarea>

			<p><label>Release Date:</label><input type="date" name="mov_release" value="<?php echo $row['movie_release_date']; ?>">
			
			<p><input type="submit" name="savebtn" value="UPDATE MOVIE">

		</form>
	
	</div>
	
</div>


</body>
</html>

<?php

if (isset($_POST["savebtn"])) 	
{
	$mtitle = $_POST["mov_title"];  	
	$mprice = $_POST["mov_price"];  	
	$msummary = $_POST["mov_summary"];  	
	$mrelease = $_POST["mov_release"];  	
	
	mysqli_query($conn,"update movie set movie_title='$mtitle', movie_ticket_price=$mprice, movie_summary='$msummary', movie_release_date='$mrelease' where movie_id=$movid");
	
	?>
	
		<script type="text/javascript">
			alert("Movie Updated");
		</script>
	
	<?php
	
	header( "refresh:0.5; url=movie_list.php" );
	
}

?>