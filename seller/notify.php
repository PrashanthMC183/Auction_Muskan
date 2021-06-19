<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include('session.php');
include('connection.php');
$user_id=$_GET['user_id'];
$bid=$_GET['bidid'];
$pname=$_GET['prod'];
$pid=$_GET['pid'];
$amt=$_GET['amt'];
$sel_win=mysql_query("SELECT * FROM winnerlist where bid_id='$bid' and win_amt='$amt' and prod_id='$pid' and uid='$user_id' order by win_id desc limit 1");
$rest=mysql_fetch_array($sel_win);
$wid=$rest['win_id'];
 include('connection.php');
 require('textlocal.class.php');

$textlocal = new Textlocal('amalvv248@gmail.com', 'amalvv248A');
$st=mysql_query("SELECT * FROM user where user_id='$user_id'");
$read=mysql_fetch_array($st);
$cont= $read['contact'];
$numbers = array($cont);
$sender = 'TXTLCL';
$message = 'You have won the product: '.$pname. ' for Rs.' .$amt. '. Please proceed with the payment procedures';

try {
  $result = $textlocal->sendSms($numbers, $message, $sender);
   print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
 }
$qr=mysql_query("INSERT INTO `notification`(`nid`, `user_id`,`sellerid`,`bid_id`,`win_id`,`notification`, `date`, `status`) VALUES ('','$user_id','$uid','$bid','$wid','You have win the product: ".$pname. " for Rs." .$amt. ". Please proceed with the payment procedures',now(),'sent')") or die(mysql_error());
if($qr)
{
	echo '<script>alert("Notified"); window.location="winner.php";</script>';
}

 ?>
