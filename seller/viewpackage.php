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
      <?php include('connection.php');
        $sql=mysql_query("select * from subscription where uid='$uid'");
        $nrow=mysql_num_rows($sql); $fet=mysql_fetch_array($sql);
        if($nrow>0){ ?>
         <div class="col-md-6 well">
            <span style="font-size: 30px; font-weight: bold;  text-justify: justify; padding: 5px; color: green; ">
              You have already subscribed for a package which will expiry on <br> <?php echo date('d-m-Y',strtotime($fet['enddate'])); ?></span>
          </div>
    
    	  <?php  } else { include('connection.php');
           $sql=mysql_query("select * from package") or die(mysql_error());
              while($row=mysql_fetch_array($sql)) {
          ?>
          	<div class="well col-md-3" style="margin-left: 6px; text-align: center; background-color: pink;">
          		<div class="panel panel-success">
          			<div class="panel-heading">
          				<h3 style="color: blue; text-transform: capitalize; font-weight: bold; text-align: center;"><?php echo $row['ptitle']; ?></h3>
          			</div>
          			<div class="panel-body">
          				<h4>Validity: <?php echo $row['pvalidity']. ' months'; ?></h4>
          				<h4>Amount: <?php echo $row['pamt']. ' Rs'; ?></h4>
          				<a href="subscribe.php?pid=<?php echo $row['pid'];?>" class="btn btn-warning">Subscribe</a>
          			</div>
          		</div>
          	</div>
         <?php } }?>
    </div>
</div>

</body>
</html>



