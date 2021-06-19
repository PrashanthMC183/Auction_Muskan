<?php include('session.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
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
        
            <div class="col-md-10">
            
            <h2 style="font-size: 35px; font-family:argentina; text-align: center;color:darkblue;margin-top: 5px;">Host News</h2>
            <hr>
                <table class="table table-bordered table-hover" style="border: 1px solid grey;background-color: lightgrey;" >
                    <tr>
                        <th style="border: 1px solid grey;">SL.No</th>
                        <th style="border: 1px solid grey;">User Name</th>
                        <th style="border: 1px solid grey;">Title</th>
                        <th style="border: 1px solid grey;">Product</th>
                        <th style="border: 1px solid grey;">Description</th>
                        <th style="border: 1px solid grey;">Post on</th>
                        <th style="border: 1px solid grey;">Request date</th>
                        <th style="border: 1px solid grey;">Image</th>
                        <th style="border: 1px solid grey;">Action</th>


                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from newsreq") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                     ?>
                     <tr>
                         <td style="border: 1px solid grey;"><?php echo $i++;?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['username']; ?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['title'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['productname'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['desc'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['postonbefore'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['req_sent'];?></td>
                         <td style="border: 1px solid grey;"><?php echo $row['image'];?></td>
                         <td style="border: 1px solid grey;"><a href="accept.php?nrid=<?php echo $row['nr_id']?>" class="btn btn-primary" title="Accept">HOST</a><a href="reject_news.php?nrid=<?php echo $row['nr_id']?>" onclick="return confirm('Are you sure?')" title="Delete" class="btn btn-danger">DENY</a></td>

                    </tr>
                     <?php } ?>
                </table>
            </div>
                            <?php 
                        include('connection.php');
                        if(isset($_POST['update']))
                        {
                            $pactitle=mysql_real_escape_string($_POST['pactitle']);
                            $pacamt=mysql_real_escape_string($_POST['pacamt']);
                            $pacval=mysql_real_escape_string($_POST['pacval']);

                            $sql=mysql_query("update package set ptitle='$pactitle',pvalidity='$pacval',pamt='$pacamt' where pid='$p_id'")or die(mysql_error());
                            if($sql)
                            {
                                echo '<script>alert("Package has update"); window.location="viewpackage.php"; </script>';
                            }
                            else
                            {
                                echo '<script>alert("Failed to update Package"); </script>';
                            }

                        }

                    ?>

        </div>


</body>
 <!--   Core JS Files   -->
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