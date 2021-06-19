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
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;">Payment mode</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Bidder</th>
                        <th>Product</th>
                        <th>Paid Amount</th>
                        <th>Paid Date</th>
                        <th>Payment</th>

                        <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select DISTINCT uid,productname,win_amt,datetime,pay_status from winnerlist,product where winnerlist.prod_id=product.pro_id and status='winner' group by win_id") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td><?php echo $i++;?></td>
                          <?php $uid=$row['uid']; 
                            $sr1=mysql_query("SELECT * FROM user where user_id='$uid'");
                            $res1=mysql_fetch_array($sr1);
                         ?>
                         <td><?php echo $res1['fullname'];?></td>
                         <td><?php echo $row['productname'];?></td>
                         <td><?php echo $row['win_amt'];?></td>
                         <td><?php echo $row['datetime'];?></td>
                         <td><?php echo $row['pay_status'];?></td>
                    </tr>
                     <?php } ?>
                </table>
            </div>
        </div>


       

    </div>
</div>
</body>
</html>