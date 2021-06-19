<?php include('session.php'); ?>
<?php include('connection.php');
	$p_id=$_GET['pid'];
	$sq=mysql_query("delete from package where pid='$p_id'") or die(mysql_error());
	if($sq)
	{
		echo '<script>alert("Package has deleted"); window.location="viewpackage.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to delete"); window.location="viewpackage.php"; </script>';
	}

 ?>