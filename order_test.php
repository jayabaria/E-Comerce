<?php

session_start();	//session started
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
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
			<a class="navbar-brand" href="#">SIDDHI COMPUTERS</a>
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
				
				<li><a href="about_us.php"><span class="glyphicon glyphicon-modal-window"></span> About Us</a></li><!--About US-->
				
				<li style="float:right; margin-left:700px;"><a href="logout.php" style="text-decoration:none;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				
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
						<h1>Customer Order Summary:</h1>
						<hr/>
			<?php
							
				if(isset($_GET["cart_checkout"]) || isset($_GET["get_cart_product"]) || isset($_SESSION["uid"])){
				include "includes/db.php"; 
				$user_id = $_SESSION["uid"];
				$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
				$run_query = mysqli_query($con, $sql);
				$total = 0;
				$trx_id = "Trx2564761";
				if(mysqli_num_rows($run_query)){
					while($row=mysqli_fetch_array($run_query)){
						$id = $row["id"];
						$product_id = $row["product_id"];
						$product_title = $row["product_title"];
						$product_image = $row["product_image"];
						$quantity = $row["quantity"];
						$price = $row["price"];
						$total_amount = $row["total_amount"];
										
						//calculating cart price
						$price_array = array($total_amount);
						$sum = array_sum($price_array);
						$total = $total + $sum;	
			
	
						echo"
							
							<div class='row'>
							<div class='col-md-6'>							
							<img src='product_images/$product_image' style='float:right; height:250px; width:250px;' class='img-thumbnail' />
							</div>
							<div class='col-md-6'>
								<table>
								<tr><td>Product Name:</td><td><b>$product_title</b></td></tr>
										<tr><td>Product Price(&#8377;):</td><td><b>$price</b></td></tr>
										<tr><td>Quantity:</td><td><b>$quantity</b></td></tr>
										<tr><td>Payment:</td><td><b>Pending</b></td></tr>
										<tr><td>Transaction Id:</td><td><b>$trx_id</b></td></tr>
										<br><hr/>
							
								</table>
							</div>
							</div>";}
							echo"<hr/>
							<h4><b style='float:right; margin-right:180px;'>Total:$total(&#8377;)</b></h4>
							<hr/>";
							}} ?>
						<a href="#" style="float:right;margin-right:170px;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#checkout_modal">Place Order</a>
					</div>
					<div class="panel-footer"><!--Panel Footer--></div>
				</div>
			</div>
			<div class="col-md-2"><!--Dividing in 2--></div>
		</div>
	</div>				
	</body>
</html>
<?php include("includes/modal.php"); ?>