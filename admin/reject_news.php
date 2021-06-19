
 <?php include('session.php'); ?>
<?php include('connection.php');
    $nrid=$_GET['nrid'];
    $sq=mysql_query("update newsreq set status='Denied' where nr_id='$nrid'") or die(mysql_error());
    
	if($sq)
	{
		echo '<script>alert("News has denied successfully..!!"); window.location="dashboard.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to deny"); window.location="dashboard.php"; </script>';
	}

 ?>