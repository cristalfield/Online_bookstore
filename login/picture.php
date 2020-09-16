<?php 
    	include('../database/connection.php');
		$mail=$_SESSION['mail'];
        $display="SELECT `profile_picture` FROM `customer` WHERE `email`='$mail'";
        $fetch=mysqli_query($connect,$display) or die(mysqli_error($connect));
        $rows=mysqli_fetch_array($fetch);
        $file_name_new=$rows['0'];
?>