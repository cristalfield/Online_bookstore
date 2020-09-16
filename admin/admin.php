<?php
include('../database/session.php');
include('../database/connection.php');
if(isset($_SESSION['user'])==""){
    header('location:../login/login.php');
}
if(isset($_REQUEST) && isset($_REQUEST['add_book'])){
    header('location:add_book.php');
}
if(isset($_REQUEST) && isset($_REQUEST['add_cat'])){
    header('location:addcat.php');
}
if(isset($_REQUEST) && isset($_REQUEST['add_admin'])){
    header('location:add_admin.php');
}
if(isset($_REQUEST) && isset($_REQUEST['comments'])){
    header('location:comment.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
	Template 2047 Brown Field
	by www.tooplate.com 
-->
<title>Admin</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="post">
<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<img src="../images/admn.png" width="200" height="80">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../Home/home.php" class="current">Home</a></li>
                
                <li><a href="../login/logout.php" onclick="logout()">Logout</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle"><br>
    	
        
            <h2><b>Welcome Admin <?php echo $_SESSION['user']; ?></b><img src="../images/ad.png" height="230" width="280"></h2>         
            
	  	
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    <?php
        $query1="SELECT count(request_id) FROM `request`";
        $exe=mysqli_query($connect,$query1) or die(mysqli_error($connect));
        $array=mysqli_fetch_array($exe);
    ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <marquee style="font-size: 20px;color: brown;" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="12" behavior="alternate" width="80%">
        You have <?php echo $array['0']; ?> new request..<a href="comment.php">Click here</a> to view
    </marquee>
    
        <hr>
    		<div class="col_w900 col_w900_last">
            	<div class="col_allw280 fp_service_box">
                	<div class="con_tit_02">Add new book</div>
                    <img src="../images/new_book.jpg" alt="Add new book" height="70px" width="65px" />
                    <p>Add new books please click on add.<br/><br/></p>
					<!--<a class="more" href="#">Detail</a>-->
                    <a href="add_book.php"><input type="submit" name="add_book" value="Add new book" class="bttn"></a>
                </div>
          		<div class="col_allw280 fp_service_box">
                	<div class="con_tit_02">Add category</div>
                    <img src="../images/maincat.png" alt="REmove boks" height="70px" width="65px" />
                    <p>Remove books which are priviously inserted <br /><br /></p>
                    <input type="submit" name="add_cat" value="Add category" class="bttn">
                </div>
                <div class="col_allw280 fp_service_box col_last">
                	<div class="con_tit_02">Commands</div>
                    <img src="../images/del_com.png" alt="delete commands" height="70px" width="65px" />
                    <p>Delete spam commands <br /><br /><br /></p>
                    <input type="submit" name="comments" value="Comments" class="bttn">
                </div>
                <div class="cleaner h60"></div>
          		<div class="col_allw280 fp_service_box col_last">
                	<div class="con_tit_02">Add new admin</div>
                    <img align="right" src="../images/add_admin.png" alt="image 19" height="70px" width="65px" />
                    <p>Add new authentic admin <br /><br /><br /></p>
                    <input type="submit" name="add_admin" value="Add admin" class="bttn">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="../images/ch.png" width="400" height="150">
                <div class="cleaner h30"></div>
                <div class="cleaner"></div><hr>
            </div>
    	
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->
</form>
<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
        © 2017<a href="#">Online book store</a> 
	</div>
</div>

</body>
</html>