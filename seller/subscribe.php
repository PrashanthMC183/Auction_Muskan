<?php include('session.php'); 
	include('connection.php');

	$pid=$_GET['pid'];

	$sql=mysql_query("select * from package where pid='$pid'");
	$fetch=mysql_fetch_array($sql);
	$pamt=$fetch['pamt'];
	$pval=$fetch['pvalidity'];
	$subedate=date('Y-m-d',strtotime('+' .$pval. ' month'));
	$qry=mysql_query("INSERT INTO `subscription`(`pid`, `uid`, `subdate`, `enddate`) VALUES ('$pid','$uid',now(),'$subedate')") or die(mysql_error());
	if($qry)
	{
		$subid=mysql_insert_id();
		echo "<script>window.location='payment.php?subid=".$subid."';</script>";
	}
	else
	{
		echo "<script>alert('Couldn't subscribe try again); window.location='viewpackage.php';</script>";
	}


?>