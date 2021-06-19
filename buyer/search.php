<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
  
  // code to declare the winner and change the product status to ended
include 'session.php';
include 'connection.php';
    
  
  

  date_default_timezone_set('Asia/Kolkata');
   $curr_date_time=date('Y-m-d H:i:s');

  $qry_select_product=mysql_query("SELECT * FROM `hostproduct`  ");
  while ($row=mysql_fetch_array($qry_select_product)) 
  {
    $reqid=$row['reqid'];
    // echo '<br>';
    $product_date_time=$row['tilldate'];
    if (strtotime($curr_date_time) >= strtotime($product_date_time) )
      {
        $qry_update_winner=mysql_query("UPDATE `hostproduct` SET `status`='Expired' WHERE `reqid`='$reqid'");

      }
      
      

    
  }


  
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
				<h1><a href="single.php"><span>E</span>lectronic<label>Bid</label></a></h1>
			</div>  
			<div class="clearfix"> </div>
		</div>
		<!-- //header -->
		<!-- top-nav -->

		<!-- //top-nav -->
	</div>
</div>
<!-- //banner -->	
<!-- w3_short -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="buyerpage.php">Home</a><i>||</i></li>
			<li>Searched Products</li>
		</ul>
	</div>
</div>
<br>
<!-- //w3_short -->
<!-- welcome -->

<div class="container-fluid">

	<?php include('connection.php');
    if(isset($_POST['search'])){ 
        if(preg_match("/[A-Z  | a-z | 0-9]+/", $_POST['keyword']))
           { 
          $name=$_POST['keyword']; 
		$sql=mysql_query("SELECT DISTINCT productname,reqid,pro_id,photo,min_range from product,hostproduct where product.pro_id=hostproduct.prid and hostproduct.`status`='Hosted' and productname LIKE '%" . $name .  "%' "); 
		while($fetch=mysql_fetch_array($sql)){
	 ?>

	 <div class="col-md-3" style=" text-align: center; margin-bottom: 10px; border-radius: 6px;">
	 	<h3 style="text-transform: capitalize;text-align: center; color:black; height: 40px;"><?php echo $fetch['productname']; ?></h3>
	 	<a href="product_detail.php?pro_id=<?php echo $fetch['pro_id'];?>&&rid=<?php echo $fetch['reqid']; ?>"">
	 	<img src="seller/photos/<?php echo $fetch['photo']; ?>" style="margin-top: 9px;" height="150" width="200" class="img-rounded"></a>
	 	
	 	<h5 style="color: blue; font-weight: bold;">Min. Range Rs: <?php echo $fetch['min_range']; ?> </h5>
	 	<h5 id="demo<?php echo $fetch['pro_id']; ?>"></h5>
	 	<br>
	 	<a href="product_detail.php?pro_id=<?php echo $fetch['pro_id'];?>&&rid=<?php echo $fetch['reqid']; ?>" class="btn btn-primary" >View More</a>
	 	
	 </div>
	 <?php } } } ?>
</div>
</div>
</div>
<br><br><br>
<!-- //welcome -->
<!-- middle -->

<!-- //newsletter -->
<!-- footer -->

<?php include('footer.php');?>
<!-- //footer -->
<script type="text/javascript">
            function createCountDown(elementId, date) {
            // Set the date we're counting down to
            var countDownDate = new Date(date).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now an the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Display the result in the element with id="demo"
              document.getElementById(elementId).innerHTML = days + "d " + hours + "h "
              + minutes + "m " + seconds + "s ";

              // If the count down is finished, write some text 
              if (distance < 0) {
                clearInterval(x);
                document.getElementById(elementId).innerHTML = "Product EXPIRED";
              }
            }, 1000);
        }

        // createCountDown('demo1', "2019-07-26 18:00:00")
        // createCountDown('demo2', "2018-02-13 14:00:00")
        // createCountDown('demo3', "2017-07-27 10:04:30")
        // createCountDown('demo4', "2017-07-28 20:10:50")
        </script>
        
        <?php
     
            $i=1;
            $qry_select=mysql_query("SELECT * FROM `hostproduct` where status='Hosted'");

            while ($row= mysql_fetch_array($qry_select)) 
            {
                $time=date('M',strtotime($row['tilldate'])).' '.date('d',strtotime($row['tilldate'])).', '.date('Y',strtotime($row['tilldate'])).' '.date('H:i',strtotime($row['tilldate']));
                $prid=$row['prid'];
        ?>
            <script type="text/javascript">
                createCountDown('demo<?php echo $prid ?>', "<?php echo $time ?>");
            </script>
        <?php
                $i++;

            }
        ?>
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