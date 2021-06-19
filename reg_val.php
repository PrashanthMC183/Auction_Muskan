 <?php 
                                                    include('connection.php');
                                                    if(isset($_POST['save']))
                                                    {
                                                         //Image storing code
                                                        $file = rand(1000,100000)."-".$_FILES['img']['name'];
                                                        $file_loc = $_FILES['img']['tmp_name'];
                                                        $file_size = $_FILES['img']['size'];
                                                        $file_type = $_FILES['img']['type'];
                                                        $folder="user_img/";
                                                        // new file size in KB
                                                        $new_size = $file_size/2048;  
                                                        // new file size in KB
                                                        
                                                        // make file name in lower case
                                                        $new_file_name = strtolower($file);
                                                        // make file name in lower case
                                                        
                                                        $final_file=str_replace(' ','-',$new_file_name);
                                                        
                                                        if(move_uploaded_file($file_loc,$folder.$final_file))
                                                        {// Start of if image file upload successful
                                                        $fullname=mysql_real_escape_string($_POST['fname']);
                                                        $gender=mysql_real_escape_string($_POST['gender']);
                                                        $addr=mysql_real_escape_string($_POST['address']);
                                                        $contact=mysql_real_escape_string($_POST['contact']);
                                                        $utype=mysql_real_escape_string($_POST['type']);
                                                        $email=mysql_real_escape_string($_POST['email']);
                                                        $password=mysql_real_escape_string($_POST['pwd']);
                                                        $cpassword=mysql_real_escape_string($_POST['cpwd']);
                                                        if($password==$cpassword)
                                                        {
                                                            $sql=mysql_query("INSERT INTO `user`(`fullname`, `address`, `contact`, `user_type`, `email`, `gender`, `password`, `photo`) VALUES ('$fullname','$addr','$contact','$utype','$email','$gender','$password','$final_file')") or die(mysql_error());
                                                        if($sql)
                                                        {
                                                            
                                                            echo '<script>alert("Registration Successful..!!Please Login.."); window.location="account.php?active=Userlogin"; </script>';

                                                        }
                                                        else
                                                        {
                                                            echo '<script>alert("Registration Failed"); window.location="account.php?active=Register</script>';

                                                        } 
                                                        }
                                                        else
                                                        {
                                                            echo '<script>alert("Password Mismatch"); window.location="account.php?active=Register</script>';
                                                        }
                                                    }
                                                       
                                                 }
                                                  ?>