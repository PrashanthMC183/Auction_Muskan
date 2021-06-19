<?php include('session.php'); 
$u_id=$_GET['uid'];
?>
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
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">Send Message</h4>
					<hr>
					<form action="queryval.php?uid=<?php echo $u_id; ?>" method="post">
                <div class="panel-body" style="text-align: center;">
                    <div class="form-group">
                    	<textarea class="form-control" name="qcontent"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,12}$" title="accepts alphanumeric values letters and digits" rows="5" placeholder="Your reply" required></textarea>
                    	<input type="submit" name="send" class="btn btn-info" value="Send">
                    </div>   			
                </div>
            </form>
			</div>		  
		</div>
		</div>
		</div>

		</body>
</html>
