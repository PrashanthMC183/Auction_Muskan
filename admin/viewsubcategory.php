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
<body>

<div class="wrapper">
    <?php include('sidebar.php'); ?>

    <div class="main-panel">
		<?php include('header.php'); ?>


        <div class="container">
        <br><br>
            <div class="col-md-3"><a href="add_subcategory.php" class="btns"><i class="fa fa-plus"></i> Add Sub Category</a></div>
            <div class="col-md-6 well" style="background-color: #A9A9A9">
            <h2 style="font-size: 35px; font-family:argentina; text-align: center;">View Sub Category</h2>
            <hr>
                <table class="table table-bordered table-hover" style="background-color: white;">
                    <tr>
                        <th>Sl No.</th>
                        <th>Category</th>
                        <th>Sub category</th>
                    </tr>
                    <?php include('connection.php');
                    $i=1;
                        $sql=mysql_query("select * from category") or die(mysql_error());
                        while($row=mysql_fetch_array($sql)) {
                            $cid=$row['cid'];
                            $cname=$row['cname'];
                        $qry=mysql_query("select * from subcategory where cid='$cid'") or die(mysql_error());
                        $nums=mysql_num_rows($qry);
                        if($nums>=1)
                        {
                     ?>
                     <tr>
                         <td rowspan="<?php echo $nums;?>"><?php echo $i++;?></td>
                         <td rowspan="<?php echo $nums;?>"><?php echo $cname; ?></td>
                         <?php while($fetch=mysql_fetch_array($qry)) {?>

                         <td><?php echo $fetch['subcategory']; ?> <a href="updatesubcat.php?sid=<?php echo $fetch['subcid']; ?>&&cid=<?php echo $row['cid']; ?>" ><i class="fa fa-edit"></i></a> <a href="delsubcategory.php?sid=<?php echo $fetch['subcid']; ?>" onclick="return confirm('Are you sure you want to delete this category?')" title="Delete"><i class="fa fa-trash-o"></i></a></td>
                     </tr>
                     <?php } } }?>
                </table>
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
