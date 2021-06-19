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
		
		<div class="col-md-4"></div>

			<div class="col-md-4">
				
					<h4 class="text-center">Report</h4>
					<hr>
					<div class="row">
					<div class="well login-container" style="margin-top: -2px;">
					<form name="" method="post" action="" enctype="multipart/form-data">
					
					
						<div class="form-group">
							<label>From date</label>
							<input type="datetime-local" name="hostdate" class="form-control" required> 
						</div>
				
						<div class="form-group">
							<label>To date</label>
							<input type="datetime-local" name="tilldate" class="form-control" required> 
						</div>
					
					
						<div class="form-group">
							<input type="submit" name="Request" value="Save" class="btn btn-primary btn-block">
						</div>
					
						</form>
						</div>
			</div>		  
		</div>
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
                        $sql=mysql_query("select * from bid") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td><?php echo $i++;?></td>
                         <td><?php echo $row['cname']; ?></td>
                         <td><a href="updatecategory.php?cid=<?php echo $row['cid']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> <a href="delcategory.php?cid=<?php echo $row['cid']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                     </tr>
                     <?php } ?>
                </table>
		</div>
		</div>

		</body>
</html>
