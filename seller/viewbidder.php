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
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;">View Bidders</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Bidder</th>
                        <th>Product</th>
                        <th>Bid Amount</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Image</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from bid,user where user.user_type='buyer' and bid.uid=user.user_id and bid.sellerid='$uid' group by bid_id") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                            $prod_id=$row['prod_id'];
                     ?>
                     <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $row['fullname']; ?></td>
                         <?php $str=mysql_query("SELECT * FROM product where pro_id='$prod_id'");
                         $read=mysql_fetch_array($str); 
                         ?>
                         <td><?php echo $read['productname']; ?></td>
                         <td><?php echo $row['bidamt']; ?></td>
                         <td><?php echo $row['contact']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <td><?php echo $row['address']; ?></td>
                         <td><img src="../user_img/<?php echo $row['photo']; ?>" height="70" width="70" class="img-circle"></td>
                     </tr>
                     <?php } ?>
                </table>
            </div>
        </div>


       

    </div>
</div>
</body>
</html>