<!DOCTYPE html>
<head>
<title>View Albums</title>

<link rel="stylesheet" type="text/css" href="stylesheet.css" /> 

<meta charset="utf-8" />
</head>
<body>
<div id = "page">
<h1>Album List</h1>

	<div id="leftMenu">
			<h3>Select title to delete</h3>
			<form action="DeleteAlbum.php" method="post">
				<?php
					include 'dbconnection.php'; 
					//used block PHP as I felt it was a nicer display and easier to manage
					 $albums = mysqli_query($conn,"SELECT * FROM albums"); // choosing the table albums to select from
					   echo "<select name='getAlbumID'>"; //Opening my selection of Albums setting selection to getAlbumID
					 while($fields = mysqli_fetch_array($albums)) // While loop to display all current items in Albums table
					    {
							echo "<option value='". $fields['albumID'] ."'> " . $fields['title'] ."</option> "; //displaying the title
					    }
					   echo " </select>";
					   mysqli_close($conn);
					?> 
			<input type="submit" value="Delete" > 
			</form>					

			<h3>Select title to Update</h3>
			<form action="UpdateAlbum.php" method="POST">
				<?php
					include 'dbconnection.php'; 
					
					 $albums = mysqli_query($conn,"SELECT * FROM albums"); // choosing the table albums to select from
					   echo "<select name='getAlbumID'>";  //Opening my selection of Albums and setting selection to getAlbumID
					 while($fields = mysqli_fetch_array($albums))// While loop to display all current items in Albums table
					    {
							echo '<option value="'. $fields["albumID"] . '">' . $fields["title"] .'</option> '; //displaying the title
					    }
					   echo " </select>";
					   mysqli_close($conn);
					?> 
			<input type="submit" value="Update" >
			</form>	
			</br>
			</br>
			<a href="EnterNewAlbum.php" target="_parent"><button>Enter New Album</button></a>
	</div>
	</br>
	<div id = "main">
		<?php
					include 'dbconnection.php'; //open connection
					$fields = array('title', 'artist', 'country', 'company', 'price', 'year'); 
					$TableName = "albums"; 
					$SQLString="SELECT * FROM albums ORDER BY albumID";  //Order by Album ID
					mysql_select_db('cdcatalog'); // Choose which database


					$albums = mysqli_query($conn,"SELECT * FROM albums"); // executing query to select data from albums table
					
					while($fields = mysqli_fetch_array($albums)) //while loop to display all items in table until end
						{	
							echo "<table id='display')'>"; //displayed array list in a table
							echo "<tr><th>Title</th>";
							echo '<td>'. $fields['title']. '</td> </tr>';
							echo "<tr><th>Artist</th>";
							echo '<td>'. $fields['artist']. '</td></tr>';
							echo "<tr><th>Country</th>";
							echo '<td>'. $fields['country']. '</td></tr>' ;
							echo "<tr><th>Company</th>";
							echo '<td>'. $fields['company']. '</td></tr>';
							echo "<tr><th>Price</th>";
							echo '<td>'. $fields['price'] . '</td></tr>';
							echo "<tr><th>Year</th>";
							echo '<td>'. $fields['year'] . '</td></tr>';
							echo "<tr><th>Album ID</th>";
							echo '<td>'. $fields['albumID']. '</td></tr>' ;
							echo "</table>";
							echo "********************************";
							echo "</br>";
						}
				
					mysqli_close($conn); //close connection
		?>

	</div>

</div>
</body>
</html>