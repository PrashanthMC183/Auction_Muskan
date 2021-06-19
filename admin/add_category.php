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
            <div class="col-md-3"><a href="viewcategory.php" class="btns"><i class="fa fa-eye"></i> View Category</a></div>
            <div class="col-md-5 well" style="background-color: #A9A9A9; margin-top: 40px;">
            <h2 style="font-size: 35px; font-family:argentina; text-align: center;">Add Category</h2>
            <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cname" class="form-control" placeholder="Enter category name" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Numbers are not allowed')"
    onchange="try{setCustomValidity('')}catch(e){}" required />
                    </div>
                    <input type="submit" name="save" value="Save">
                </form>
                <?php 
                        include('connection.php');
                        if(isset($_POST['save']))
                        {
                            $cat_name=mysql_real_escape_string($_POST['cname']);

                            $sql=mysql_query("INSERT INTO `category`(`cname`) VALUES ('$cat_name')")or die(mysql_error());
                            if($sql)
                            {
                                echo '<script>alert("Category has added"); </script>';
                            }
                            else
                            {
                                echo '<script>alert("Failed to add category"); </script>';
                            }

                        }

                    ?>


            </div>
        </div>


       

    </div>
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
