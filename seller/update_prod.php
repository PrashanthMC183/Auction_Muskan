<?php include('session.php'); ?>
<?php include('connection.php');
    $p_id=$_GET['pro_id'];
    $cid=$_GET['cid'];
    $s_id=$_GET['sid'];
    $sq=mysql_query("select * from product,category,subcategory where product.`pro_id`='$p_id' and subcategory.`subcid`='$s_id' and category.`cid`='$cid'") or die(mysql_error());
    $row=mysql_fetch_array($sq);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-show-password.min.js"></script>
</head>

<body>
<div class="wrapper" style="background-image: url('../images/blue2.jpg');">
     <?php include("menu.php"); ?>
    <div class="container">
		
		<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">Update Product</h4>
					<hr>
					

					<form name="" method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group">
							<label>Seller id:</label>
							<input type="text" name="sid" value="<?php echo $uid; ?>" class="form-control" readonly> 
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label>Product name:</label>
							<input type="text" name="pname" value="<?php echo $row['productname'];?>" placeholder="Enter Product name" class="form-control" > 
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" name="desc" placeholder="Enter Product description"><?php echo $row['desc'];?></textarea>
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Category:</label>
							<select class="form-control" onblur="showsubcat(this.value)">
                            <option value="<?php echo $row['cid'];?>" style="background-color: yellow;"><?php echo $row['cname'];?></option>
                            <?php include('connection.php');
                                $sql=mysql_query("select * from category") or die(mysql_error());
                                while($rr=mysql_fetch_array($sql)){
                             ?>
                             <option value="<?php echo $rr['cid']; ?>"><?php echo $rr['cname']; ?></option>
                             <?php } ?>
                        </select>
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Sub-category:</label>
							<select name="subcatid" id="subcat" class="form-control">
                            <option value="<?php echo $row['subcid'];?>" style="background-color: yellow;"><?php echo $row['subcategory'];?></option>
                        </select>
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Image:</label>
							<input type="file" name="img" class="form-control" > 
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Minimum range:</label>
							<input type="text" name="minrange" value="<?php echo $row['min_range'];?>" placeholder="Enter starting price of the product" class="form-control" >
						</div>	
					</div>
					<div class="row">
						<div class="form-group">
							<input type="submit" name="Update" value="Save" class="btn btn-primary btn-block">
						</div>
					</div>
						</form>
			</div>		  
		</div>
<script>
		function showsubcat(str) 
			{
			   
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			      document.getElementById("subcat").innerHTML=this.responseText;
			    }
			  }
			  xmlhttp.open("GET","getsubcat.php?q="+str,true);
			  xmlhttp.send();
			}
	</script>

<?php include('connection.php');

	if(isset($_POST['Update']))
	{
		if(isset($_FILES['img']['name']))
		{
		 $file = rand(1000,100000)."-".$_FILES['img']['name'];
         $file_loc = $_FILES['img']['tmp_name'];
         $file_size = $_FILES['img']['size'];
         $file_type = $_FILES['img']['type'];
         $folder="photos/";
         // new file size in KB
         $new_size = $file_size/2048;  
         // new file size in KB
                                                        
         // make file name in lower case
         $new_file_name = strtolower($file);
         // make file name in lower case
                                                        
         $final_file=str_replace(' ','-',$new_file_name);
                                                        
         if(move_uploaded_file($file_loc,$folder.$final_file))
         {// Start of if image file upload successful
		$sellerid=$_POST['sid'];//names given of the controls  $is user defined name
		$prname=$_POST['pname'];
		$description=$_POST['desc'];
		$subcat=$_POST['subcatid'];
		$mrange=$_POST['minrange'];
		//echo 'hey';

	$query=mysql_query("UPDATE `product` SET `user_id`='$sellerid',`productname`='$prname',`subc_id`='$subcat',`photo`='$final_file',`desc`='$description',`min_range`='$mrange' WHERE `pro_id`='$p_id'")  or die(mysql_error());
		
		if($query)
		{

			echo '<script>alert("Product been updated successfully"); window.location="prod_details.php";</script>';
		}
		else{
			echo '<script>alert("Insertion failed"); </script>';
		}
}
}
		$sellerid=$_POST['sid'];//names given of the controls  $is user defined name
		$prname=$_POST['pname'];
		$description=$_POST['desc'];
		$subcat=$_POST['subcatid'];
		$mrange=$_POST['minrange'];
		//echo 'hey';

	$query=mysql_query("UPDATE `product` SET `user_id`='$sellerid',`productname`='$prname',`subc_id`='$subcat',`desc`='$description',`min_range`='$mrange' WHERE `pro_id`='$p_id'")  or die(mysql_error());
		
		if($query)
		{

			echo '<script>alert("Product been updated successfully"); window.location="prod_details.php";</script>';
		}
		else{
			echo '<script>alert("Insertion failed"); </script>';
		}
}

?>
</div>
</div>
</body>
</html>
