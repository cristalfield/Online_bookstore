<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="bookstore";
	$connect=mysqli_connect($server,$username,$password,$database);
	if($connect)
	{
		//success
	}
	else
	{
		die("connection failed".mysqli_connect_error());
	}
?>