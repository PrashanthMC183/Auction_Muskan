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
<div class="wrapper">
    <?php include("menu.php"); ?>

    <!-- Page Content -->
    <div class="container ">
	<div class="well home-container">
		
			<div class="row">
				<div class="col-md-4 box">
					<a href="profile.php">
					<div class="well mybox">
						<i class="fa fa-user fa-5x"></i>
						<h4 class="text-center">Profile</h4>
					</div>
					</a>
				</div>
			
				<div class="col-md-4 box">
				<a href="category.php">
					<div class="well mybox">
					<i class="fa fa-check-circle fa-5x"></i>
						<h4 class="text-center">Purchase</h4>
					</div>
				</a>
				</div>
			
				<div class="col-md-4 box">
					<a href="viewbidder.php">
					<div class="well mybox">
					<i class="fa fa-users fa-5x"></i>
						<h4 class="text-center">Bidders</h4>
					</div>
					</a>
				</div>
			</div>
		
			<div class="row">
						
				<div class="col-md-4 box">
					
					<a href="prod_details.php">
					<div class="well mybox">
					<i class="fa fa-shopping-cart fa-5x"></i>
						<h4 class="text-center">Sales</h4>
					</div>
				</a>
				</div>
				<div class="col-md-4 box">
					<a href="viewpackage.php">
					<div class="well mybox">
					<i class="fa fa-file fa-5x"></i>
						<h4 class="text-center">Package</h4>
					</div>
					</a>
				</div>
				
				
			
				<div class="col-md-4 box">
					<a href="paymentmode.php">
					<div class="well mybox">
					<i class="fa fa-money fa-5x"></i>
						<h4 class="text-center">Payment</h4>
					</div>
					</a>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-4 box">
					<a href="changepwd.php">
					<div class="well mybox">
					<i class="fa fa-cogs fa-5x"></i>
						<h4 class="text-center">Change Password</h4>
					</div>
					</a>
				</div>
				
				<div class="col-md-4 box">
					<a href="report.php">
					<div class="well mybox">
					<i class="fa fa-history fa-5x"></i>
						<h4 class="text-center">Report</h4>
					</div>
					</a>
				</div>
				
								
				<div class="col-md-4 box">
				<a href="logout.php">
					<div class="well mybox">
					<i class="fa fa-sign-out fa-5x"></i>
						<h4 class="text-center"> Logout</h4>
					</div>
				</a>
				</div>
			
				
				
			</div>
		
	</div>
		
	</div>
</div>
</div>

       
    <!-- /.container -->
	


</body>

</html>
