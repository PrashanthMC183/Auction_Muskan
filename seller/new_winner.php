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
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;">Winners List</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Bidder</th>
                        <th>Bidamt</th>
                        <th>Biddate</th>
                        <th>Product</th>
                        <th>Action</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from hostproduct,bid,winnerlist where bid.prod_id=hostproduct.prid and hostproduct.`status`='Expired' and bid.sellerid='$uid' and bid.sellerid=hostproduct.uid and  group by hostproduct.`prid`") or die(mysql_error());
                        while($rw=mysql_fetch_array($sql)) {
                           $prid=$rw['prid'];
                             $st=mysql_query("SELECT * FROM product where pro_id='$prid'");
                            $rws=mysql_fetch_array($st);
                           $sqlw=mysql_query("select MAX(bidamt),bid_id,biddate,uid from bid,winnerlist where prod_id='$prid' and sellerid='$uid' and bid.uid=winnerlist.uid") or die(mysql_error());
                            $row=mysql_fetch_array($sqlw);
                            $amt=$row[0];
                            $bid_id= $row['bid_id'];
                            $date= $row['biddate'];
                            $win_user=$row['uid'];
                            $qr=mysql_query("SELECT * FROM user where user_id='$win_user' group by user_id");
                            $res=mysql_fetch_array($qr);
                            $chk_row=mysql_query("SELECT * FROM winnerlist where uid='$win_user' and `datetime`='$date' and bid_id='$bid_id' and prod_id='$prid'");
                            $num_rows=mysql_num_rows($chk_row);
                            if($num_rows<=0){
                            $ins_win=mysql_query("INSERT INTO `winnerlist`(`win_id`, `uid`, `bid_id`, `prod_id`, `win_amt`, `datetime`, `status`, `pay_status`) VALUES ('','$win_user','$bid_id','$prid','$amt','$date','winner','')");
                            }
                     ?>

                       <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $res['fullname'];?></td>
                         <td><?php echo $amt; ?></td>
                         <td><?php echo $date; ?></td>

                         <td><?php echo $rws['productname']; ?></td>
                         <td><a href="notify.php?user_id=<?php echo $win_user; ?>&&amt=<?php echo $amt; ?>&&prod=<?php echo $rws['productname']; ?>&&bidid=<?php echo $bid_id; ?>&&pid=<?php echo $prid; ?>" class="btn btn-info" title="Notify winner"><i class="fa fa-envelope"></i></a></td>
                     </tr>
                     <?php }  ?>
                </table>
            </div>
        </div>


       

    </div>
</div>
</body>
</html>