<?php
  
  // code to declare the winner and change the product status to ended
include 'session.php';
include 'connection.php';

    $pid=$_GET['pro_id'];
    $rid=$_GET['rid'];
    

?>
 
<!DOCTYPE html>
<html lang="zxx">
<head>

<title>Auction System</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Field web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Athiti:200,300,400,500,600,700&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
</head>
<body> 
<div class="header">
            <div class="logo">
                <h1 style="margin-top:-10px;"><a href="buyerpage.php"><span>E</span><font color="black">lectronic<label>Bid</label></a></h1>
            </div>  
            <div class="clearfix"> </div>
        </div>

		
<div class="services-breadcrumb" style="background-color: orange;">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="buyerpage.php" style="color:red;">Home</a><i>||</i></li>
			<li>Product</li>
		</ul>
	</div>
</div>
     
    
     
     <?php include('connection.php');
        $sq=mysql_query("select * from product,category,subcategory where product.`pro_id`='$pid' and subcategory.subcid=product.subc_id and category.cid=subcategory.cid");
        $row=mysql_fetch_array($sq);
        $sql=mysql_query("select * from hostproduct where status='Hosted' and prid='$pid'");
        $red=mysql_fetch_array($sql);
        $user_id=$red['uid'];
      ?>
    <div class="container">
    <div style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-10 well" >
                        <div class="col-md-3">
                            <img src="../seller/photos/<?php echo $row['photo']; ?>" height="250" width="250" >
                        </div>
                        <form action="" method="post">
                        <div class="col-md-7" style="margin-left: 50px;">
                            <div class="col-md-3" style="font-weight: bold; color:darkblue;">
                                <h4 style="margin-top: 10px;">Product_Name: </h4>
                                <h4 style="margin-top: 10px;">Category: </h4>
                                <h4 style="margin-top: 10px;">Sub-category: </h4>
                                <h4 style="margin-top: 10px;">Description: </h4>
                                <h4 style="margin-top: 50px;">Min_Range: </h4>
                                <h4 style="margin-top: 75px;">Bid Amount: </h4>
                                 
                            </div>
                            <div class="col-md-9" style="font-weight: bold; color:blue;">
                                <h4 style="margin-top: 10px;"><?php echo $row['productname'];?></h4>
                                <h4 style="margin-top: 10px;"><?php echo $row['cname'];?></h4>
                                <h4 style="margin-top: 14px;"><?php echo $row['subcategory'];?></h4>
                                <h4 style="margin-top: 24px;"><?php echo $row['desc'];?></h4>
                                <h4 style="margin-top: 50px;"><?php $mr=$row['min_range']; 
                                $query=mysql_query("SELECT MAX(bidamt) FROM bid where prod_id='$pid'");
                                $read=mysql_fetch_array($query); $amt=$read[0];
                                if($mr<$amt)
                                {
                                    echo $amt;
                                }
                                else if($mr>=$amt)
                                {
                                    echo $mr;
                                }
                                ?></h4><br>
                                <h4 style="color: red; font-weight: bold;" id="demo<?php echo $pid; ?>"></h4>
                                <br>
                                <input type="text" name="bidamt" placeholder="Bid Amount" class="form-control" style="width: 105px; margin-bottom: 20px;"><br>
                                <button class="btn btn-warning" type="submit" name="bid">BID</button> 
                                
                               <button type="button" onclick="showForm(<?php echo $red['uid']; ?>)" title="Comment" class="btn btn-primary"><i class="fa fa-comment"></i></button>
                            <a href="message.php?sellerid=<?php echo $red['uid']; ?>" title="Message" class="btn btn-info"><i class="fa fa-envelope"></i></a>
                            <a href="product.php" title="Back" class="btn btn-danger"><i class="fa fa-reply"></i></a>
 

                            </div>
                            
                        </div>

                        </form>
                        <?php
    if(isset($_POST['bid']))
    {
        $sql=mysql_query("select * from hostproduct where status='Hosted' and prid='$pid'");
        $read=mysql_fetch_array($sql);
        $user_id=$read['uid'];
        $pro_name=$row['productname'];
        $cat=$row['cname'];
        $sub_cat=$row['subcategory'];
        $desc=$row['desc'];
        $minimum_r=$_POST['bidamt'];
        
        //echo 'hey';

    $query=mysql_query("INSERT INTO `bid`(`uid`,`reqid`, `sellerid`, `prod_id`, `biddate`, `bidamt`, `status`) VALUES ('$uid','$rid','$user_id','$pid',now(),'$minimum_r','bid')")  or die(mysql_error());
        
        if($query)
        {

            echo '<script>alert("Product has successfully Bid..!!"); window.location="product.php";</script>';
        }
        else{
            echo '<script>alert("Failed to bid!!"); </script>';
        }
}
//echo 'no';
?>

                    </div>
                </div>
                <div class="row">
                <?php include('connection.php');
                    $sql=mysql_query("SELECT * FROM comment where sellerid='$user_id'");
                    while($res=mysql_fetch_array($sql))
                    {
                        $u_id=$res['uid'];
                        $qr=mysql_query("select * from user where user_id='$u_id'");
                        $reslt=mysql_fetch_array($qr);
                 ?>
                    <div class="col-md-10 well" style="background-color: white;">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="../user_img/<?php echo $reslt['photo']; ?>" height="50" width="50" class="img-circle">
                        </div>
                        <div class="col-md-1.5">
                            <h4 style="color:black;"><?php echo $reslt['fullname']; ?></h4>
                        </div>
                        <div class="col-md-2">
                            <h5 style="color: red;"><?php echo $res['datetime']; ?></h5>
                        </div>
                        
                    </div>
                    <hr style="border:1px solid orange;">
                        <div style="border-radius: 10px; width: 400px; padding: 8px;"><?php echo $res['comment'];  ?></div>
                            
                    </div>
                    <?php } ?>
                </div>
                
            </div>
            <div class="row" id="myform">
                    
                </div>
        </div>
    </div>
</div>


<?php include('footer.php');?>
<!-- //footer -->

<!-- js-scripts -->		
<!-- js -->
<script type="text/javascript">
            function createCountDown(elementId, date) {
            // Set the date we're counting down to
            var countDownDate = new Date(date).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now an the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Display the result in the element with id="demo"
              document.getElementById(elementId).innerHTML = days + "d " + hours + "h "
              + minutes + "m " + seconds + "s ";

              // If the count down is finished, write some text 
              if (distance < 0) {
                clearInterval(x);
                document.getElementById(elementId).innerHTML = "Product EXPIRED";
              }
            }, 1000);
        }

        // createCountDown('demo1', "2019-07-26 18:00:00")
        // createCountDown('demo2', "2018-02-13 14:00:00")
        // createCountDown('demo3', "2017-07-27 10:04:30")
        // createCountDown('demo4', "2017-07-28 20:10:50")
        </script>
        
        <?php
     
            $i=1;
            $qry_select=mysql_query("SELECT * FROM `hostproduct` where status='Hosted' and prid='$pid'");

            $row= mysql_fetch_array($qry_select);
            
                $time=date('M',strtotime($row['tilldate'])).' '.date('d',strtotime($row['tilldate'])).', '.date('Y',strtotime($row['tilldate'])).' '.date('H:i',strtotime($row['tilldate']));
                $prid=$row['prid'];
        ?>
            <script type="text/javascript">
                createCountDown('demo<?php echo $prid ?>', "<?php echo $time ?>");
            </script>
       
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js -->
<!-- menu-js --> 	
<script src="js/modernizr.js"></script> <!-- Modernizr -->	
<script src="js/menu.js"></script> <!-- Resource jQuery -->	
<!-- //menu-js --> 	 
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<script>
        function showForm(str) 
            {
               
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                   // alert(this.responseText);
                  document.getElementById("myform").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","getform.php?q="+str,true);
              xmlhttp.send();
            }
    </script>

</body>
</html>
<?php include('connection.php');
    if(isset($_POST['Send']))
    {
        $comment=$_POST['comment'];
        
        $sql=mysql_query("INSERT INTO `comment`(`uid`, `sellerid`, `comment`, `datetime`, `status`) VALUES ('$uid','$user_id','$comment',now(),'sent')")or die(mysql_error());
                      if($sql)
                            {
                                echo '<script>alert("Comment been sent..!!"); </script>';
                            }
                            else
                            {
                                echo '<script>alert("Failed to send the comment..!!"); </script>';
                            }

                        }

                    ?>