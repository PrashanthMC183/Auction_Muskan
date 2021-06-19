 <?php include('session.php');
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