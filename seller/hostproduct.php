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

<body style="background-image: url('../images/blue2.jpg');">
<div class="wrapper">
     <?php include("menu.php"); ?>
    <div class="container">
		
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">Host a Product</h4>
					<hr>
					
					<form name="" method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group">
							<label>Product</label>
							<select class="form-control" name="pname" onblur="showsubcat(this.value)" required />
                            <option value="">Select Product</option>
                            <?php include('connection.php');
                                $sql=mysql_query("select * from product where user_id='$uid'") or die(mysql_error());
                                while($rr=mysql_fetch_array($sql)){
                             ?>
                             <option value="<?php echo $rr['pro_id']; ?>"><?php echo $rr['productname']; ?></option>
                             <?php } ?>
                        </select>
						</div>	
					</div>
					
					<div class="row">
						<div class="form-group">
							<label>Host on date</label>
							<input type="datetime-local" name="hostdate" class="form-control" required /> 
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label>Till date</label>
							<input type="datetime-local" name="tilldate" class="form-control" required /> 
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

		</body>
</html>
<?php
	if(isset($_POST['Request']))
	{
		$pro_name=$_POST['pname'];
		$h_date=$_POST['hostdate'];
		$t_date=$_POST['tilldate'];
		
		//echo 'hey';

	$query=mysql_query("INSERT INTO `hostproduct`(`uid`,`prid`, `hoston`, `tilldate`, `reqdate`, `status`) VALUES ('$uid','$pro_name','$h_date','$t_date',now(),'Requested')")  or die(mysql_error());
		
		if($query)
		{

			echo '<script>alert("Product been hosted successfully"); window.location="hostedproduct.php";</script>';
		}
		else{
			echo '<script>alert("Failed to host"); </script>';
		}
}
//echo 'no';
?>