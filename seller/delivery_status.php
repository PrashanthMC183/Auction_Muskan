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

<body>
<div class="wrapper" style="background-image: url('../images/blue2.jpg');">
     <?php include("menu.php"); ?>
    <div class="container">
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;">Delivery status</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Bidder</th>
                        <th>Bid Amount</th>
                        <th>Bid Date & Time</th>
                        <th>Product</th>
                        <th>Action</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from hostproduct,bid where bid.prod_id=hostproduct.prid and hostproduct.`status`='Expired' and hostproduct.uid='$uid' group by hostproduct.`reqid`") or die(mysql_error());
                        while($rw=mysql_fetch_array($sql)) {
                            $prid=$rw['prid'];
                            $bid_id=$rw['bid_id'];
                            $st=mysql_query("SELECT * FROM product where pro_id='$prid'");
                            $rws=mysql_fetch_array($st);
                           $sql=mysql_query("select MAX(win_amt),win_id from winnerlist where prod_id='$prid' and bid_id='$bid_id'") or die(mysql_error());
                            $row=mysql_fetch_array($sql);
                            $amt=$row[0];
                            $win_id= $row['win_id'];
                            $up_winner=mysql_query("UPDATE winnerlist SET status='winner' where win_id='$win_id'");
                            
                            $sel_win=mysql_query("SELECT uid,win_amt,`datetime`,bid_id FROM winnerlist where win_id='$win_id' and status='winner'");
                            $get_win=mysql_fetch_array($sel_win);
                            $win_user= $get_win['uid'];
                            $amt=$get_win['win_amt'];
                            $date=$get_win['datetime'];
                            $bid=$get_win['bid_id'];
                            $qr=mysql_query("SELECT * FROM user where user_id='$win_user'");
                            $res=mysql_fetch_array($qr);
                           
                     ?>

                       <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $res['fullname'];?></td>
                         <td><?php echo $amt; ?></td>
                         <td><?php echo $date; ?></td>

                         <td><?php echo $rws['productname']; ?></td>
                         <td><a href="deliver1.php?user_id=<?php echo $win_user;?>" class="btn btn-primary">Delivery Status</a></td>
                     </tr>
                     <?php }  ?>
                </table>
            </div>
        </div>
                
    </div>
</div>
</body>
</html>