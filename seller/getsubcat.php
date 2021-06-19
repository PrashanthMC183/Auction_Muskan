<?php include('session.php');
include('connection.php');
	$c_id=$_GET['q']; ?>
	<option>Select Sub Category</option>
<?php 
	$sq=mysql_query("select * from subcategory where cid='$c_id'") or die(mysql_error());
	while($row=mysql_fetch_array($sq)){
   ?>
   <option value="<?php echo $row['subcid']; ?>"><?php echo $row['subcategory']; ?></option>
		<?php 
	}

 ?>