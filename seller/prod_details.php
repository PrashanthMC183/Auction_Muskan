<?php include('session.php'); ?>
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
		
		
			<div class="col-md-4">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">Add Product</h4>
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
							<input type="text" name="pname" placeholder="Enter Product name" class="form-control" pattern="^[a-zA-Z0-9\s]+" title="letters and numbers only" oninvalid="setCustomValidity('Please write product name')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" name="desc" placeholder="Enter Product description" pattern="^[a-zA-Z0-9\s]+" title="letters and numbers only" required /></textarea>
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Category:</label>
							<select class="form-control" onblur="showsubcat(this.value)" required />
                            <option value="">Select Category</option>
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
							<select name="subcatid" id="subcat" class="form-control" title="Please select the categoy" required />
                            
                        </select>
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Image:</label>
							<input type="file" name="img" class="form-control" title="Please select the Image" required /> 
						</div>	
					</div>

					<div class="row">
						<div class="form-group">
							<label>Minimum range:</label>
							<input type="text" name="minrange" placeholder="Enter starting price of the product" class="form-control" pattern="[0-9]+" title="only letters" oninvalid="setCustomValidity('Please enter the valid range ')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
						</div>	
					</div>
					<div class="row">
						<div class="form-group">
							<input type="submit" name="Add" value="Save" class="btn btn-primary btn-block">
						</div>
					</div>
						</form>
			</div>		  
		</div>
		<div class="container">
        <br><br>
            <div class="col-md-8">
            
            <h2 style="font-size: 35px; font-family:argentina; text-align: center;color:white;">View Products</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Products</th>
                        <th>Image</th>
                        <th>Minimum Range</th>
                        <th>Action</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from product,category,subcategory where product.subc_id=subcategory.subcid and subcategory.cid=category.cid and user_id='$uid'") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $row['productname']; ?></td>
                         <td><img src="photos/<?php echo $row['photo'];?>" height="60px" width="60px"></td>
                         <td><?php echo $row['min_range'];?></td>
                         <td><a href="update_prod.php?pro_id=<?php echo $row['pro_id'];?>&&cid=<?php echo $row['cid']; ?>&&sid=<?php echo $row['subcid']; ?>" class="btn btn-primary" title="Edit Product"><i class="fa fa-edit"></i></a> <a href="delproduct.php?pro_id=<?php echo $row['pro_id'];?>" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a></td>
                     </tr>
                     <?php } ?>
                </table>
            </div>
        </div>


</body>
</html>

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

<?php
	if(isset($_POST['Add']))
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
		$date=date('Y-m-d');
	$qry=mysql_query("SELECT * FROM subscription where uid='$uid' and enddate > '$date'");
	echo $rc=mysql_num_rows($qry);
	if($rc<=0)
	{
		echo '<script>alert("You cannot add product, since you have not subscribed"); 
		window.location="viewpackage.php";</script>';
	}
	elseif($rc > 0){
	$query=mysql_query("INSERT INTO `product`(`user_id`, `productname`, `subc_id`, `photo`, `desc`, `min_range`) VALUES ('$sellerid','$prname','$subcat','$final_file','$description','$mrange')")  or die(mysql_error());
		
		if($query)
		{

			echo '<script>alert("Product been added successfully"); window.location="prod_details.php";</script>';
		}
		else{
			echo '<script>alert("Insertion failed"); </script>';
		}
	}
}
}
//echo 'no';
?>
