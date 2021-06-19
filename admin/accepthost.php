<?php
  
  // code to declare the winner and change the product status to ended
  
include 'connection.php';
    
  
  

  date_default_timezone_set('Asia/Kolkata');
   $curr_date_time=date('Y-m-d H:i:s');

  $qry_select_product=mysql_query("SELECT * FROM `hostproduct`  ");
  while ($row=mysql_fetch_array($qry_select_product)) 
  {
    $reqid=$row['reqid'];
    // echo '<br>';
    $product_date_time=$row['tilldate'];
    if (strtotime($curr_date_time) >= strtotime($product_date_time) )
      {
        $qry_update_winner=mysql_query("UPDATE `hostproduct` SET `status`='Expired' WHERE `reqid`='$reqid'");

      }
      
      

    
  }


  
?>
<?php include('session.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style type="text/css">
        input[type=submit], .btns {
    background-color: #9370DB;
    color: white;
    padding: 12px 20px;


    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover,.btns:hover {
    background-color: #2F4F4F;
}
    </style>
</head>
<body >


    <?php include('sidebar.php'); ?>

    <div class="main-panel">
        <?php include('header.php'); ?>


        <div class="container">
        <br><br>
        <div class="col-md-2"></div>
            <div class="col-md-8">
            
            <h2 style="font-size: 35px; font-family:argentina; text-align: center;color:darkblue;">View Products</h2>
            <hr>
                <table class="table table-bordered table-hover" style="border: 1px solid grey;background-color: lightgrey;" >
                    <tr>
                        <th style="border: 1px solid grey;">SL.No</th>
                        <th style="border: 1px solid grey;">Seller</th>
                        <th style="border: 1px solid grey;">Products</th>
                        <th style="border: 1px solid grey;">Minimum Range</th>
                        <th style="border: 1px solid grey;">Host Date</th>
                        <th style="border: 1px solid grey;">Till Date</th>
                        <th style="border: 1px solid grey;">Request Date</th>
                        <th style="border: 1px solid grey;">Action</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from hostproduct,product where product.pro_id=hostproduct.prid") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                          $status=$row['status'];
                     ?>
                     <tr>
                         <td style="border: 1px solid grey;"><?php echo $i;?></td>
                         <?php $sellerid=$row['user_id']; 
                            $sr=mysql_query("SELECT * FROM user where user_id='$sellerid'");
                            $res=mysql_fetch_array($sr);
                         ?>
                         <td style="border: 1px solid grey;"><?php echo $res['fullname']; ?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['productname']; ?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['min_range']; ?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['hoston'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['tilldate'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['reqdate'];?></td>
                         <td style="border: 1px solid grey;"><?php $status=$row['status'];
                                if($status=='Hosted') { ?>
                                    <p id="demo<?php echo $row['reqid']; ?>"></p>
                           <?php  } else if($status=='Requested'){ ?>
                                    <a href="hostproduct.php?reqid=<?php echo $row['reqid']; ?>" class="btn btn-success">Host</a>
                          <?php  }else if($status=='Expired'){ ?>
                                    <p id="demo<?php echo $row['reqid']; ?>"></p>
                          <?php  }
                          ?>
                            
                            
                         </td>
                         
                     </tr>
                     <?php   $i++; } ?>
                </table>
            </div>
        </div>


</body>
 <!--   Core JS Files   -->

 <script type="text/javascript">
            function createCountDown(elementId, date) {
            // Set the date we're counting down to
            var countDownDate = new Date(date).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now an the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Display the result in the element with id="demo"
              document.getElementById(elementId).innerHTML = days + "d " + hours + "h "
              + minutes + "m " + seconds + "s ";

              // If the count down is finished, write some text 
              if (distance < 0) {
                clearInterval(x);
                document.getElementById(elementId).innerHTML = "Product EXPIRED";
              }
            }, 1000);
        }

        // createCountDown('demo1', "2019-07-26 18:00:00")
        // createCountDown('demo2', "2018-02-13 14:00:00")
        // createCountDown('demo3', "2017-07-27 10:04:30")
        // createCountDown('demo4', "2017-07-28 20:10:50")
        </script>
        
        <?php
     
            $i=1;
            $qry_select=mysql_query("SELECT * FROM `hostproduct`");

            while ($row= mysql_fetch_array($qry_select)) 
            {
                $time=date('M',strtotime($row['tilldate'])).' '.date('d',strtotime($row['tilldate'])).', '.date('Y',strtotime($row['tilldate'])).' '.date('H:i',strtotime($row['tilldate']));
                $rid=$row['reqid'];
        ?>
            <script type="text/javascript">
                createCountDown('demo<?php echo $rid ?>', "<?php echo $time ?>");
            </script>
        <?php
                $i++;

            }
        ?>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
</html>