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
        <br><br>
        <div class="col-md-2"></div>
            <div class="col-md-8">
            
            <h2 style="font-size: 35px; font-family:argentina; text-align: center;color:white;">View Products</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>SL.No</th>
                        <th>Products</th>
                        <th>Host Date</th>
                        <th>Till Date</th>
                        <th>Request Date</th>
                        <th>Status</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from hostproduct,product where product.pro_id=hostproduct.prid and hostproduct.uid='$uid'") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $row['productname']; ?></td>
                         <td><?php echo $row['hoston'];?></td>
                         <td><?php echo $row['tilldate'];?></td>
                         <td><?php echo $row['reqdate'];?></td>
                         <td><?php echo $row['status'];?></td>
                     </tr>
                     <?php } ?>
                </table>
            </div>
        </div>


</body>
</html>
