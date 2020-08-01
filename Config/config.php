<?php
	$dbhostname = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "iwpjcompo";
	//connection to the database
	$dbhandle = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname) or die("Unable to connect to MySQL");	
?>