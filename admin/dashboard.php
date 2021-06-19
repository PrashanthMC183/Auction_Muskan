<?php include('session.php');?> 

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>



    <?php include('sidebar.php'); ?>    

    <div class="main-panel">
        <?php include('header.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
               <div class="well home-container" style="background-color: #bdbdbd75";>
        
            <div class="row">
                <div class="col-md-4 box">
                    <div class="well mybox">
                    <h4 class="text-center"><a href="user_display.php">Total Users<span class="badge"><?php include('connection.php'); 
                        $sq=mysql_query("SELECT COUNT(*) FROM user");
                        $rc=mysql_fetch_array($sq);
                        echo $rc[0];
                    ?></a></span></h4>
                        <div class="col-md-4"></div>
                        <i class="fa fa-users fa-5x"></i>
                    </div>
              </div>

               <div class="col-md-4 box">
                    <div class="well mybox">
                    <h4 class="text-center"><a href="accepthost.php">Total Products<span class="badge"><?php include('connection.php'); 
                        $sq=mysql_query("SELECT COUNT(*) FROM hostproduct");
                        $rc=mysql_fetch_array($sq);
                        echo $rc[0];
                    ?></a></span></h4>
                        <div class="col-md-5"></div>
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
              </div> 

              <div class="col-md-4 box">
                    <div class="well mybox">
                    <h4 class="text-center"><a href="winner.php">Total Winners<span class="badge"><?php include('connection.php'); 
                        $sq=mysql_query("SELECT COUNT(*) FROM winnerlist where status='winner'");
                        $rc=mysql_fetch_array($sq);
                        echo $rc[0];
                    ?></a></span></h4>
                        <div class="col-md-5"></div>
                        <i class="fa fa-user fa-5x"></i>
                    </div>
              </div> 
  

              </div>
              </div>
        
                </div>
            </div>
        </div>


        
    </div>


</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>



</html>
