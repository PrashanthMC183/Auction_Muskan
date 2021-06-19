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

        
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="well login-container" style="margin-top: -2px;">
                    <h4 class="text-center">Product Delivery</h4>
                    <hr>
                    

                    <form name="" method="post" action="" style="margin-left: 200px;">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label>Enter your Message</label>
                            <textarea type="text" name="deliver_msg" placeholder="Message" class="form-control"></textarea>
                        </div>

                        </div>
                    <button  class="btn btn-info" name="send" >Send SMS</button>
                    </div>
                </form>
                    
    </div>
</div>

<?php include('connection.php');
    if(isset($_POST['send']))
    {
        $msg=$_POST['deliver_msg'];
    $user_id=$_GET['user_id'];

 
 require('textlocal.class.php');

$textlocal = new Textlocal('amalvv248@gmail.com', 'amalvv248A');
$st=mysql_query("SELECT * FROM user where user_id='$user_id'");
$read=mysql_fetch_array($st);
$cont= $read['contact'];
$numbers = array($cont);
$sender = 'TXTLCL';
$message = $msg;

try {
  $result = $textlocal->sendSms($numbers, $message, $sender);
   print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
 }
 echo '<script>alert("Message has sent"); window.location="home.php";</script>';
}
 ?>
 </body>
</html>