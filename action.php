<?php

session_start();	//session starting

include "includes/db.php"; //Connection

//Getting the Categories Tab
if(isset($_POST["category"])){	//checking if category is set in main.js
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query);
	echo"
			<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h4>Categories</h4></a></li>
		";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cat_id = $row["cat_id"];
			$cat_title = $row["cat_title"];
			echo"
					<li><a href='#' class='category' cid='$cat_id'>$cat_title</a></li>
				";
		}
		echo"</div>";
	}
	
}
//Getting the Brands Tab
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);
	echo"
			<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h4>Brands</h4></a></li>
		";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$brand_id = $row["brand_id"];
			$brand_title = $row["brand_title"];
			echo"
					<li><a href='#' class='brand' bid='$brand_id'>$brand_title</a></li>
				";
		}
		echo"</div>";
	}
	
}
//Pagination
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	
	//displaying products in pagination
	$pageno = ceil($count/9);	/*rounding off*/
	
	for ($i=1;$i<=$pageno;$i++){
		echo "
				<li><a href='#' page='$i' id='page' >$i</a></li>
		";
	}
}

//Getting the Products
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}
	else{
			$start = 0;
	}
	
	$product_query = "SELECT * FROM products LIMIT $start,$limit";	/*Fetching 9 random products*/
	$run_query = mysqli_query($con, $product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$product_id = $row['product_id'];
			$product_cat = $row['product_cat'];
			$product_brand = $row['product_brand'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_image = $row['product_image'];
			echo"
					<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>
							$product_title</div>
							<div class='panel-body'>
								<img src='product_images/$product_image' style='width:160px; height:250px;'>
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
//Getting Selected Categories & Brands & SearchBar
	if(isset($_POST["get_selected_category"]) || isset($_POST["get_selected_brand"]) || isset($_POST["search"])){
		if(isset($_POST["get_selected_category"])){	//Data From Categories
			$cid = $_POST["cat_id"];
			$sql = "SELECT * FROM products WHERE product_cat = '$cid'";
		}
		else if(isset($_POST["get_selected_brand"])){	//Data From Brands
			$bid = $_POST["brand_id"];
			$sql = "SELECT * FROM products WHERE product_brand = '$bid'";
			}
		else{
			$keyword = $_POST["keyword"];	//Data From SearchBox
			$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
			}
		$run_query = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($run_query)){
			$product_id = $row['product_id'];
			$product_cat = $row['product_cat'];
			$product_brand = $row['product_brand'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_image = $row['product_image'];
			$product_keywords = $row['product_keywords'];
			echo"
					<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>
							$product_title</div>
							<div class='panel-body'>
								<img src='product_images/$product_image' style='width:160px; height:250px;'/>
							</div>
							<div class='panel-heading'>&#8377;$product_price
								<button pid='$product_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Add To Cart</button>
							</div>
						</div>
					</div>
				";
	}
}
//AddToCart
if(isset($_POST["AddToCart"])){
	
	//if(isset($_SESSION["uid"])){
		
		$p_id = $_POST["pid"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE product_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Product already added...!</b>
					</div>
				";
			}
		else{
			$sql = "SELECT * FROM products WHERE product_id = '$p_id'";
			$run_query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($run_query);
			$product_id = $row["product_id"];
			$product_title = $row["product_title"];
			$product_image = $row["product_image"];
			$product_price = $row["product_price"];
			
			$sql = "INSERT INTO `ecommerce`.`cart` (`id`, `product_id`, `ip_address`, `user_id`, `product_title`, `product_image`, `quantity`, 
			`price`, `total_amount`) 
			VALUES (NULL, '$product_id', '0', '$user_id', '$product_title', '$product_image', '1', '$product_price', '$product_price')";
			if(mysqli_query($con, $sql)){
				echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Product is added to the Cart...!</b>
						</div>
						";
			}
			
	}
	
}
// offer product
if(isset($_POST["AddToCart"])){
	
	//if(isset($_SESSION["uid"])){
		
		$p_id = $_POST["pid"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE product_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Product already added...!</b>
					</div>
				";
			}
		else{
			$sql = "SELECT * FROM products WHERE product_id = '$p_id'";
			$run_query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($run_query);
			$product_id = $row["product_id"];
			$product_title = $row["product_title"];
			$product_image = $row["product_image"];
			$product_price = $row["product_price"];
			
			$sql = "INSERT INTO `ecommerce`.`offer` (`id`, `product_id`, `ip_address`, `user_id`, `product_title`, `product_image`, `quantity`, 
			`price`, `total_amount`) 
			VALUES (NULL, '$product_id', '0', '$user_id', '$product_title', '$product_image', '1', '$product_price', '$product_price')";
			if(mysqli_query($con, $sql)){
				echo "
						<div class='alert alert-success'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Product is added to the Cart...!</b>
						</div>
						";
			}
			
	}
	
}
//CartCount
if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
	$user_id = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$number = 1;
		$total = 0;
		while($row = mysqli_fetch_array($run_query)){
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
			
			if(isset($_POST["get_cart_product"])){
				
				echo "
					<div class='row'>
						<div class='col-md-3'>$number</div>
						<div class='col-md-3'><img src='product_images/$product_image' style='width:60px; height:50px;'></div>
						<div class='col-md-3'>$product_title</div>
						<div class='col-md-3'>$price (&#8377;)</div>
					</div>
			
			";
			$number = $number + 1;
				
			}
			else{
				
					echo "
							<div class='row'>
								<div class='col-md-2'>
									<div class='btn-grp'>
										<a href='#' remove_id='$product_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
										<a href='#' update_id='$product_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'> </span></a>
									</div>
								</div>
								<div class='col-md-2'><img src='product_images/$product_image' style='width:50px; height:60px;'></div>
								<div class='col-md-2'>$product_title</div>
								<div class='col-md-2'><input type='text' class='form-control qty'   pid='$product_id' id='qty-$product_id' value='$quantity'></div>
								<div class='col-md-2'><input type='text' class='form-control price' pid='$product_id' id='price-$product_id' value='$price' disabled></div>
								<div class='col-md-2'><input type='text' class='form-control total' pid='$product_id' id='total-$product_id' value='$total_amount' disabled></div>
							</div>
					
						";
			}
			
		}
		
		if(isset($_POST["cart_checkout"])){
			
			echo "
					<div class='row'>
						<div class='col-md-8'></div>
						<div class='col-md-4'>
							<b>Total Price(&#8377;): $total</b>
						</div>
					</div>";
		}
	}
	
}
//Badge
if(isset($_POST['cart_count']) AND isset($_SESSION['uid'])){
	
	$user_id = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
	$run_query = mysqli_query($con, $sql);
	echo mysqli_num_rows($run_query);
	
	
	
}

//Removing Product From The Cart
if(isset($_POST["remove_from_cart"])){
	$pid = $_POST["remove_id"];
	$user_id = $_SESSION["uid"];
	$sql = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$pid'";
	$run_query = mysqli_query($con, $sql);
	if($run_query){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Removed Successfully...!</b>
				</div>
			";
	}
}
//Updating Cart
if(isset($_POST["update_cart"])){
	$pid = $_POST["update_id"];
	$user_id = $_SESSION["uid"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "UPDATE cart SET  quantity = '$qty' , price = '$price' , total_amount = '$total' WHERE user_id = '$user_id' AND product_id = '$pid'";
	$run_query = mysqli_query($con, $sql);
	if($run_query){
		echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Updated Successfully...!</b>
				</div>
			";
	}
	
}


?>