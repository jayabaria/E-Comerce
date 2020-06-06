<?php

session_start();	//session started
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>C-STORE</title>
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
	<div>
	<!-- Navigation Bar-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#">C-STORE</a>
		</div>	
		
		<!--Search Bar
		<form class="navbar-form navbar-right" style="margin-right:5px;">
			<div class="input-group">
				<input type="text" class="form-control" id="search" placeholder="Search a Product">
				<div class="input-group-btn">
					<button id="search_button" class="btn btn-default" >
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>-->
		
		<!--Collapsable Navbar-->
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav"><!--Navbar Content-->
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li><!--Home-->
				
				<li><a href="about_us.php"><span class="glyphicon glyphicon-modal-window"></span> About Us</a></li><!--About Us-->
				
				<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>Products-->
				
				<li style="float:right; margin-left:700px;"><a href="logout.php" style="text-decoration:none;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				
			</ul>
		</div>
	</nav>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Displaying Cart Message Here-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"><!--col-size 2--></div>
			<div class="col-md-8"><!--col-size 8-->
				<div class="panel panel-primary"><!--Panel-->
					<div class="panel-heading"><!--Panel-Heading-->Cart Checkout</div>
					<div class="panel-body"><!--Panel-Body-->
						<div class="row">
							<div class="col-md-2"><b>Action</b></div>
							<div class="col-md-2"><b>Product Image</b></div>
							<div class="col-md-2"><b>Product Name</b></div>
							<div class="col-md-2"><b>Quantity</b></div>
							<div class="col-md-2"><b>Price(&#8377;)</b></div>
							<div class="col-md-2"><b>Total(&#8377;)</b></div>
						</div>
						<div id="cart_checkout">
							<!--Displaying cart products here-->
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="btn-grp">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src="product_images/Samsung J7 Prime 32GB.JPG" style="width:100px; height:100px;"></div>
							<div class="col-md-2">Samsung J7</div>
							<div class="col-md-2"><input type="text" class="form-control" value="12000" disabled></div>
							<div class="col-md-2"><input type="text" class="form-control" value="1"></div>
							<div class="col-md-2"><input type="text" class="form-control" value="12000" disabled></div>
						</div>
						<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total Price(1200)</b>
							</div>
						</div>
						<a href="order_test.php" style="float:right;margin-right:130px;" name="get_order" class="btn btn-primary btn-lg">Check Out</a>
					</div>
					<!--<div class="panel-footer">&copy; 2017Panel-Footer</div>-->
				</div>
			</div>
			<div class="col-md-2"><!--col-size 2--></div>
		</div>
	</div>
</body>
</html>