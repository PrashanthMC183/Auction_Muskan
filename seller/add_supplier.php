<?php include('con_db.php'); ?>
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
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-show-password.min.js"></script>
</head>

<body>

     <?php include("menu.php"); ?>
    <div class="container">

		
		<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">Add Supplier </h4>
					<hr>
					

					<form name="" method="post" action="" style="margin-left: 300px;">
					<div class="row">
						<div class="form-group col-md-7">
							<label>Supplier Name:</label>
							<input type="text" name="sname" placeholder="Enter Supplier name" class="form-control" required> 
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-7">
							<label>Comapany:</label>
							<input type="text" name="cmp" placeholder="Enter Comapany name" class="form-control" required> 
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-7">
							<label>Address:</label>
							<textarea class="form-control" name="add" placeholder="Enter Address"></textarea>
						</div>	
					</div>

					<div class="row">
						<div class="form-group col-md-7">
							<label>Contact:</label>
								<input type="number" name="contact" placeholder="Enter Contact Number" class="form-control" required> 
						</div>	
					</div>

					<div class="row">
						<div class="form-group col-md-7">
							<label>E-mail:</label>
							<input type="email" name="mail" placeholder="Enter E-mail Address" class="form-control" required> 
						</div>	
					</div>
							
						<p>&nbsp;</p>
						<div class="form-group">
							<input type="submit" name="save" value="Save" class="btn btn-primary">
						</div>
						</form>
			</div>		  
		</div>


</body>
</html>



<?php
	if(isset($_POST['save']))
	{
		$sname=$_POST['sname'];//names given of the controls  $is user defined name
		$cmp=$_POST['cmp'];
		$add=$_POST['add'];
		$cont=$_POST['contact'];
		$mail=$_POST['mail'];
		//echo 'hey';

	$query=mysql_query("INSERT INTO `supplier_tb`(`supname`, `company`, `address`, `email`, `contact`) VALUES ('$sname','$cmp','$add','$email','$cont')")  or die(mysql_error());
		
		if($query)
		{

			echo '<script>alert("Supplier been added successfully"); </script>';
		}
		else{
			echo '<script>alert("Insertion failed"); </script>';
		}

}
//echo 'no';
?>
