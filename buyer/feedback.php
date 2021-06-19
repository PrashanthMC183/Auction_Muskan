 <?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Auction System</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Field web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Athiti:200,300,400,500,600,700&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
</head>
<body> 

<div class="header">
            <div class="logo">
                <h1 style="margin-top:-10px;"><a href="buyerpage.php"><span>E</span><font color="black">lectronic<label>Bid</label></a></h1>
            </div>  
            <div class="clearfix"> </div>
        </div>			
<div class="services-breadcrumb" style="background-color: orange;">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="buyerpage.php" style="color:red;">Home</a><i>||</i></li>
			<li>Feedback</li>
		</ul>
	</div>
</div>
     
    <div class="container">
    <div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="well login-container" style="margin-top: 10px;">
					<h2 class="text-center" style="color:orange;">Feedback</h2>
					<hr style="border:1px solid orange;">
					<form name="" method="post" action="" style="margin-left: 150px;">
					<div class="row">
						<div class="form-group col-md-8">
						<h4>Select opinion</h4>
                        <select name="opinion" class="form-control" required />
                     		<option value=""></option>
                     		<option value="excellent">Excellent</option>
                     		<option value="good">Good</option>
                     		<option value="bad">Bad</option>
                     		<option value="poor">Poor</option>
                     	</select><br>

							<h4>Feedback</h4>
							<textarea type="text" name="feedback" placeholder="Enter your feedback" class="form-control" pattern="^[a-zA-Z0-9\s]+" oninvalid="setCustomValidity('Please enter your feedback')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
							</textarea>
						</div>
					</div>
				<p>&nbsp;</p>
						<div class="form-group">
							<input type="submit" name="Send" value="Send" class="btn btn-warning">
						</div>
						</form>
			</div>		  
		</div>

</div>

<?php include('connection.php');
	if(isset($_POST['Send']))
	{
		$opn=$_POST['opinion'];//names given of the controls  $is user defined name
		$feedb=$_POST['feedback'];
		

		$sql=mysql_query("INSERT INTO `feedback`(`user_id`, `fcontent`, `fdate`, `fcategory`) VALUES ('$uid','$feedb',now(),'$opn')")or die(mysql_error());
                      if($sql)
                            {
								echo '<script>alert("Feedback been sent..!!"); window.location="buyerpage.php"; </script>';
							}
							else
							{
								echo '<script>alert("Failed to send the feedback..!!"); </script>';
							}

						}

					?>
					</div>
				<div class="clearfix"> </div>
<?php include('footer.php');?>
<!-- //footer -->

<!-- js-scripts -->		
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js -->
<!-- menu-js --> 	
<script src="js/modernizr.js"></script> <!-- Modernizr -->	
<script src="js/menu.js"></script> <!-- Resource jQuery -->	
<!-- //menu-js --> 	 
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->

</body>
</html>