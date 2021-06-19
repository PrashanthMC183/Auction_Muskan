<?php include('session.php'); ?>
<?php include('connection.php');
	$wid=$_GET['wid'];
	$sq=mysql_query("update winnerlist set pay_status='COD' where win_id='$wid'") or die(mysql_error());
	if($sq)
	{
		echo '<script>alert("Paying through COD"); window.location="buyerpage.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to pay"); window.location="notification.php"; </script>';
	}

 ?>