<?php
	session_start();
	require_once "include/connection.php";
	

	
	if(!isset($_SESSION['login_id']) && $_SESSION['login_id']=="")
	{
		header("location:index.php");
	}
	
	else
	{
		session_destroy();
		header('location:index.php');
	}
?>