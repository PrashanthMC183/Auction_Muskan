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
		
			<div class="row col-md-12">
				<div class="row well login-container" style="margin-top: -2px; background-color:#bdbdbda3; color: black; ">
					<h4 class="text-center">My messages</h4>
					<hr>
					<?php include('connection.php');  $cdate=date('Y-m-d');
        
        $sender_qry=mysql_query("select DISTINCT uid,sellerid,qcontent,qdate,status from query where `sellerid`='$uid' and Date(qdate)='$cdate' order by `qdate` asc ") or die(mysql_error());
          while($sender=mysql_fetch_array($sender_qry)) { $u_id=$sender['uid']; ?>
          <div class="col-md-12">
        <?php  if($sender['status']=='buyer_sent')
          {
    ?>		<br>
	    	<div class="col-md-6 pull-left">
	    	  <div class="col-md-2">
	    	  	<?php $stud=mysql_query("select * from user where user_id='$u_id'");
	    	  		$read=mysql_fetch_array($stud);
	    	  	 ?>
	    		<img src="../user_img/<?php echo $read['photo']; ?>" class="img-circle" height="50" width="50">
	    	  </div>
	    	  <div class="col-md-6">
	    	  	<h5 style="color: blue; text-transform: capitalize; font-weight: bold;"><?php echo $read['fullname']; ?></h5>
	    		<div style="border: 2px solid black; border-radius: 8px; padding: 8px; "><?php echo $sender['qcontent']; ?></div>
	    		<h5 style="color: green; "><?php echo $sender['qdate']; ?></h5>
	    		<a href="sendmessage.php?uid=<?php echo $u_id; ?>" style="margin-top: 30px;" class="btn btn-info">Reply</a>
	    	  </div>
			</div>
        
        <?php }  if($sender['status']=='seller_sent')
          {
    ?>		<br>
	    	<div class="col-md-6 pull-right">
	    	  <div class="col-md-2">
	    	  	<?php $sr=mysql_query("select * from user where user_id='$uid'");
	    	  		$rw=mysql_fetch_array($sr);
	    	  	 ?>
	    		<img src="../user_img/<?php echo $rw['photo']; ?>" class="img-circle" height="50" width="50">
	    	  </div>
	    	  <div class="col-md-6">
	    	  	<h5 style="color: blue; text-transform: capitalize; font-weight: bold;">Replied to: <?php $u_id=$sender['uid']; $ss=mysql_query("select * from user where user_id='$u_id'");
	    	  		$red=mysql_fetch_array($ss); echo $red['fullname']; ?></h5>
	    		<div style="border: 2px solid black; border-radius: 8px; padding: 8px; "><?php echo $sender['qcontent']; ?></div>
	    		<h5 style="color: red; "><?php echo $sender['qdate']; ?></h5>
	    	  </div>
			</div>
        
        <?php } ?>
    	</div>
        <?php } ?> 
			</div>		  
		</div>
		</div>
		</div>

		</body>
</html>
