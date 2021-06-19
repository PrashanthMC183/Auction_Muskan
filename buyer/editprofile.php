<?php include('session.php'); ?>
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
			<li> Edit Profile</li>
		</ul>
	</div>
</div>
     
    
     
     <?php include('connection.php');
        $sq=mysql_query("select * from user where user_id='$uid'");
        $row=mysql_fetch_array($sq);
      ?>
    <div class="container">
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;margin-top: 10px;">Your Info</h2>
            <hr>
                    <div class="form-group">
                <div class="row">
                <div class="col-md-1"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-10 well ">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-7" style="margin-left: 50px;">
                            <div class="col-md-2" style="font-weight: bold; color:darkblue;">
                                <h4 style="margin-top: 10px;">Name</h4>
                                <h4 style="margin-top: 35px;">Email</h4>
                                <h4 style="margin-top: 35px;">Contact</h4>
                                <h4 style="margin-top: 35px;">Address</h4>
                                <h4 style="margin-top: 35px;">Gender</h4>
                                <h4 style="margin-top: 35px;">Image</h4>
                          
                           </div>   
                           <div class="col-md-8" style="font-weight: bold; color:blue;"> 
                                <input type="text" name="name" value="<?php echo $row['fullname']?>" class="form-control" placeholder="Enter your name"><br>
                                <input type="text" name="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email id"><br>
                                <input type="text" name="number" value="<?php echo $row['contact']?>" class="form-control" placeholder="Enter contact number"><br>
                                <input type="text" name="addr" value="<?php echo $row['address']?>" class="form-control" placeholder="Enter address"><br>
                                            <select name="type" class="form-control">
                                                <option value="">Select type</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select><br>
                                <input type="file" name="img" class="form-control" ><br>
                                <input type="submit" name="save" value="Save"  class="btn btn-primary" > 
                            </div>

                            </div>

                        </div>
                        </form>
                    </div>
                    </div>
                    
 <?php 
       include('connection.php');

    if(isset($_POST['save']))
    {
       if(isset($_FILES['img']['name']))
    {
     $file = rand(1000,100000)."-".$_FILES['img']['name'];
         $file_loc = $_FILES['img']['tmp_name'];
         $file_size = $_FILES['img']['size'];
         $file_type = $_FILES['img']['type'];
         $folder="../user_img/";
         // new file size in KB
         $new_size = $file_size/2048;  
         // new file size in KB
                                                        
         // make file name in lower case
         $new_file_name = strtolower($file);
         // make file name in lower case
                                                        
         $final_file=str_replace(' ','-',$new_file_name);
                                                        
         if(move_uploaded_file($file_loc,$folder.$final_file))
         {// Start of if image file upload successful
    $name=$_POST['name'];//names given of the controls  $is user defined name
        $email=$_POST['email'];
        $number=$_POST['number'];
        $address=$_POST['addr'];
        $gender=$_POST['type'];
        
        //echo 'hey';

    $query=mysql_query("UPDATE `user` SET `fullname`='$name',`address`='$address',`contact`='$number',`email`='$email',`gender`='$gender',`photo`='$final_file'  WHERE `user_id`='$uid'")  or die(mysql_error());
    
    if($query)
    {

      echo '<script>alert("Profile been updated successfully"); window.location="profile.php";</script>';
    }
    else{
      echo '<script>alert("Updation failed");window.location="editprofile.php"; </script>';
    }
}
}
        $name=$_POST['name'];//names given of the controls  $is user defined name
        $email=$_POST['email'];
        $number=$_POST['number'];
        $address=$_POST['addr'];
        $gender=$_POST['type'];
        
        //echo 'hey';

    $query=mysql_query("UPDATE `user` SET `fullname`='$name',`address`='$address',`contact`='$number',`email`='$email',`gender`='$gender'  WHERE `user_id`='$uid'")  or die(mysql_error());
        
        if($query)
        {

            echo '<script>alert("Profile been updated successfully"); window.location="profile.php"; </script>';
        }
        else{
            echo '<script>alert("Updation failed"); window.location="editprofile.php";</script>';
        }
}
?>

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
                                            echo '<script>alert("Password been changed"); window.location="profile.php"; </script>';
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

<!-- //footer -->

<!-- js-scripts -->		
<!-- js -->
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

</body>
</html>