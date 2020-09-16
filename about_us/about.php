<?php
    include('../database/url.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>About us</title>
<meta name="keywords" content="" /> 
<meta name="description" content="" />
<link href="../css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>	
<link rel="stylesheet" type="text/css" href="../css/about_us.css">
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
        	<h1><a href="#">Brown Field</a></h1>
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../Home/home.php">Home</a></li>
                <li><a href="../books/books.php">Books</a></li>
                <li><a href="../login/login.php">Login</a></li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li><a href="../about_us/about.php" class="current">About Us</a></li>
                
                
                
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
                About Our Company	
            </div>
            <p>By giving the full readers view,we love to communicate with thousands of readers.Our goal is to provide the best accomodations by providing the large number of books to the end users who are being loved. </p>
            <div id="learn_more"><a href="#">Learn More</a></div>
	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main"><h2 style="font-family: times" align="center"><b>About Us</b></h2><hr>
    	<table border="0" align="center">
         <tr>
             <td height="320" width="400" align="center"><img class="pic" src="pictures/aritra.jpg" height="150" width="150"/>
             <h3 style="font-family: verdana"><b>Aritra Banerjee</b></h3> 
             <h4>PHP Developer</h4> 
             <button class="loginBtn loginBtn--facebook">
             Facebook
             </button>
             <button class="loginBtn loginBtn--google">
             Google
             </button>
             </td>
             <td align="center" height="320" width="400"><img class="pic" src="pictures/dey.jpg" height="150" width="150">
             <h3 style="font-family: verdana"><b>Subhajit Dey</b></h3>
             <h4>PHP Developer</h4>
             <button class="loginBtn loginBtn--facebook">
             Facebook
             </button>
             <button class="loginBtn loginBtn--google">
             Google
             </button>
             </td>
         </tr>   
         <tr>
             <td align="center" height="320" width="400"><img class="pic" src="pictures/rimi.jpg" height="150" width="150">
             <h3 style="font-family: verdana"><b>Soumita Sarkar</b></h3>
             <h4>PHP Developer</h4>
             <button class="loginBtn loginBtn--facebook">
             Facebook
             </button>
             <button class="loginBtn loginBtn--google">
             Google
             </button>
             </td>
             <td align="center" height="320" width="400"><img class="pic" src="pictures/subhajit.jpg" height="150" width="150">
             <h3 style="font-family: verdana"><b>Subhajit Bhattacharya</b></h3>
             <h4>PHP Developer</h4>
             <button class="loginBtn loginBtn--facebook">
             Facebook
             </button>
             <button class="loginBtn loginBtn--google">
             Google
             </button>
             </td>
         </tr>
        </table><hr>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
        Copyright © 2048 <a href="#">Company Name</a> 
	</div>
</div>

</body>
</html>