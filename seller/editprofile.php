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
     <?php include('connection.php');
        $sq=mysql_query("select * from user where user_id='$uid'");
        $row=mysql_fetch_array($sq);
      ?>
    <div class="container">
    <h2 style="font-size: 35px; font-family:argentina; text-align: center;">My Profile</h2>
            <hr>
                    <div class="form-group">
                <div class="row">
                <div class="col-md-1"></div>
                <form action="profileval.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-10 ">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-7" style="margin-left: 50px;">
                            <div class="col-md-2" style="font-weight: bold; color:darkblue;">
                                <h4 style="margin-top: 10px;">Name</h4>
                                <h4 style="margin-top: 35px;">Email</h4>
                                <h4 style="margin-top: 35px;">Contact</h4>
                                <h4 style="margin-top: 35px;">Address</h4>
                                <h4 style="margin-top: 35px;">Image</h4>
                          
                           </div>   
                           <div class="col-md-8" style="font-weight: bold; color:blue;"> 
                                <input type="text" name="name" value="<?php echo $row['fullname']?>" class="form-control" placeholder="Enter your name"><br>
                                <input type="text" name="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email id"><br>
                                <input type="text" name="number" value="<?php echo $row['contact']?>" class="form-control" placeholder="Enter contact number"><br>
                                <input type="text" name="addr" value="<?php echo $row['address']?>" class="form-control" placeholder="Enter address"><br>
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
        
        //echo 'hey';

    $query=mysql_query("UPDATE `user` SET `fullname`='$name',`address`='$address',`contact`='$number',`email`='$email',`photo`='$final_file'  WHERE `user_id`='$uid'")  or die(mysql_error());
    
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
        
        //echo 'hey';

    $query=mysql_query("UPDATE `user` SET `fullname`='$name',`address`='$address',`contact`='$number',`email`='$email'  WHERE `user_id`='$uid'")  or die(mysql_error());
        
        if($query)
        {

            echo '<script>alert("Profile been updated successfully"); window.location="profile.php"; </script>';
        }
        else{
            echo '<script>alert("Updation failed"); window.location="editprofile.php";</script>';
        }
}
?>

                    
   
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>