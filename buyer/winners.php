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
			<li>Winnners</li>
		</ul>
	</div>
</div>
     
    <div class="container">
    <div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="well login-container" style="margin-top: 20px;">
					<h2 class="text-center" style="color:darkblue;">Product Winner</h2>
					<hr>
					<form action="" method="post">
					<div class="row">
						<div class="form-group col-md-6" style="margin-left: 50px; ">
						<h4>Select Product</h4>
                        <select class="form-control" name="prid">
                            <option value="">Select Product</option>
                            <?php include('connection.php');
                                $sql=mysql_query("select * from product, hostproduct where product.pro_id=hostproduct.prid and hostproduct.`status`='Expired'") or die(mysql_error());
                                while($rr=mysql_fetch_array($sql)){
                             ?>
                             <option value="<?php echo $rr['prid']; ?>"><?php echo $rr['productname']; ?></option>
                             <?php } ?>
                        </select><br>
                        </div>
                            <input type="submit" name="search" style="margin-top: 20px;" value="Search" class="btn btn-warning">
                    </div>
                   </form>
                        <br>
                             
                    <?php include('connection.php'); 
                        if(isset($_POST['search']))
                        {
                            $prid=$_POST['prid'];
                    ?>
                    <table class="table table-bordered table-hover" style="background-color: white;">
                     <tr>
                        <th>Sl No.</th>
                        <th>Bid Date</th>
                        <th>Winner</th>
                        <th>Winning amount</th>
                        
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select MAX(win_amt) from winnerlist where prod_id='$prid'") or die(mysql_error());
                        $row=mysql_fetch_array($sql);
                        $amt=$row[0];
                        $qr1=mysql_query("SELECT * FROM bid where bidamt='$amt' order by biddate asc limit 1");
                        $res1=mysql_fetch_array($qr1);
                        $uid=$res1['uid'];
                        $qr=mysql_query("SELECT * FROM user where user_id='$uid'");
                        $res=mysql_fetch_array($qr);
                        
                     ?>
                     <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $res1['biddate']; ?></td>
                         <td><?php echo $res['fullname'];?></td>
                         <td><?php echo $amt; ?></td>
                     </tr>

                </table>
                <?php } ?>
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