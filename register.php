<?php

include "includes/db.php";

$firstname = $_POST["firstname"];	//Firstname
$lastname = $_POST["lastname"];		//Lastname
$email = $_POST["email"];			//Email
$password = $_POST["password"];	    //Password
$repassword = $_POST["repassword"]; //Reenteredpassword
$mobile = $_POST["mobile"];			//MobileNo
$address1 = $_POST["address1"];		//Address 1
$address2 = $_POST["address2"];		//Address 2

//validation
$name = "/^[A-Z][a-zA-Z ]+$/"; // checks for uppercase[A-Z], lowercase[a-z] and space[""]
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/"; //checks for lowercase[a-z], underscore[_], numbers[0-9], dot[.], hifen[-] & attherate(@)
$number = "/^[0-9+]$/"; //checks numbers[0-9]

//Checking If The Fields Are Empty Or Not
if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address1) || empty($address2)){
	//HTML 5 Alert Class
	echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Please Fill All The Fields..!</b>
			</div>
	
	";
	
	exit();
}
else { //Checking Firstname
	if(!preg_match($name, $firstname)){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>First Name is not valid</b>
				</div>
			";
		exit();
	}
	//Checking Lastname
	if(!preg_match($name, $lastname)){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Last Name is not valid</b>
				</div>
			";
		exit();
	}
	//Checking Email
	if(!preg_match($emailValidation, $email)){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Email is not valid</b>
				</div>
			";
		exit();
	}
	//Checking Password
	if(strlen($password) < 8){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Password is Weak</b>
				</div>
			";
		exit();
	}
	//Comaparing Re-entered password with Password
	if($password != $repassword){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Password does not match ;(</b>
				</div>
			";
		exit();
	}
	//Checking MobileNo
	if(!preg_match($number, $mobile)){
		if(!(strlen($mobile) == 10)){
			
			echo "
					<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Please enter a 10 digit mobile number</b>
					</div>
				";
				exit();
		}
		
	}
	
//Checking for existing users
	$check = "SELECT cust_id FROM customers WHERE email = '$email' LIMIT 1";
	$check_query = mysqli_query($con, $check);
	$count = mysqli_num_rows($check_query);
	if($count > 0){
		echo "
				<div class='alert alert-danger'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Email Address already Registered :( Try with different Email</b>
				</div>
				";
			exit();
	}
	else{
		$password = md5($password);	//Using MD5 technique for securing customer password 
		$sql = "INSERT INTO `ecommerce`.`customers` (`cust_id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `address1`, `address2`)
		VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$mobile', '$address1', '$address2')";
		$run_query = mysqli_query($con, $sql);
		if($run_query){
			/*echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' >&times;</a><b>Your are Registered Successfully :)</b>
				</div>
				";*/
			echo"<script>alert('You have successfully registered! Continue to login :)')</script>";
			echo"<script>window.open('index.php','_self')</script>";
				
		}
	}
}	
	


?>