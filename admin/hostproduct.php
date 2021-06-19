<?php 
	include('connection.php');
	$reqid=$_GET['reqid'];
	$sql=mysql_query("UPDATE hostproduct SET status='Hosted' where reqid='$reqid'");
	if($sql)
	{
		echo '<script>alert("Hosted"); window.location="accepthost.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed"); window.location="accepthost.php"; </script>';
	}
?>