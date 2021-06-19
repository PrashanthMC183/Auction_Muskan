<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-show-password.min.js"></script>
</head>

<body style="background-image: url('../images/blue2.jpg');">
<div class="wrapper">
     <?php include("menu.php"); ?>
    <div class="container">
    	<div class="col-md-2"></div>
      <?php include('connection.php'); $cdate=date('Y-m-d');
        $sql=mysql_query("select * from subscription,package where subscription.`uid`='$uid' and subscription.`enddate`>'$cdate' and package.pid=subscription.pid");

        $nrow=mysql_num_rows($sql); $fet=mysql_fetch_array($sql);
        if($nrow>0){ ?>
         <div class="col-md-6 well">
            <span style="font-size: 30px; font-weight: bold;  text-justify: justify; padding: 5px; color: green; ">
              You have subscribed for a <?php echo $fet['ptitle']; ?> with the amount of rupees <?php echo $fet['pamt']; ?> which will expiry on <?php echo date('d-m-Y',strtotime($fet['enddate'])); ?></span>
          </div>
    
    	  <?php  } elseif($nrow<=0){ 
          ?>
           <div class="col-md-6 well">
            <span style="font-size: 30px; font-weight: bold;  text-justify: justify; padding: 5px; color: red; ">
              Your susbcription has expired, Please subscribe now</span>
              <a href="viewpackage.php" class="btn btn-warning">Package</a>
          </div>
         <?php } ?>
    </div>
</div>

</body>
</html>



