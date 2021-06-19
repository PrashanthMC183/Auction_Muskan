<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
<!-- banner-2 -->
<div class="main-agile">
	<div class="banner-w3l-2">
		<!-- header -->
		<?php include('menulist.php');?>
		<!-- //top-nav -->
	</div>
</div>
<!-- //banner-2 -->	
<!-- w3_short -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="index.php">Home</a><i>||</i></li>
			<li>Contact Us</li>
		</ul>
	</div>
</div>
<!-- //w3_short -->
<!-- mail -->
	<div class="banner-bottom">
		<div class="container">
			<h3 class="title-w3l"><span>C</span>ontact</h3>
			<div class="w3_testimonials_grids">
				<div class="col-md-3 w3_contact_grid">
					<div class="agile_call">
						<div class="col-xs-3 w3l_contact_grid_left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 w3l_contact_grid_right">
							<ul>
								<li>+(91) 82 890 67900</li>
								<li>+(91) 73 456 65612</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="agileits_w3layouts_address">
						<div class="col-xs-3 w3l_contact_grid_left">
							<span class="fa fa-map-marker" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 w3l_contact_grid_right">
							<ul>
								<li>12 R.K Street,</li>
								<li>Delhi.</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3_agileits_mail">
						<div class="col-xs-3 w3l_contact_grid_left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 w3l_contact_grid_right">
							<ul>
								<li><a href="mailto:info@example1.com">info@example1.com</a></li>
								<li><a href="mailto:info@example2.com">info@example2.com</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-9 w3_contact_grid">
					<form action="#" method="post">
						<div class="col-md-6 wthree_contact_grid_left">
							<input type="text" name="Name" placeholder="Name" required="">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="text" name="Contact" placeholder="Contact" required="">
							
						</div>
						<div class="col-md-6 wthree_contact_grid_right">
							<textarea placeholder="Message..." required="" name="Message"></textarea>
							<input type="submit" value="Send" name="submit">
						</div>
					</form>
					<?php 
						include('connection.php');
						if(isset($_POST['submit']))
						{
							$name=mysql_real_escape_string($_POST['Name']);
							$email=mysql_real_escape_string($_POST['Email']);
							$cont=mysql_real_escape_string($_POST['Contact']);
                            $message=mysql_real_escape_string($_POST['Message']);

                            $sql=mysql_query("INSERT INTO `mail_us`(`name`, `email`, `contact`, `message`, `date`) VALUES ('$name','$email','$cont','$message',now())")or die(mysql_error());
                            if($sql)
                            {
								echo '<script>alert("Message been delivered"); window.location="index.php"; </script>';
							}
							else
							{
								echo '<script>alert("Failed to deliver"); </script>';
							}

						}

					?>


				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
		

<!-- //mail -->


<!-- footer -->
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
<!-- //js-scripts -->

</body>
</html>