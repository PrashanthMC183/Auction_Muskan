<?php include('session.php'); 
$subid=$_GET['subid'];
include 'connection.php';
$chk_sub=mysql_query("SELECT * FROM subscription,package where sub_id='$subid' and subscription.pid=package.pid");
$fet=mysql_fetch_array($chk_sub);
$amt=$fet['pamt'];
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

<body style="background-image: url('../images/blue2.jpg');">
<div class="wrapper">
     <?php include("menu.php"); ?>
    <div class="container">
		
		<div class="col-md-4"></div>
		<form action="" method="post">
			<div class="col-md-4 well" style="background-color: black; color: white; font-weight: bold; ">
			  <div class="form-group">
				<label>Card Number</label>
				<input type="text" name="cardno" class="form-control" placeholder="Enter 16 digit number" pattern="[0-9]+" title="Only Numbers" pattern="^\d{16}$" placeholder="16 digit card number" class="form-control" oninvalid="setCustomValidity('Please enter only 16 digit number')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
			   </div>
			   		<div class="form-group">
			   			<label>Holder Name</label>
			   			<input type="text" name="hname" class="form-control" placeholder="Holder Name" pattern="[A-Za-z\s]+" title="letters only" oninvalid="setCustomValidity('Please enter holders name')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
			   		</div>
			   		
			   		<div class="row">
                    <div class="from-group col-md-6">
                    <h5>Expiry mm</h5>
                    <select name="expm" class="form-control" title="Please select the month" required />
                     	<option value="">Select month</option>
                        <option value="01">January</option>
                        <option value="02">february</option>
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
                    </div>
                    <div class="from-group col-md-6">
                    <h5>Expiry yy</h5>
                    <select name="expy" class="form-control" title="Please select the Year" required />
                     	<option value="">Select Year</option>
                     	<option value="2018">2018</option>
                     	<option value="2019">2019</option>
                     	<option value="2020">2020</option>
                     	<option value="2021">2021</option>
                     	<option value="2022">2022</option>
                     	<option value="2023">2023</option>
                     	<option value="2024">2024</option>
                     	<option value="2025">2025</option>
                     	<option value="2026">2026</option>
                     	<option value="2027">2027</option>
                     	<option value="2028">2028</option>
                     	<option value="2029">2029</option>
                     	<option value="2030">2030</option>
                    </select>
                    </div>
                    </div>

                <div class="form-group">
				<label>Cvv Number</label>
				<input type="password" name="pwd" class="form-control" placeholder="Enter 3 digit CVV number" pattern="^\d{3}$" placeholder="3 digit cvv number" class="form-control" oninvalid="setCustomValidity('Please enter only 3 digit number')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
			   </div>
			   <input type="submit" name="save" class="btn btn-info" value="Pay">
			</div>
		</form>
		</div>
		</div>
		</body>
</html>
<?php include 'connection.php';
	if(isset($_POST['save']))
	{
		$card_no=$_POST['cardno'];
		$holder_name=$_POST['hname'];
		$expmonth=$_POST['expm'];
		$expyear=$_POST['expy'];
		$cvvpwd=$_POST['pwd'];
		
		//echo 'hey';

	$query=mysql_query("SELECT * FROM `payment` WHERE `cvv`='$cvvpwd' and `card_no`='$card_no' and `hname`='$holder_name' and `exp_month`='$expmonth' and `exp_year`='$expyear'")  or die(mysql_error());
		$nrows=mysql_num_rows($query);


		if($nrows==1)
		{
            $ins_row=mysql_query("INSERT INTO `sub_payment`(`sellerid`, `subid`, `amount`, `paiddate`) VALUES ('$uid','$subid','$amt',now())");
			echo '<script>alert("Subscription been done successfully"); window.location="home.php";</script>';
		}
		else{
			echo '<script>alert("Failed to subscribe"); </script>';
		}
}
//echo 'no';
?>