<?php 
	session_start();
	$utype=$_SESSION['utype'];
	$uid=$_SESSION['uid'];
	$fname=$_SESSION['fname'];
	if(!(isset($uid)))
	{
		header('location:index.php');
	}

?>