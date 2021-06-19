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
<!-- header -->
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
			<li>Profile</li>
		</ul>
	</div>
</div>
     
    
     
     <?php include('connection.php');
        $sq=mysql_query("select * from user where user_id='$uid'");
        $row=mysql_fetch_array($sq);
      ?>
    <div class="container">
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;margin-top: 30px;">My Profile</h2>
            <hr>
                <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-10 well" >
                        <div class="col-md-3">
                            <img src="../user_img/<?php echo $row['photo']; ?>" height="250" width="250" class="img-circle">
                        </div>
                        <div class="col-md-7" style="margin-left: 50px;">
                            <div class="col-md-2" style="font-weight: bold; color:darkblue;">
                                <h4 style="margin-top: 10px;">Name: </h4>
                                <h4 style="margin-top: 10px;">Email: </h4>
                                <h4 style="margin-top: 10px;">Contact: </h4>
                                <h4 style="margin-top: 10px;">Address: </h4>
                                <h4 style="margin-top: 10px;">Gender: </h4>
                                 
                            </div>
                            <div class="col-md-5" style="font-weight: bold; color:blue;">
                                <h4 style="margin-top: 10px;"><?php echo $row['fullname'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['email'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['contact'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['address'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['gender'];?></h4><br>
                                
                                <a href="editprofile.php" title="Edit profile" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="changepassword.php" title="Change Password" class="btn btn-warning"><i class="fa fa-cogs"></i></a>
                                <a href="buyerpage.php" title="Back" class="btn btn-danger"><i class="fa fa-reply"></i></a>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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