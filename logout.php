<?php

session_start();	//session started

unset($_SESSION["uid"]);	//unsetting user_id

unset($_SESSION["name"]);	//unsetting name

header("location:index.php");	//if session is not started then he will be redirected to index.php



?>