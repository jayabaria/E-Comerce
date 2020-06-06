<?php
include "includes/db.php";	//connection

session_start();	//Session start

if(isset($_POST["userLogin"])){
	$email = mysqli_real_escape_string($con,$_POST["userEmail"]);	/*protects */
	$password = md5($_POST["userPassword"]);	/*hashing algorithm*/
	$sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["cust_id"];
		$_SESSION["name"] = $row["firstname"];
			echo "true";
		}
	
}

?>