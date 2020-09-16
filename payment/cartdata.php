<?php
	include('../database/connection.php');
	$user_mail=$_SESSION['mail'];
	$store=array();
	$dataa="SELECT `cover`,`book_name`,`book_author`,`pathh` FROM `cart` WHERE `user_mail`='$user_mail'";
	$dis=mysqli_query($connect,$dataa) or die(mysqli_error($connect));
?>
