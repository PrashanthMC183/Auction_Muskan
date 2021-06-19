<?php include('session.php'); ?>
<?php include('connection.php');
	$p_id=$_GET['pro_id'];
	$sq=mysql_query("delete from product where pro_id='$p_id'") or die(mysql_error());
	if($sq)
	{
		echo '<script>alert("product has been deleted"); window.location="prod_details.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to delete"); window.location="prod_details.php"; </script>';
	}

 ?>