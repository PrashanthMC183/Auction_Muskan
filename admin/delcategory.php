<?php include('session.php'); ?>
<?php include('connection.php');
	$c_id=$_GET['cid'];
	$sq=mysql_query("delete from category where cid='$c_id'") or die(mysql_error());
	if($sq)
	{
		echo '<script>alert("Category has deleted"); window.location="viewcategory.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to delete"); window.location="viewcategory.php"; </script>';
	}

 ?>