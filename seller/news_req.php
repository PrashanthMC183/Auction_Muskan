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
		
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">NEWS Request</h4>
					<hr>
					
					<form name="" method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Enter the title" pattern="^[a-zA-Z0-9\s]+" title="letters and numbers only" oninvalid="setCustomValidity('Enter title of the product')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
						</div>	
					</div>
					
					<div class="row">
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" name="p_name" class="form-control" placeholder="Enter product name" pattern="^[a-zA-Z0-9\s]+" title="Enter Product name" oninvalid="setCustomValidity('Please enter product name')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label>Description</label>
							<textarea type="text" name="desc" class="form-control" placeholder="Enter Description" pattern="^[a-zA-Z0-9\s]+" oninvalid="setCustomValidity('Please write the description below')"
    onchange="try{setCustomValidity('')}catch(e){}" required /></textarea> 
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label>Post on</label>
							<input type="date" name="poston" class="form-control" title="Select posted date" oninvalid="setCustomValidity('Please Select the Posted on date')"
    onchange="try{setCustomValidity('')}catch(e){}" required \> 
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="img" class="form-control" title="Please choose the image" required \> 
						</div>
					</div>
					

					<div class="row">
						<div class="form-group">
							<input type="submit" name="Request" value="Save" class="btn btn-primary btn-block">
						</div>
					</div>
				</form>
			</div>		  
		</div>
		</div>
		</div>
<?php
include('connection.php');
	if(isset($_POST['Request']))
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
         {// Start of if image file image ff image file upload successfu

		$title=$_POST['title'];
		$pro_name=$_POST['p_name'];
		$desc=$_POST['desc'];
		$poston=$_POST['poston'];
		//echo 'hey';

	$query=mysql_query("INSERT INTO `newsreq`(`uid`, `title`, `username`, `productname`, `desc`, `postonbefore`, `req_sent`, `image`, `status`) VALUES ('$uid','$title','$fname','$pro_name','$desc','$poston',now(),'$final_file','Requested')")  or die(mysql_error());
		
		if($query)
		{

			echo '<script>alert("News request posted successfully"); window.location="home.php";</script>';
		}
		else{
			echo '<script>alert("Failed to post"); </script>';
		}
}
}
?>
		</body>
</html>
