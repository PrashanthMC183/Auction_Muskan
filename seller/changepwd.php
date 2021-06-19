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

<body style="background-image: url('../images/blue1.jpg'); background-size: cover; ">
<div class="wrapper" >
     <?php include("menu.php"); ?>
    <div class="container">

		
		<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="well login-container" style="margin-top: -2px;">
					<h4 class="text-center">Change Password</h4>
					<hr>
					

					<form name="" method="post" action="" style="margin-left: 300px;">
					<div class="row">
						<div class="form-group col-md-7">
							<label>Current Password</label>
							<input type="password" name="cpwd" placeholder="Enter current password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="setCustomValidity('Please enter current password')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-7">
							<label>New Password</label>
							<input type="password" name="npwd" placeholder="Enter new password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="setCustomValidity('Please enter new password')"
    onchange="try{setCustomValidity('')}catch(e){}" required /> 
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-7">
							<label>Re-enter the new password</label>
							<input type="password" name="rpwd" placeholder="Re-enter new password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninvalid="setCustomValidity('Please Re-enter new password ')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
						</div>	
					</div>
						<p>&nbsp;</p>
						<div class="form-group">
							<input type="submit" name="save" value="Save" class="btn btn-primary">
						</div>
						</form>
			</div>		  
		</div>


</body>
</html>



<?php include('connection.php');
	if(isset($_POST['save']))
	{
		$currentp=$_POST['cpwd'];//names given of the controls  $is user defined name
		$newp=$_POST['npwd'];
		$repwd=$_POST['rpwd'];

		$sql=mysql_query("select * from user where password='$currentp' and user_id='$uid'")or die(mysql_error());
                            $nrows=mysql_num_rows($sql);
                            if($nrows==1)
                            {
                                if($newp==$repwd)
                                {
                                    $qry=mysql_query("update user set password='$newp' where user_id='$uid'") or die(mysql_error());
                                     if($qry)
                                        {
                                            echo '<script>alert("Password been changed"); window.location="home.php"; </script>';
                                        }
                                        else
                                        {
                                            echo '<script>alert("Failed to change the password"); </script>';
                                        }
                                }
                                else{
                                    echo '<script>alert("Password Mismatch"); </script>';
                                }
                            }
                           

                        }

                    ?>
		
