<!DOCTYPE html>
<head>
<title>Update Album Details</title>
<meta charset="utf-8"/>
</head>
<body>
<h1>Update Album Details</h1>
<?php


if(isset($_POST['submit']))
{
	
	include 'dbconnection.php'; 
	mysql_select_db('cdcatalog', $conn); //choosing my database to use
	$albums=("select * from albums where albumID= '$_POST[getAlbumID]'"); //choosing where to get the AlbumID
	$fields = mysql_fetch_array($albums); // array list of items
	mysql_query($albums, $conn); //execute albums query above
	

	//Setting values to what was entered in Form POST method
	$title=$_POST['title'];
	$artist=$_POST['artist'];
	$country=$_POST['country'];
	$company=$_POST['company'];
	$price=$_POST['price'];
	$year=$_POST['year'];

	//Updating table with new details that were taken in
	$albums=mysql_query($conn,"update albums set title='$title', artist='$artist', country='$country', company='$company', year='$year', price='$price' where albumID='$_POST[getAlbumID]'");
	
	mysqli_close($conn); //close connection
	header('location:ViewAlbums.php');
	
	}
}

?>
<form action='UpdateAlbum.php' method='POST'>
<table>
<tr><td align='right'>Album ID</td><td align='left'><?php echo $fields['albumID']; ?>
	<input type='hidden' name='albumID' value='<?php echo $fields['albumID']; ?>' /></td></tr>
<tr><td align='right'>Title</td><td align='left'>
	<input type='text' size='80' name='title' value='<?php echo $fields['title']; ?>' /></td></tr>
<tr><td align='right'>Artist</td><td align='left'>
	<input type='text' size='80' name='artist' value='<?php echo $fields['artist']; ?>' />
	</td></tr>	
<tr><td align='right'>Country</td><td align='left'>
	<input type='text' size='80' name='country' value='<?php echo $fields['country']; ?>' />
	</td></tr>
<tr><td align='right'>Company</td><td align='left'>
	<input type='text' size='20' name='company' value='<?php echo $fields['company']; ?>' />
	</td></tr>
<tr><td align='right'>Price</td><td align='left'>
	<input type='text' size='40' name='price' value='<?php echo $fields['price']; ?>' />
	</td></tr>
<tr><td align='right'>Year</td><td align='left'>
	<input type='text' size='40' name='year' value='<?php echo $fields['year']; ?>' />
	</td></tr>
<tr><td align='center' colspan='2'>
	<input type='reset' name='reset' value='Clear Form' /> &nbsp; 
	<input type='submit' name='submit' value='Save Album' /> 
	</td></tr>
</table>
</form>

<a href="ViewAlbums.php">View Albums</a>
</body>
</html>