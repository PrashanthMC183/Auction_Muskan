<?php
  
  // code to declare the winner and change the product status to ended
include 'session.php';
include 'connection.php';
    
  
  


  $qry_select_product=mysql_query("SELECT * FROM `notification` where user_id='$uid' and status='sent' ");
  while ($row=mysql_fetch_array($qry_select_product)) 
  {
    // echo '<br>';
    
        $qry_update_winner=mysql_query("UPDATE `notification` SET `status`='seen' WHERE `user_id`='$uid'");

      
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

<div class="header">
            <div class="logo">
                <h1 style="margin-top:-10px;"><a href="buyerpage.php"><span>E</span><font color="black">lectronic<label>Bid</label></a></h1>
            </div>  
            <div class="clearfix"> </div>
        </div>			
		<!-- //header -->
		<!-- top-nav -->

<div class="services-breadcrumb"  style="background-color: orange;">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="buyerpage.php" style="color:red;">Home</a><i>||</i></li>
			<li>Notification</li>
		</ul>
	</div>
</div>
     
    <div class="container">
    <div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="well login-container" style="margin-top: 10px;">
					<h2 class="text-center">Notification</h2>
					<hr>
					<?php
					include('connection.php');
					$sql=mysql_query("SELECT * FROM notification where user_id='$uid' order by nid desc ") or die(mysql_error());
					while($row=mysql_fetch_array($sql)) { ?>
											<table class="table table-bordered table-hover table-striped">
												<tr>
													<td><?php echo $row['notification']; ?></td>
												</tr>
												<tr>
													<td><?php echo date("d-m-Y",strtotime($row['date'])); ?></td>
												</tr>
												<tr>
													<td><a href="cod.php?wid=<?php echo $row['win_id']?>&&bid=<?php echo $row['bid_id']?>" class="btn btn-primary">COD</a> <a href="payment.php?wid=<?php echo $row['win_id']?>&&bid=<?php echo $row['bid_id']?>" class="btn btn-danger">Debit</a></td>
												</tr>
											</table>
										<?php } ?>

					
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