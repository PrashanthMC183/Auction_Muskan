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

		<!-- //header -->
		<!-- top-nav -->
		
<div class="services-breadcrumb"  style="background-color: orange;">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="buyerpage.php" style="color:red;">Home</a><i>||</i></li>
			<li>New Password</li>
		</ul>
	</div>
</div>
     
    <div class="container">
    <div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="well login-container" style="margin-top: 10px;">
					<h2 class="text-center">Change Password</h2>
					<hr style="border:1px solid orange;">
					

					<form name="" method="post" action="" style="margin-left: 200px;">
					<div class="row">
						<div class="form-group col-md-8">
							<h4>Current Password</h4>
							<input type="password" name="cpwd" placeholder="Enter current password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="setCustomValidity('Please enter current password')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-8">
							<h4>New Password</h4>
							<input type="password" name="npwd" placeholder="Enter new password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="setCustomValidity('Please enter new password')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-8">
							<h4>Re-enter the new password</h4>
							<input type="password" name="rpwd" placeholder="Re-enter new password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="setCustomValidity('Please Re-enter new password ')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
						</div>	
					</div>
						<p>&nbsp;</p>
						<div class="form-group">
							<input type="submit" name="save" value="Save" class="btn btn-warning">
						</div>
						</form>
			</div>		  
		</div>

</div>

<?php include('connection.php');
	if(isset($_POST['save']))
	{
		$currentp=$_POST['cpwd'];//names given of the controls  $is user defined name
		$newp=$_POST['npwd'];
		$repwd=$_POST['rpwd'];

		$sql=mysql_query("select * from user where password='$currentp' and user_id='$uid'")or die(mysql_error());
                            $nrows=mysql_num_rows($sql);
                            if($nrows==1)
                            {
                                if($newp==$repwd)
                                {
                                    $qry=mysql_query("update user set password='$newp' where user_id='$uid'") or die(mysql_error());
                                     if($qry)
                                        {
                                            echo '<script>alert("Password been changed"); window.location="buyerpage.php"; </script>';
                                        }
                                        else
                                        {
                                            echo '<script>alert("Failed to change the password"); </script>';
                                        }
                                }
                                else{
                                    echo '<script>alert("Password Mismatch"); </script>';
                                }
                            }
                           

                        }

                    ?>
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