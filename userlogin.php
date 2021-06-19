<?php 
                                                    include('connection.php');
                                                    if(isset($_POST['save']))
                                                    {
                                                        $email=mysql_real_escape_string($_POST['Email']);
                                                        $pwd=mysql_real_escape_string($_POST['pwd']);

                                                        $sql=mysql_query("select * from user where email='$email' and password='$pwd'") or die(mysql_error());
                                                        $nums=mysql_num_rows($sql);
                                                        $fetch=mysql_fetch_array($sql);
                                                        if($nums==1)
                                                        {
                                                            $utype=$fetch['user_type'];
                                                            if($utype=='seller')
                                                            {
                                                                session_start();
                                                                $_SESSION['fname']=$fetch['fullname'];
                                                                $_SESSION['uid']=$fetch['user_id'];
                                                                $_SESSION['utype']=$fetch['user_type'];
                                                                echo '<script>alert("Welcome '.$_SESSION['fname'].' as Seller"); window.location="seller/home.php"; 
                                                                </script>';
                                                            }
                                                            else if($utype=='buyer')
                                                            {
                                                                session_start();
                                                                $_SESSION['fname']=$fetch['fullname'];
                                                                $_SESSION['uid']=$fetch['user_id'];
                                                                $_SESSION['utype']=$fetch['user_type'];
                                                                echo '<script>alert("Welcome '.$_SESSION['fname'].' as Buyer"); window.location="buyer/buyerpage.php"; 
                                                                </script>';
                                                            }
                                                            
                                                        }
                                                        else
                                                        {
                                                            echo '<script>alert("Login Failed"); window.location="account.php?active=Userlogin";</script>';

                                                        }
                                                 }
                                                  ?>