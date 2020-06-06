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
	<!-- //Navigation Bar  -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#">SIDDHI COMPUTERS</a>
		</div>
		
		<!--  /Search Bar -->
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
		
		<!--  //Collapsable Navbar  -->
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav"><!--  //Navbar Content  -->
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li><!--  //Home  -->
				
				<!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>Products-->
				
				<li><a href="about_us.php"><span class="glyphicon glyphicon-modal-window"></span> About Us</a></li><!--  //About Us  -->
				
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a><!--Cart-->
					<div class="dropdown-menu" style="width:400px;"><!--  //Triggering a dropdown for Cart  -->
						<div class="panel panel-success"><!--  //Panel Cart  -->
						<div class="panel-heading"><!--  //Cart Headings  -->
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
				
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login <!--  //Login  --></a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading"><!--  //Login Form  -->
									<label for="email">Email <!--  //Email  --></label>
									<input type="email" class="form-control" id="email" required/>
									<label for="email">Password<!--  //Password  --></label>
									<input type="password" class="form-control" id="password" required/>
									<p><br/></p>
									<a href="change_password.php" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login"/>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
				
			</ul>
		</div>		
	</nav>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--  //Alert from signup  -->
			</div>
			<div class="col-md-2"></div>
		</div>
		
		<div class="row">
			<div class="col-md-2"> <!--  //col-size 2  --></div>
			<div class="col-md-8"> <!--  //col-size 8  -->
				<div class="panel panel-primary"> <!--  //Panel  -->
					<div class="panel-heading"> <!--  //Panel Heading  -->Register Here...!</div>
					<div class="panel-body"> <!--  //Panel Body  -->
						<form method="post"> <!--  //html form  -->
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name<span style="color:red;"> *</span></label> <!--  //First Name  -->
								<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
							</div>
							<div class="col-md-6">
								<label for="f_name">Last Name<span style="color:red;"> *</span></label> <!--  //Last Name  -->
								<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email<span style="color:red;"> *</span></label> <!--  //Email  -->
								<input type="text" class="form-control" id="email" name="email" placeholder="Email">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="password">Password:</label> <!--  //Password  -->
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-Enter Password<span style="color:red;"> *</span></label> <!--  //Re-Enter Password  -->
								<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-Enter Password">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile No<span style="color:red;"> *</span></label> <!--  //Mobile  -->
								<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile No">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address 1<span style="color:red;"> *</span></label> <!--  //Address1  -->
								<input type="text" class="form-control" id="address1" name="address1" placeholder="Address 1">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Address 2<span style="color:red;"> *</span></label> <!--  //Address2  -->
								<input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2">
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12"> <!--  //SignUp/Submit  -->
								<input type="button" style="float:right;" class="btn btn-success btn-lg" id="signup_button" name="signup_button" value="Sign Up"> 
							</div>
						</div>
						
					</div>
					</form>
					<div class="panel-footer"> <!--  //Panel Footer  -->Already a customer? <a href="index.php">Login</a> from above or from <a href="index.php">Home</a></div>
				</div>
			</div>
			<div class="col-md-2"><!--  //col-size 2  --></div>
		</div>
	</div>
</body>
</html>