<?php 
	session_start();
	$username=$_SESSION['user'];
	if(!(isset($username)))
	{
		header('location:../index.php');
	}

?>