<?php
	$server_name="localhost";
	$user="root";
	$password="";
	
	$con=mysqli_connect("localhost","root","","booktopus2");
	if(!$con){
		echo "Error Connecting To Data Base ".mysql_error();
	}
?>