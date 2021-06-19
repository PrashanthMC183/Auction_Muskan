<?php  
include('session.php'); ?>
<?php include('connection.php');
    $wid=$_GET['wid'];
    $bid=$_GET['bid'];
    $win_qry=mysql_query("SELECT * FROM winnerlist where win_id='$wid'");
    $sel_win=mysql_fetch_array($win_qry);
    $amt=$sel_win['win_amt'];
    $sq=mysql_query("update winnerlist set pay_status='Debit' where win_id='$wid'") or die(mysql_error());
    if($sq)
    {
        echo '<script>alert("Paying through Debit"); </script>';
    }
    else
    {
        echo '<script>alert("Failed to pay");</script>';
    }

 ?>
?>
<!DOCTYPE HTML>
<HTML lang="en">


<!-- Mirrored from irsfoundation.com/tf/templates/EducationPark/index-layout1.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2017 15:23:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link href="images/apple-icon.png" rel="icon" type="image/png">
    <link href="images/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Efinance Title -->
     <title>Student Home Page</title>

    <!-- css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- php5 shim and Respond.js for IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/php5shiv/3.7.3/php5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <li>Payment </li>
        </ul>
    </div>
</div>

    <section class="irs-account-field">
        <div class="container">
                
                <div class="col-md-12" style="margin-top: 60px;">
                 <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 style="text-align: center;">Payment</h3>
                    </div>
                    <div class="panel-body">
                    <div class="col-md-4"></div>
                        
                        <form action="" method="POST">
                        <div class="col-md-4 well" style="background-color: black; border-radius: 20px;">
                            <h2 style="color: white; font-weight: bold; text-align: left;">Debit Card</h2>
                            <p style="color: white;">Enter your card number</p>
                            <input type="text" name="cardno" pattern="^\d{16}$" placeholder="16 digit card number" class="form-control" oninvalid="setCustomValidity('Please enter only 16 digit number')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
                            <p style="color: white;">Valid upto</p>
                            <input type="text" name="mm" pattern="^[0-9]{1,2}" title="only 16 digits" placeholder="MM" class="form-control" style="width: 65px; float: left;" required /> <input type="text" name="yy" placeholder="YYYY" class="form-control" style="width: 50px; float: left;" required /> 
                            <input type="password" name="cvv" placeholder="CVV" class="form-control pull-right" pattern="^\d{3}$" placeholder="3 digit cvv number" class="form-control" oninvalid="setCustomValidity('Please enter only 3 digit number')"
    onchange="try{setCustomValidity('')}catch(e){}" style="width: 80px;"><br><br>
                            <button type="submit" name="pay" class="btn btn-warning">Pay</button>
                        </div>
                        </form>

                   </div>
                </div>
     
               </div>
        </div>
    </section>
    <?php
        include('connection.php');
        if(isset($_POST['pay'])){
            $cardno=$_POST['cardno'];
            $mm=$_POST['mm'];
            $yy=$_POST['yy'];
             $cvv=$_POST['cvv'];

            $qry_insert=mysql_query("SELECT * FROM `payment` WHERE `cvv`='$cvv' and `card_no`='$cardno' and `exp_month`='$mm' and `exp_year`='$yy' and uid='$uid'") or die(mysql_error());
            $nums=mysql_num_rows($qry_insert);
              if ($nums==1) 
                    {
                        $st=mysql_query("INSERT INTO `bid_payment`(`uid`, `bid_id`, `amount`, `paiddate`, `status`) VALUES ('$uid','$bid','$amt',now(),'paid')");
                        echo "<script>alert('Payment Successfull'); 
                        window.location='buyerpage.php'; 
                        </script>";
                    }
                    else
                    {
                        echo "<script>alert('Failed');</script>";
                    }
        }
    ?>
    <!-- Main slider end -->

    <!-- Welcome start -->
    <!-- Welcome end -->

    <!-- About start -->
    

    <!-- courses start -->
    
    <!-- courses end -->

    <!-- Counter start -->
    
    <!-- Counter end -->

    <!-- Gallery start -->
   
    <!-- Gallery end -->

    <!-- Teachers start -->
    
    <!-- Teachers  end -->

    <!-- Testimonial start -->
    
    <!-- Testimonial end -->

    <!-- Blog start -->
    
    <!-- Blog end -->

    <!-- Newsletter start -->
   
    <!-- Newsletter end -->

    <!-- Footer start -->


    <!-- script start from here -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdownhover.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="js/isotope.js"></script>
    <script type="text/javascript" src="js/stellar.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/jquery.masonry.min.js"></script>
    <script type="text/javascript" src="js/css3-animate-it.js"></script>
    <script type="text/javascript" src="js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="js/jquery.scrollUp.js"></script>
    <script type="text/javascript" src="js/classie.js"></script>

    <!-- Custom script for all pages -->
    <script type="text/javascript" src="js/script.js"></script>

    <!-- Funfact START -->
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.start-count').each(function() {
                var $this = $(this);
                $this.data('target', parseInt($this.php()));
                $this.data('counted', false);
                $this.php('0');
            });

            $(window).bind('scroll', function() {
                var speed = 3000;
                $('.start-count').each(function() {
                    var $this = $(this);
                    if (!$this.data('counted') && $(window).scrollTop() + $(window).height() >= $this.offset().top) {
                        $this.data('counted', true);
                        $this.animate({
                            dummy: 1
                        }, {
                            duration: speed,
                            step: function(now) {
                                var $this = $(this);
                                var val = Math.round($this.data('target') * now);
                                $this.php(val);
                                if (0 < $this.parent('.value').length) {
                                    $this.parent('.value').css('width', val + '%');
                                }
                            }
                        });
                    }
                });
            }).triggerHandler('scroll');
        });
    </script>

</body>


<!-- Mirrored from irsfoundation.com/tf/templates/EducationPark/index-layout1.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2017 15:24:24 GMT -->
</HTML>