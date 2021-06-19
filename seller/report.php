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
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-show-password.min.js"></script>
</head>

<body style="background-image: url('../images/blue2.jpg');">
<div class="wrapper">
     <?php include("menu.php"); ?>
    <div class="container">

		
		<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">View Report</h4>
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
                        
                        <input type="submit" name="search" style="margin-left: 260px;margin-top: -58px;" value="Search"  class="btn btn-warning">
                        </div>
                        </form>
            </div>
            <?php include 'connection.php';
                if(isset($_POST['search']))
                {
                    $month=$_POST['month'];
                 ?>
                 <table class="table table-bordered" style="border: 1px solid grey;" >
                    <tr>
                        <th style="border: 1px solid grey;">SL.No</th>
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
        <table class="table table-bordered " style="border: 1px solid grey;" >
                    <tr>
                        <th style="border: 1px solid grey;">SL.No</th>
                        <th style="border: 1px solid grey;">Bidder</th>
                        <th style="border: 1px solid grey;">Product</th>
                        <th style="border: 1px solid grey;">Winning amount</th>
                        <th style="border: 1px solid grey;">Date</th>
                        <th style="border: 1px solid grey;">Paid through</th>

                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select DISTINCT user_id,uid,productname,win_amt,datetime,pay_status from winnerlist,product where winnerlist.prod_id=product.pro_id and status='winner' and user_id='$uid' group by win_id ") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td style="border: 1px solid grey;"><?php echo $i++;?></td>
                         
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


</body>
</html>



