<?php include('session.php'); ?>
<?php include('connection.php');
	$sellerid=$_GET['sellerid'];
	$sq=mysql_query("delete from user where user_id='$sellerid") or die(mysql_error());
	if($sq)
	{
		echo '<script>alert("Message has deleted"); window.location="message.php"; </script>';
	}
	else
	{
		echo '<script>alert("Failed to delete"); window.location="message.php"; </script>';
	}

 ?>