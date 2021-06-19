<div class="wrapper" > 

<!--Navigation-->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">
					<li>
                        <a href="home.php">Home</a>
                    </li>
					<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Package<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="viewpackage.php">View</a></li>
                        <li><a href="mysubscription.php">Subscription</a></li>
                        <li><a href="news_req.php">News Request</a></li>
                      </ul>                
                    </li>

					<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>               
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="prod_details.php">Product details</a></li>
                        <li><a href="hostproduct.php">Host request</a></li>
                        <li><a href="hostedproduct.php">Hosted products</a></li>
                      </ul>                
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bidders <span class="caret"></span></a>               
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="viewbidder.php">View bidders</a></li>
                        <li><a href="winner.php">Winners list</a></li>
                        <li><a href="message.php">Messages</a></li>
                      </ul>                
                    </li>
					
					         <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product delivery <span class="caret"></span></a>               
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="delivery.php">Delivery status</a></li>
                        <li><a href="paymentmode.php">Payment mode</a></li>
                      </ul>                
                    </li>
                     <li>
                        <a href="report.php">Report</a>
                    </li>
                </ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="">Welcome,<?php echo $fname; ?>
							<span class="caret"></span></a>
								<ul class="dropdown-menu">
                  <li><a href="profile.php">View Profile</a></li>
									<li><a href="changepwd.php">Change Password</a></li>
									<li><a href="logout.php">Logout</a></li>
								</ul>
					</li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <script type="text/javascript">
        $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
    </script>