<?php

session_start();	//session started
if(!isset($_SESSION["uid"])){
	header("location:index.php");	//If session is not started then he will be redirected to index.php page
}
?>
<!DOCTYPE html>
<!--<?php include("functions/function.php") //getting the dynamic content from the database ?>-->
<html lang="en">
	<head>
		<title>SIDDHI COMPUTERS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="bootstrap/js/jquery.js"></script>
		
		<script src="bootstrap/js/bootstrap.js"></script>
		
		<script src="main.js"></script>

				
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
		
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />

		<link rel="stylesheet" href="styles/style.css" media="all" />
						
	</head>
	
<body>
	<!-- Navigation Bar-->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#">SIDDHI COMPUTERS</a>
		</div>
		
		<!--Search Bar -->
		<form class="navbar-form navbar-right" style="margin-right:10px;">
			<div class="input-group">
				<input type="text" class="form-control" id="search" placeholder="Search a Product">
				<div class="input-group-btn">
					<button id="search_button" class="btn btn-default" >
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>
		
		<!--Collapsable Navbar-->
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav"><!--Navbar Content-->
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li><!--Home-->
				
				<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>Products-->
				
				<li><a href="about_us.php"><span class="glyphicon glyphicon-modal-window"></span> About Us</a></li><!--About Us-->
				
				
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a><!--Cart-->
					<div class="dropdown-menu" style="width:400px;"><!--Triggering a dropdown for Cart-->
						<div class="panel panel-success"><!--Panel Cart-->
						<div class="panel-heading"><!--Cart Headings-->
						 <div class="row">
							<div class="col-md-3">Serial no.</div>
							<div class="col-md-3">Product Image</div>
							<div class="col-md-3">Product Name</div>
							<div class="col-md-3">Price (&#8377;)</div>
						 </div>
						</div>
						<div class="panel-body">
							<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Serial no.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price (&#8377;)</div>
								</div>-->
							</div>
						</div>
						<div class="panel-footer"></div>						
						</div>
					</div>
				</li>
				<li><a href="Samsung.php">Offers</a>
				</li>
			</ul>
		
			<!-- Navigation Bar (Right)-->
			<ul class="nav navbar-nav navbar-right">
				
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo "Hi,".$_SESSION["name"];?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a><!--Cart--></li>
						<li class="divider"></li>
						<li><a href="#" style="text-decoration:none; color:blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</li>
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
	
		<div class="row"><!--Dividing rows & col in 1,2,8,1-->
			<div class="col-md-1"><!--col-size 1--></div>
			
			<div class="col-md-2"><!--col-size 2-->
				<div id="get_category">
					<!--Displaying Categories through Ajax Request-->
				</div>
				
				<!--<div class="nav nav-pills nav-stacked"><!--Use of NavPills & NavStack
					<li class="active"><a href="#"><h4>Categories</h4></a></li><!--Categories
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>-->
				<div id="get_brand">
					<!--Displaying Brands through Ajax Request-->
				</div>
				
				<!--<div class="nav nav-pills nav-stacked"><!--Use of NavPills & NavStack
					<li class="active"><a href="#"><h4>Brands</h4></a></li><!--Brands
					<li><a href="#">Brands</a></li>
					<li><a href="#">Brands</a></li>
					<li><a href="#">Brands</a></li>
					<li><a href="#">Brands</a></li>
				</div>-->
			</div>
			
			<div class="col-md-8"> <!--  //col-size 8  -->
				<div class="row"> <!--  //Cart Message (Product is Added) -->
					<div class="col-md-12" id="cart_msg">
					</div>
				</div>
				<div class="panel panel-info"><!--Use of Panel-->
					<div class="panel panel-heading">Products<!--Panel Name--></div>
					<div class="panel-body"><!--Panel Body-->
						<div id="get_product">
							<!--Displaying Products through Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info"><!--Nested Panel
								<div class="panel-heading">Samsung Mobile</div><!--Product Name
								<div class="panel-body"><!--Product Body(Image)
									<img src="product_images/iphone.JPG" />
								</div>
								<div class="panel-heading">&#8377; 15000<!--Product Price & Cart
									<button style="float:right" class="btn btn-danger btn-xs">Add To Cart</button>
								</div>
							</div>
						</div>-->
					</div>
					<!--<div class="panel-footer">&copy; 2017</div>-->
				</div>
			</div>
			
			<div class="col-md-1"><!--col-size 1--></div>
		</div>
		<div class="row"><!--Pagination-->
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
					</ul>
				</center>
					<button style="float:right"><a href="review.php">review</a></button>
			</div>
		</div>
	</div>
	</body>
</html>