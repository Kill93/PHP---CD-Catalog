<?php

	$hostname = "localhost";
	$username = "root";
	$password = "";

// Create connection
	$conn = mysqli_connect($hostname, $username, $password) 
	or die("Unable to connect");
	echo "";
	 

{

	$DBName = "cdcatalog";
	
	//if unsuccessful
	if (!mysqli_select_db($conn, $DBName))
	{
		$error = "unable to select the $DBName database! </p>";
		echo $error;
		exit;
	}
	//if successful display nothing
	echo " ";
}


	
?>