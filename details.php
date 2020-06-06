<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}

?>
<!DOCTYPE html>
<!--<?php include("functions/function.php") //getting the dynamic content from the database ?>-->
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
		
		<!--Search Bar -->
		<form class="navbar-form navbar-right">
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
				
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li><!--Products-->
				
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a><!--Categories-->
					<ul class="dropdown-menu">
						<?php getCats(); ?>
					</ul>
				</li>
				
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Brands <span class="caret"></span></a><!--Brands-->
					<ul class="dropdown-menu">
						<?php getBrands(); ?>
					</ul>
				</li>
				
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a><!--Cart-->
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
						<div class="panel-body"></div>
						<div class="panel-footer"></div>
						
						</div>
					</div>
				</li>
			</ul>
		
			<!-- Navigation Bar (Right)-->
			<ul class="nav navbar-nav navbar-right">
				<li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a><!--SignUp--></li>
				
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login<!--Login--></a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading"><!--Login Form-->
									<label for="email">Email<!--Email--></label>
									<input type="email" class="form-control" id="email" required/>
									<label for="email">Password<!--Password--></label>
									<input type="password" class="form-control" id="password" required/>
									<p><br/></p>
									<a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
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
			
			<div class="col-md-8"><!--col-size 8-->
				<div class="panel panel-info"><!--Use of Panel-->
					<div class="panel panel-heading">Details<!--Panel Name--></div>
					<div class="panel-body"><!--Panel Body-->
						<!--<div id="get_product">-->
						<?php
						
						if(isset($_GET["product_id"])){
							
						$product_id = $_GET["product_id"];
						
						$product_query = "SELECT * FROM products WHERE product_id = '$product_id'";
							$run_query = mysqli_query($con, $product_query);
								if(mysqli_num_rows($run_query) > 0){
									while($row = mysqli_fetch_array($run_query)){
										$product_id = $row['product_id'];
										$product_title = $row['product_title'];
										$product_price = $row['product_price'];
										$product_image = $row['product_image'];
										$product_desc = $row['product_desc'];
										echo"
												<div class='col-md-4'>
													<div class='panel panel-info'>
														<div class='panel-heading'>
														$product_title</div>
														<div class='panel-body'>
															<a href='index.php'><img src='product_images/$product_image' style='width:400px; height:300px;'></a>
														</div>
														
														<div class='panel-heading'>&#8377;$product_price
															<button pid='$product_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Add To Cart</button>
														</div>
													</div>
												</div>
										";
									}
								}
						}
						?>
						
						
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
					<div class="panel-footer"><i><b>C-STORE by MAYUR KESARIA &copy; 2018</b></i></div>
				</div>
			</div>
			
			<div class="col-md-1"><!--col-size 1--></div>
		
		</div>
	</div>
	</body>
</html>