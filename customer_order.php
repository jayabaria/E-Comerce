<?php

session_start();	//session started
if(!isset($_SESSION["uid"])){
	header("location:index.php");
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
			
		<style>
			table tr td {padding:10px};
		</style>
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
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"><!--Dividing in 2--></div>
			<div class="col-md-8"><!--Dividing in 8-->
				<div class="panel panel-default"><!--Panel-->
					<div class="panel-heading"><!--Panel Heading--></div>
					<div class="panel-body"><!--Panel Body-->
						<h1>Customer Order Details</h1>
						<hr/>
						<div class="row">
							<div class="col-md-6"><!--Dividing in 6-->
								<img src="product_images/camera.jpg" style="float:right;" class="img-thumbnail" />
							</div>
							<div class="col-md-6"><!--Dividing in 6-->
								<table>
									<tr><td>Product Name:</td><td><b>Sony Camera</b></td></tr>
									<tr><td>Product Price:</td><td><b>35000</b></td></tr>
									<tr><td>Quantity:</td><td><b>1</b></td></tr>
									<tr><td>Payment:</td><td><b>Completed</b></td></tr>
									<tr><td>Transaction Id:</td><td><b>Trx25647611</b></td></tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer"><!--Panel Footer--></div>
				</div>
			</div>
			<div class="col-md-2"><!--Dividing in 2--></div>
		</div>
	</div>				
	</body>
</html>