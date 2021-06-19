            <?php include('session.php');  include('connection.php'); 
                  $u_id=$_GET['uid'];
                        				if(isset($_POST['send']))
                        				{
                        					$qcontent=$_POST['qcontent'];

                        					$qry=mysql_query("INSERT INTO `query`(`qid`, `sellerid`, `uid`, `qcontent`, `qdate`, `status`) VALUES ('','$uid','$u_id','$qcontent',now(),'seller_sent')") or die(mysql_error());
                        					if($qry)
                        					{
                        						echo "<script>alert('Message Sent'); window.location='message.php'; </script>";
                        					}
                        					else{
                        						echo "<script>alert('Message couldn't be sent'); window.location='message.php';</script>";
                        					}
                        				
                        				
                        			}
                        			?>