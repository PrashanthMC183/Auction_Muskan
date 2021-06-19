            <?php include('session.php');  include('connection.php'); 
                  $sellerid=$_GET['sellerid'];
                        				if(isset($_POST['send']))
                        				{
                        					$qcontent=$_POST['qcontent'];

                        					$qry=mysql_query("INSERT INTO `query`(`qid`, `sellerid`, `uid`, `qcontent`, `qdate`, `status`) VALUES ('','$sellerid','$uid','$qcontent',now(),'buyer_sent')") or die(mysql_error());
                        					if($qry)
                        					{
                        						echo "<script>alert('Message Sent'); window.location='message.php?sellerid=".$sellerid."'; </script>";
                        					}
                        					else{
                        						echo "<script>alert('Message couldn't be sent'); window.location='message.php?sellerid=".$sellerid."';</script>";
                        					}
                        				
                        				
                        			}
                        			?>