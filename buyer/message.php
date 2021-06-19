<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include 'session.php';
$sellerid=$_GET['sellerid'];
 ?>
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
		<div class="header">
			<div class="logo">
				<h1><a href="index.php"><span>E</span>lectronic<label>Bid</label></a></h1>
			</div>  
			<div class="clearfix"> </div>
		</div>
		<!-- //header -->
		<!-- top-nav -->
		<nav class="cd-stretchy-nav edit-content">
			<a class="cd-nav-trigger" href="#0"> Menu <span aria-hidden="true"></span> </a>
			<ul>
				<li><a href="buyerpage.php" class="scroll active"><span>Home</span></a></li>
				<li><a href="product.php"><span>Products</span></a></li>
				<li><a href="winners.php"><span>Winners</span></a></li>
				<li><a href="message.php"><span>Message</span></a></li>
				<li><a href="feedback.php"><span>Feedback</span></a></li>
				<li><a href="profile.php"><span>Profile</span></a></li>
				<li><a href="report.php"><span>Report</span></a></li>
				<li><a href="logout.php"><span>Logout</span></a></li>
			</ul> 
			<span aria-hidden="true" class="stretchy-nav-bg"></span>
		</nav> 
		<!-- //top-nav -->
	</div>
</div>
<!-- //banner -->	
<!-- w3_short -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="buyerpage.php">Home</a><i>||</i></li>
			<li>Messages</li>
		</ul>
	</div>
</div>
<br>
<!-- //w3_short -->
<!-- welcome -->
<div class="container">
<div class="col-md-2"></div> 

	<div class="col-md-8" style="background-color: #9e9e9e8c;">

					<h2 class="text-center" style="color:grey;font-family: constantia;margin-top: 10px;">Your Message</h2>
					<hr>
					
					
		<?php include('connection.php');  $cdate=date('Y-m-d');
         $query=mysql_query("select * from query where sellerid='$sellerid' and uid='$uid' and Date(qdate)='$cdate'") or die(mysql_error());
         $rows=mysql_fetch_array($query);
        $nrows=mysql_num_rows($query);
          if($nrows<=0){
    ?>	<div class="col-md-3"></div>
    	<div class="col-md-6">
    		<form action="queryval.php?sellerid=<?php echo $sellerid; ?>" method="post">
                    <div class="form-group">
                    	<textarea class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]$" title="accepts alphanumeric values letters and digits." name="qcontent" rows="3" required placeholder="Ask your query"></textarea>
                    	<input type="submit" name="send" class="btn btn-info" style="margin-top: 20px;" value="Send">
                    </div>   			
            </form>

		</div>
        
        <?php } else if($nrows>0){
        $sender_qry=mysql_query("select * from query where `uid`='$uid' and `sellerid`='$sellerid' order by `qdate` asc ") or die(mysql_error());
          while($sender=mysql_fetch_array($sender_qry)) { ?>
          <div class="col-md-12">
        <?php  if($sender['status']=='buyer_sent')
          {
    ?>		<br>
	    	<div class="col-md-6 pull-right">
	    	  <div class="col-md-2">
	    	  	<?php $stud=mysql_query("select * from user where user_id='$uid'");
	    	  		$read=mysql_fetch_array($stud);
	    	  	 ?>
	    		<img src="../user_img/<?php echo $read['photo']; ?>" class="img-circle" height="50" width="50">
	    	  </div>
	    	  <div class="col-md-6">
	    		<div style="border: 2px solid black; border-radius: 8px; padding: 8px; "><?php echo $sender['qcontent']; ?></div>
	    		<h5 style="color: green; "><?php echo $sender['qdate']; ?></h5>
	    	  </div>
			</div>
        
        <?php }  if($sender['status']=='seller_sent')
          {
    ?>		<br>
	    	<div class="col-md-6 pull-left">
	    	  <div class="col-md-2">
	    	  	<?php $stud=mysql_query("select * from user where user_id='$sellerid'");
	    	  		$read=mysql_fetch_array($stud);
	    	  	 ?>
	    		<img src="../user_img/<?php echo $read['photo']; ?>" class="img-circle" height="50" width="50">
	    	  </div>
	    	  <div class="col-md-6">
	    		<div style="border: 2px solid black; border-radius: 8px; padding: 8px; "><?php echo $sender['qcontent']; ?></div>

	    		<h5 style="color: red; "><?php echo $sender['qdate']; ?></h5>
	    		
	    	  </div>
			</div>

        <?php } ?>
    	</div>
        <?php } ?> <a href="sendmessage.php?sellerid=<?php echo $sellerid; ?>" style="margin-top: 30px;" class="btn btn-info">Ask Query</a><?php } ?>

					</div>
</div>	
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