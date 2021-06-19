<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php include('session.php'); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Auction System</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Field web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
 
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color:#ef6c00;
  color: white;
}
</style>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body> 
<!-- banner -->
<div class="main-agile">
	<div class="banner-w3l">
		<!-- header -->
		<div class="header">
			<div class="logo">
				<h1><a href="index.php"><span>E</span>lectronic<label>Bid</label></a></h1>
			</div>  
			<div class="clearfix"> </div>
		</div>
		<!-- //header -->
		<!-- top-nav -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="buyerpage.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="art.php">Artemis Gallery</a></li>
          <li><a href="mysubscription.php">Apartments</a></li>
          <li><a href="news_req.php">Electronics</a></li>
          <li><a href="news_req.php">Interiors</a></li>
          <li><a href="news_req.php">Motors</a></li>
          <li><a href="news_req.php">Fashion</a></li>
          <li><a href="news_req.php">Books</a></li>
          <li><a href="news_req.php">Electronic parts</a></li>
        </ul>
      </li>
      <li><a href="product.php">Products</a></li>
      <li><a href="winners.php">Winners</a></li>
      <li><a href="news.php">News</a></li>
      <li><a href="feedback.php">Feedback</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="notification.php">Notification<span class="badge"><?php include('connection.php');
	   			$sq=mysql_query("select  count(*) from notification where user_id='$uid' and status='sent'");
	   			$nc=mysql_result($sq,0);
	   			echo $nc;
	   		 ?></span></a></li>
	  <li><a href="logout.php">Logout</a></li>

    </ul>
  </div>
</nav>

<div class="topnav">
  			<a class="active" href="buyerpage.php">Home</a>
  			<a href="product.php">Products</a>
  			
			<a href="winners.php">Winners</a> 
			<a href="news.php">News</a>
			<a href="feedback.php">Feedback</a>
			<a href="profile.php">Profile</a>
			<a href="notification.php">Notification<span class="badge"><?php include('connection.php');
	   			$sq=mysql_query("select  count(*) from notification where user_id='$uid' and status='sent'");
	   			$nc=mysql_result($sq,0);
	   			echo $nc;
	   		 ?></span></a>
			<a href="logout.php">Logout</a>

			
            
        			

		</div>

		<!-- //top-nav -->
		<div class="container">
			<div class="agile_banner_info">
				<div class="agile_banner_info1">
					<h3>Welcome To <span>Bidding Field</span></h3>
					<div id="typed-strings" class="agileits_w3layouts_strings">
						<p>start your <i>deals</i> to complete your <i>dreams</i></p>
						<p>Our <i>business</i> is Your <i>business</i></p>
						<p>Best Of <i>bidding</i> planning & support </p>
					</div>
					<span id="typed" style="white-space:pre;"></span>
				</div>
								
				<form action="search.php" method="post">
					<div class="banner_agile_para col-md-8" style="margin-left: 400px; margin-bottom: 20px;">
					  <div class="col-md-4">
						<input type="text" name="keyword" class="form-control" style="width: 250px;" placeholder="Search">
					  </div>
					  <div class="col-md-2">
						<button class="btn btn-info" name="search" type="submit"><i class="fa fa-search"></i></button>
					  </div>
					</div>
			   </form>
				
				<div class="wrapper-inner-tab-backgrounds">
					<div class="wrapper-inner-tab-backgrounds-first"><a href="single.php"><div class="sim-button button17">Read More</div></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->	
<!-- welcome -->
<div class="about w3layouts-agileinfo" id="about">
	<div class="container">
		<h3 class="title-w3l"><span>W</span>elcome</h3>
		<div class="about-top w3ls-agile">
			<div class="col-md-6 red">
				<img class="img-responsive" src="images/2.jpg" alt="">
				<div class="about-img">
					<div class="col-md-6 col-xs-6 about-img1">
						<img class="img-responsive" src="images/3.jpg" alt="">
					</div>
					<div class="col-md-6 col-xs-6 about-img2">
						<img class="img-responsive" src="images/4.jpg" alt="">
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-6 come">
				<div class=" about-wel">
					<h5>About <span>Auction</span></h5>
					<p>Since the internet has become a popular place to buy and sell goods, we provide a way to most homes.</p>
					<P>Online Auctioning is a web based application, so the main advantages is that there is no more system compatibility requirement problem. We provide the service by which the user can do a small research regarding the product, price and quality before participating in the bidding.
						<ul>
							<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>It will provide greater accuracy of information with detailed control, better presentation for the satisfactory for the customers.</li>
							<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>Easy & fast user registration.</li>
							<li><i class="fa fa-hand-o-right" aria-hidden="true"></i>Perform searches- User can specify exactly what they are looking for.</li>
						</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //welcome -->
<!-- middle -->

<!-- //news -->
<!-- newsletter -->

<!-- //footer -->
<?php include('footer.php'); ?>

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
<!-- banner-type-text -->
<script src="js/typed.js" type="text/javascript"></script>
<script>
	$(function(){

		$("#typed").typed({
			// strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
			stringsElement: $('#typed-strings'),
			typeSpeed: 30,
			backDelay: 500,
			loop: false,
			contentType: 'html', // or text
			// defaults to false for infinite loop
			loopCount: false,
			callback: function(){ foo(); },
			resetCallback: function() { newTyped(); }
		});

		$(".reset").click(function(){
			$("#typed").typed('reset');
		});

	});

	function newTyped(){ /* A new typed object */ }

	function foo(){ console.log("Callback"); }
</script>
<!-- //banner-type-text -->
<!-- responsiveslider -->
<script src="js/responsiveslides.min.js"></script>
<script>
	// You can also use "$(window).load(function() {"
	$(function () {
	  // Slideshow 4
	  $("#slider3").responsiveSlides({
		auto: true,
		pager:false,
		nav:false,
		speed: 500,
		namespace: "callbacks",
		before: function () {
		  $('.events').append("<li>before event fired.</li>");
		},
		after: function () {
		  $('.events').append("<li>after event fired.</li>");
		}
	  });

	});
</script>
<!-- //responsiveslider -->
<!-- //js-scripts -->

</body>
</html>