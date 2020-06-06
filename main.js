$(document).ready(function() {	

	cat();	//calling the categories function
	brand();	//calling the brand function
	prod();	//calling the products function
	
//Getting Categories Tab with Ajax Request
	function cat(){		//Creating Cat Function.
		$.ajax({
			url		:	"action.php",	//Sending request to action.php page
			method	:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);	//Fetching id(get_category) from index.php 
		}
	})

}
//Getting Brands Tab with Ajax Request
	function brand(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
		}
	})

}
//Getting Products with Ajax Request
	function prod(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
		}
	})

}
//Getting Selected Categories
	$("body").delegate(".category","click",function(event) { //when category is clicked anonymous func is called
	event.preventDefault(); //prevents refreshing of the page
	var cid = $(this).attr('cid');	/*html attribute*/
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{get_selected_category:1,cat_id:cid}, 
				success	:	function(data){
					$("#get_product").html(data);
			}
		})
})
//Getting Selected Brands
	$("body").delegate(".brand","click",function(event) { //when brand is clicked anonymous func is called
	event.preventDefault(); //prevents refreshing of the page
	var bid = $(this).attr('bid');	/*html attribute*/
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{get_selected_brand:1,brand_id:bid}, 
				success	:	function(data){
					$("#get_product").html(data);
			}
		})
})
//Searching Products
	$("#search_button").click(function(){	//SearchButton ID
		var keyword = $("#search").val();	//SearchBox (Textbox ID) 
		if(keyword !=""){
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{search:1,keyword:keyword}, 
					success	:	function(data){
						$("#get_product").html(data);
				}
			})
		}
	
	})
	
	
	
//Signup Form
	$("#signup_button").click(function(event){
		event.preventDefault();
			$.ajax({
					url		:	"register.php",
					method	:	"POST",
					data	:	$("form").serialize(), /*Sending form data*/
					success	:	function(data){
						$("#signup_msg").html(data);	//Taking Id Customer_Registration Page
				}
			})
		})
//Login Form
	$("#login").click(function(event){
		event.preventDefault();
		var email = $("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url		:	"login.php",
			method	:	"POST",
			data	:	{userLogin:1,userEmail:email,userPassword:pass},
			success	:	function(data){
				if(data == "true"){
					window.location.href = "profile.php";
				}
			}
		})
	})
//AddToCart	
	cart_count();
	$("body").delegate("#product","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
			$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{AddToCart:1,pid:p_id},
				success	:	function(data){
					$("#cart_msg").html(data);
					cart_count();
			}
		})
	})
	
	cart_container();
	function cart_container() {
		
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{get_cart_product:1},
				success	:	function(data){
					$("#cart_product").html(data);
			}
		
	})
	};
	function cart_count() {
		
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{cart_count:1},
				success	:	function(data){
					$(".badge").html(data);
			}
		
	})
		
	}
//offer products
//AddToCart	
	cart_count();
	$("body").delegate("#product","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
			$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{AddToCart:1,pid:p_id},
				success	:	function(data){
					$("#cart_msg").html(data);
					cart_count();
			}
		})
	})
	
	cart_container();
	function cart_container() {
		
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{get_cart_product:1},
				success	:	function(data){
					$("#cart_product").html(data);
			}
		
	})
	};
	function cart_count() {
		
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{cart_count:1},
				success	:	function(data){
					$(".badge").html(data);
			}
		
	})
		
	}
	
	
//cart_container
	$("#cart_container").click(function(event){
		event.preventDefault();
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{get_cart_product:1},
				success	:	function(data){
					$("#cart_product").html(data);
			}
		})
	})
	
//cart_checkout (displaying the cart products dynamically)
	cart_checkout();	//calling the cart_checkout function
	function cart_checkout(){
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{cart_checkout:1},
				success	:	function(data){
					$("#cart_checkout").html(data);
			}
		})
	}
	
//calculating cart (quantity & price)
	$("body").delegate(".qty","keyup",function(){
		var pid = $(this).attr("pid");
		var qty = $("#qty-"+pid).val();	//qty id + pid
		var price = $("#price-"+pid).val();	//price id + pid
		var total = qty * price;	//multiplying quantity with price
		$("#total-"+pid).val(total);//displaying the total amount in total_amount column
	})
//removing product from the cart
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("remove_id");
			$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{remove_from_cart:1,remove_id:pid},
				success	:	function(data){
					$("#cart_msg").html(data);
					cart_checkout();	//calling the cart_checkout function for not refreshing again and again
			}
		})
	})
//updating the cart
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var pid = 	$(this).attr("update_id");
		var qty = 	$("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = $("#total-"+pid).val();
				$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{update_cart:1,update_id:pid,qty:qty,price:price,total:total},
				success	:	function(data){
					$("#cart_msg").html(data);
					cart_checkout();
			}
		})
	})
//pagination 
	page();
	function page(){
		$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{page:1},
				success	:	function(data){
					$("#pageno").html(data);
			}			
		})
	}
	
//redirect on second page
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
			$.ajax({
				url		:	"action.php",
				method	:	"POST",
				data	:	{getProduct:1,setPage:1,pageNumber:pn},
				success	:	function(data){
					$("#get_product").html(data);
			}			
		})
	})

	
})