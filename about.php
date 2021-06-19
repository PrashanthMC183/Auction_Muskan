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
<!-- //banner -->	
<!-- w3_short -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="index.php">Home</a><i>||</i></li>
			<li>About</li>
		</ul>
	</div>
</div>
<!-- //w3_short -->
<!-- welcome -->
<div class="about w3layouts-agileinfo" id="about">
	<div class="container">
		<h3 class="title-w3l"><span>A</span>bout <span>u</span>s</h3>
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
					<h5><span>AUCTION SYSTEM</span></h5>
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

<!-- //newsletter -->
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