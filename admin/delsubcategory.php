<?php include('session.php'); ?>
<?php include('connection.php');
	$s_id=$_GET['sid'];
	$sq=mysql_query("delete from subcategory where subcid='$s_id'") or die(mysql_error());
	if($sq)
	{
		echo '<script>alert("SubCategory has deleted"); window.location="viewsubcategory.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to delete"); window.location="viewsubcategory.php"; </script>';
	}

 ?>