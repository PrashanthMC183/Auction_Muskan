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
            <h2 class="text-center" style="color:orange;">View Report</h2>
                    <hr>
                    <form name="" method="post" action="" style="margin-left: 50px;">
                    <div class="row">
                        <div class="form-group col-md-4">
                        <h5>Select Month</h5>
                        <select name="month" class="form-control">
                            <option value="">Select one month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>

                        </select>
                        <div class="form-group">
                        <input type="submit" name="search" style="margin-left: 330px;margin-top: -60px;" value="Search"  class="btn btn-warning">
                        </div>
                        </form>
            </div>
            <?php include 'connection.php';
                if(isset($_POST['search']))
                {
                    $month=$_POST['month'];
                 ?>
                 <table class="table table-bordered table-hover" style="border: 1px solid grey;background-color: lightgrey;">
                    <tr>
                        <th style="border: 1px solid grey;">SL.No</th>
                        <th style="border: 1px solid grey;">Seller</th>
                        <th style="border: 1px solid grey;">Bidder</th>
                        <th style="border: 1px solid grey;">Product</th>
                        <th style="border: 1px solid grey;">Winning amount</th>
                        <th style="border: 1px solid grey;">Date</th>
                        <th style="border: 1px solid grey;">Paid through</th>

                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select DISTINCT user_id,uid,productname,win_amt,datetime,pay_status from winnerlist,product where winnerlist.prod_id=product.pro_id and status='winner' and month(datetime)='$month' group by win_id") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td style="border: 1px solid grey;"><?php echo $i++;?></td>
                         <?php $sellerid=$row['user_id']; 
                            $sr=mysql_query("SELECT * FROM user where user_id='$sellerid'");
                            $res=mysql_fetch_array($sr);
                         ?>
                         <td style="border: 1px solid grey;"><?php echo $res['fullname']; ?></td>
                          <?php $uid=$row['uid']; 
                            $sr1=mysql_query("SELECT * FROM user where user_id='$uid'");
                            $res1=mysql_fetch_array($sr1);
                         ?>
                         <td style="border: 1px solid grey;"><?php echo $res1['fullname'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['productname'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['win_amt'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['datetime'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['pay_status'];?></td>
                    </tr>
                     <?php } ?>
                </table>
           <?php  } else{
             ?>
        <table class="table table-bordered table-hover" style="border: 1px solid grey;" >
                    <tr>
                        <th style="border: 1px solid grey;">SL.No</th>
                        <th style="border: 1px solid grey;">Seller</th>
                        <th style="border: 1px solid grey;">Bidder</th>
                        <th style="border: 1px solid grey;">Product</th>
                        <th style="border: 1px solid grey;">Winning amount</th>
                        <th style="border: 1px solid grey;">Date</th>
                        <th style="border: 1px solid grey;">Paid through</th>

                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select DISTINCT user_id,uid,productname,win_amt,datetime,pay_status from winnerlist,product where winnerlist.prod_id=product.pro_id and status='winner' group by win_id") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td style="border: 1px solid grey;"><?php echo $i++;?></td>
                         <?php $sellerid=$row['user_id']; 
                            $sr=mysql_query("SELECT * FROM user where user_id='$sellerid'");
                            $res=mysql_fetch_array($sr);
                         ?>
                         <td style="border: 1px solid grey;"><?php echo $res['fullname']; ?></td>
                          <?php $uid=$row['uid']; 
                            $sr1=mysql_query("SELECT * FROM user where user_id='$uid'");
                            $res1=mysql_fetch_array($sr1);
                         ?>
                         <td style="border: 1px solid grey;"><?php echo $res1['fullname'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['productname'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['win_amt'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['datetime'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['pay_status'];?></td>
                    </tr>
                     <?php } ?>
                </table>
                <?php } ?>
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
