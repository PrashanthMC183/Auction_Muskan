<?php 
	include('connection.php');
	$reqid=$_GET['q'];
	$sql=mysql_query("UPDATE hostproduct SET status='Expired' where reqid='$reqid'");
?>