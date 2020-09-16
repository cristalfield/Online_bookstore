<?php 
include('../database/connection.php');
if(isset($_REQUEST) && isset($_REQUEST['submit']))
{
    $name=$_REQUEST['name'];
    $mail=filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL);
    $subject=$_REQUEST['subject'];
    $message=$_REQUEST['text'];
   
        if($mail)
        {
             if(!empty($name) && !empty($subject) && !empty($message))
                {
                    $guest="INSERT INTO `guest`(guest_name,email,subject,message) VALUES('$name','$mail','$subject','$message')";
                    $query=mysqli_query($connect,$guest) or die(mysqli_error($connect));
                    if($query)
                    {
                        ?>
                        <script type="text/javascript">
                            if(window.confirm("Reqest send!"))
                            {
                                window.location='../Home/home.php';
                            }
                        </script>
                        <?php
                    }
                    else
                    {
                        echo ('<script>window.alert("404 Error!!");</script>');
                    }
                }
                else
                {
                    echo ('<script>window.alert("All fields are Requered"); </script>');
                }
        }
        else
        {
            echo ('<script>window.alert("Invalid Email!! please enter a correct mail id"); </script>');
        }
    
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact us</title>
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
    
    <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" />    
    
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#map a').lightBox();
    });
    </script>
<style type="text/css">
      .txt{
    padding: 10px 30px;
    border-radius: 12px;
    border:1px solid;
    }
    .link{
    display: block;
    background: peru;
    padding: 15px 20px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    border:none;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;
  }
    </style> 
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
                <li><a href="../contact/contact.php" class="current">Contact</a></li>
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
                Contact Information	
          </div>
            <p>Praesent nunc urna, mattis lobortis hendrerit at, bibendum eu enim. Maecenas ligula tellus, volutpat et auctor at, iaculis ultricies ligula. Cras eu nunc in sem cursus auctor. Vestibulum ante ipsum primis in faucibus orci luctus et. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> and <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
            <div id="learn_more"><a href="#">Learn More</a></div>
	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    	<h3><b>Contact Us:</b></h3><hr>
        <h4><u><b>Mobile number:</b></u> &nbsp;&nbsp;&nbsp;8017414680</h4> 
        <h4><u><b>Address:</b></u>&nbsp;&nbsp;&nbsp;Future Institute Of Engeering And Management,Sonarpur,Kolkata:700150</h4>
        <h4><u><b>Email:</b></u>&nbsp;&nbsp;&nbsp;bookstore@gmail.com</h4>
        <hr><br><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1843.7332903821555!2d88.39037875553142!3d22.449094343151593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027192717b8ee5%3A0xe1322288e838606f!2sFuture+Institute+Of+Engineering+And+Management!5e0!3m2!1sen!2sin!4v1510254288927" width="900" height="500" frameborder="5" style="border:none;border-radius: 10px"></iframe>

    	<div class="cleaner"></div><hr>
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