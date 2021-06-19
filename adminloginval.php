 <?php 
                                                    include('connection.php');
                                                    if(isset($_POST['save']))
                                                    {
                                                        $uname=mysql_real_escape_string($_POST['username']);
                                                        $pwd=mysql_real_escape_string($_POST['pwd']);

                                                        $sql=mysql_query("select * from admin_login where username='$uname' and password='$pwd'") or die(mysql_error());
                                                        $nums=mysql_num_rows($sql);
                                                        $fetch=mysql_fetch_array($sql);
                                                        if($nums==1)
                                                        {
                                                            session_start();
                                                            $_SESSION['user']=$fetch['username'];
                                                            
                                                            echo '<script>alert("Login Successful"); window.location="admin/dashboard.php?active=Admin"; 
                                                            </script>';

                                                        }
                                                        else
                                                        {
                                                            echo '<script>alert("Login Failed"); window.location="account.php?active=Admin";</script>';

                                                        }
                                                 }
                                                  ?>