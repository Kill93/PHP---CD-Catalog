<!DOCTYPE html>
<head>
<title>Add a new Album</title>
<meta charset="utf-8" />
</head>
<body>
<h1>Enter New Album</h1>
<?php

if (isset($_POST['submit'])) {
	
	$conn = mysql_connect("localhost", "root", "");
	if (!$conn){
	die("Connection lost");	
		
	}
	mysql_select_db('cdcatalog', $conn);	// choosing the correct database
	$albums =  "insert into albums (title, artist, country, company, price, year) values ('$_POST[title]', '$_POST[artist]', '$_POST[country]', '$_POST[company]', '$_POST[price]', '$_POST[year]')" ;
	//choosing the correct table to insert new items taken from form below
	
	mysql_query($albums, $conn);	//executing albums query 
	mysql_close($conn); // close connection
	
	header("Location: ViewAlbums.php"); //Once complete revert back to View Albums page
}	
?>


<form action="EnterNewAlbum.php" method="post">
		<table>
			<tr>
				<td>Title: </td>
				<td><input type = "text" name="title"></td>
			</tr>
			<tr>
				<td>Artist: </td>
				<td><input type = "text" name="artist"></td>
			</tr>
			<tr>
				<td>Country: </td>
				<td><input type = "text" name="country"></td>
			</tr>
			<tr>
				<td>Company: </td>
				<td><input type = "text" name="company"></td>
			</tr>
			<tr>
				<td>Price: </td>
				<td><input type = "text" name="price"></td>
			</tr>
			<tr>
				<td>Year: </td>
				<td><input type = "text" name="year"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add" name="submit"></td>
			</tr>
		</table>
	</form>
<a href="ViewAlbums.php" target="_parent"><button>View Albums</button></a>
</body>
</html>



