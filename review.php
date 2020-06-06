<?php

session_start();	//session started
if(!isset($_SESSION["uid"])){
	header("location:index.php");	//If session is not started then he will be redirected to index.php page
}
?><!DOCTYPE html>
<!--<?php include("functions/function.php") //getting the dynamic content from the database ?>-->
<html lang="en">
	<head>
		<title>C-STORE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="bootstrap/js/jquery.js"></script> <!--  //External JQUERY File  -->
		
		<script src="bootstrap/js/bootstrap.js"></script><!--  //Bootstrap Javascript File (min.js)  -->
		
		<script src="main.js"></script> <!--  //External Javascript File (Customized) -->

		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" /> <!--  //Bootstrap CSS File -->
		
		<!--  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" /> <!---  //Bootstrap Themes  -->

		<link rel="stylesheet" href="styles/style.css" media="all" /> <!--  //External Stylesheet (Customized) -->		
		
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
				<li><a href="Samsung.php" class="dropdown-toggle" data-toggle="dropdown">Offers</a>
					<div class="dropdown-menu" style="width:700px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-2">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-2">Product Name</div>
									<div class="col-md-2">Price in $.</div>
									<div class="col-md-3">discount offer</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								<a href="cart.php"><button style="float:right" class="btn btn-danger btn-xs">Add To Cart</a></button>
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
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
          <div class="col-md-8"> <!--  //col-size 8  -->
				<div class="panel panel-info"> <!--  //Use of Panel  -->
					<div class="panel panel-heading">Products <!--  //Panel Name  --></div>
					<div class="panel-body"> <!--  //Panel Body  --> 
						
						name	:<input type="text" size="10"><p><br></p>
						review  :<textarea rows="10" cols="50"></textarea>
						<p><label for="rating">Rating</label><input type="radio" name="rating" value="5" /> 5 
						<input type="radio" name="rating" value="4" /> 4
						<input type="radio" name="rating" value="3" /> 3 <input type="radio" name="rating" value="2" /> 2 <input type="radio" name="rating" value="1" /> 1</p>
						<a href="profile.php"> 
						<button style="float:bottom" class="btn btn-danger btn-xs">submit</a></button>
					</div>	
					</div>
					<div class="panel-footer"><i><b>C-STORE by JAY BARIA &copy; 2019</b></i></div>
				</div>
			</div>
			</div>
	</div>
	</body>
</html>
