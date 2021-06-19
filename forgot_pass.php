<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Auction system</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Field web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/tab.css">
<link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Athiti:200,300,400,500,600,700&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</head>
<body > 
<!-- banner-2 -->
<div class="main-agile">
	<div class="banner-w3l-2">
		<!-- header -->
		<?php include('menulist.php');?>
		<!-- //top-nav -->
	</div>
</div>
<!-- //banner-2 -->	
<!-- w3_short -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
	   <ul class="w3_short">
			<li><a href="index.php">Home</a><i>||</i></li>
			<li>Get Password</li>
		</ul>
	</div>
</div>
<!-- //w3_short -->
<!-- blog -->
   
   
<div class="wrapper"  style="background-image: url('images/orange2.jpg');">
<div class="container">
    <br>
    <div class="row">

                    
    <div class="col-md-2"></div>
    	<div class="col-md-8 box">

  <h3 style="text-align: center;">Forgot Password</h3><hr>
  <form action="" method="post" style="width: 50%; margin-left: 150px;">
        <div class="from-group">
            
            <input type="text" name="phone_no" placeholder="Enter phone number" class="form-control">
        </div><br>
        <input type="submit" name="send" value="Send" class="btn btn-info btn-block">
</form>
                                   
                                   
</div>


</div>



 
        </div>
	</div>
</div>
<br/><br>

<!-- //blog -->


<!-- footer -->

<!-- //footer -->
<script>
            function openPage(evt, pageName) 
            {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace("active", "");
                }
                document.getElementById(pageName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
        </script>
<!-- js-scripts -->		
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js -->
<!-- menu-js --> 	
<script src="js/modernizr.js"></script> <!-- Modernizr -->	
<script src="js/menu.js"></script> <!-- Resource jQuery -->	
<!-- //menu-js --> 	 
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- //js-scripts -->

</body>
</html>
<?php
    include "connection.php";
    if(isset($_POST['send'])){
        $pno=$_POST['phone_no'];
            
        $sql = mysql_query("SELECT * FROM user where contact='$pno'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        //$pno=$row['phonenumber'];
        $pass=$row['password'];
        if($sql == true)
        {
            require('textlocal.class.php');

            $textlocal = new Textlocal('amalvv248@gmail.com', 'amalvv248A');

            $numbers = array($pno);
            $sender = 'TXTLCL';
            $message = 'Phone number matched!! Your password is ' .$pass;

            try {
                $result = $textlocal->sendSms($numbers, $message, $sender);
                print_r($result);
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }


            echo"
            <script>
            alert('Message Sent....');
            window.location='account.php';
            </script>
            ";
        }
            
    }   
?>