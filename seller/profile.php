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

<body style="background-image: url('../images/blue2.jpg'); background-size: cover; ">
<div class="wrapper">
     <?php include("menu.php"); ?>
     <?php include('connection.php');
        $sq=mysql_query("select * from user where user_id='$uid'");
        $row=mysql_fetch_array($sq);
      ?>
    <div class="container">
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;color:white;">My Profile</h2>
            <hr>
                <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-10" >
                        <div class="col-md-3">
                            <img src="../user_img/<?php echo $row['photo']; ?>" height="250" width="250" class="img-circle">
                        </div>
                        <div class="col-md-7" style="margin-left: 50px;">
                            <div class="col-md-2" style="font-weight: bold; color:darkblue;">
                                <h4 style="margin-top: 10px;">Name: </h4>
                                <h4 style="margin-top: 10px;">Email: </h4>
                                <h4 style="margin-top: 10px;">Contact: </h4>
                                <h4 style="margin-top: 10px;">Address: </h4>
                                 
                            </div>
                            <div class="col-md-5" style="font-weight: bold; color:blue;">
                                <h4 style="margin-top: 10px;"><?php echo $row['fullname'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['email'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['contact'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['address'];?></h4><br>
                                <a href="editprofile.php" title="Edit Profile" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="home.php" title="Back" class="btn btn-info"><i class="fa fa-reply"></i></a>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>