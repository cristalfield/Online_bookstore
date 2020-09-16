<?php 
    include('../database/url.php');
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>online book store</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>

		<script type="text/javascript" src="../js/swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.xml_file = "../slider/photo_list.xml";
			var params = {};
			params.wmode = "transparent";
			var attributes = {};
			attributes.id = "slider";
			swfobject.embedSWF("../slider/flash_slider.swf", "flash_grid_slider", "440", "220", "9.0.0", false, flashvars, params, attributes);
		</script>    
</head>
<body>

<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<h1><a href="#">Book store</a></h1>
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../Home/home.php" class="current">Home</a></li>
                <li><a href="../books/books.php">Books</a></li>
                <li><a href="../login/login.php">Login</a></li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li><a href="../about_us/about.php">About Us</a></li>
                
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle">
    	<div id="mid_slider">
        	<div id="flash_grid_slider">
                <a rel="nofollow" href="http://www.adobe.com/go/getflashplayer">
                    <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                </a>
			</div>
        </div>
        <div id="mid_left">
            <div id="mid_title">
                Tip to visit our site	
            </div>
            <p>Welcome to online bookstore.The world's most largest online bookshop which gives you an online shopping cart system with end to end protection </p>
            <div id="learn_more"><a href="#">Learn More</a></div>
	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    	
        <div class="col_w900">
            	<div class="con_tit_01">News feed</div>
                <img src="../images/toop.png" alt="Image 01" class="image_wrapper image_fl" />
                <p><em>The largest shopping cart for bookstore.Users are provided with large number of original book pdf at low cost. </em></p>
            <p align="justify">User can communicate with adminstrator department with the provided email.All the credits goes to <a rel="nofollow" href="../about_us/about.php">About us</a> the icons are from google icon <a rel="nofollow" href="https://www.flaticon.com/categories/web">Icons</a> for photos, and <a rel="nofollow" href="https://google.co.in">Google</a> for any other picture or images which are used in our site are also from google. </p>
            <p align="justify"> The encryption security sha1 is used to protect the user informations and their banking details. Thank you for visiting <a rel="nofollow" href="http://localhost/online_bookstore/Home/home.php" title="Online Bookstore"><b><span class="orange">Online</span><span class="green">Bookstore</span></b></a> website.</p><br>
            <h4><i>follow us on:</i></h4>
            <img src="../images/facebook.png" height="30px" width="30px" style="cursor: pointer;">	
            <img src="../images/twitter.png" height="30px" width="30px" style="cursor: pointer;">
            <img src="../images/youtube.png" height="30px" width="30px" style="cursor: pointer;">
            <img src="../images/linkedin.png" height="30px" width="30px" style="cursor: pointer;">
            <img src="../images/pinterest.png" height="30px" width="30px" style="cursor: pointer;">
              <div class="cleaner"></div>
            </div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
        Copyright © 2017 <a href="#">Online bookstore</a> 
	</div>
</div>

</body>
</html>