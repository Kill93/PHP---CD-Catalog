<!DOCTYPE html>
<head>
<title>Delete an Album</title>
<meta charset="utf-8"/>
</head>
<body>
<h1>Delete an Album</h1>
<?php


	include 'dbconnection.php'; 
	mysql_select_db('cdcatalog', $conn); //choosing which database to use
	$albums = mysqli_query($conn, "DELETE FROM albums WHERE albumID='$_POST[getAlbumID]'"); // choosing which table to delete from
	
	mysqli_close($conn); //close connection

	header("Location: ViewAlbums.php");	// once above is complete revert back to View Albums page

?>
</br>

<a href="ViewAlbums.php">View All Albums</a>
</body>
</html>