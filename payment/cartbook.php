<?php
	include('../database/session.php');
	include('../database/connection.php');
	$user=$_SESSION['mail'];
	$after="SELECT `cover`,`book_name`,`book_author`,`download_link` FROM `download` WHERE `user`='$user'";
	$queue=mysqli_query($connect,$after) or die(mysqli_error($connect));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Downloads</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
</head>
<body>
<form method="post">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
    Template 2047 Brown Field
    by www.tooplate.com 
-->
<title>Cart</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/hello.css">
<link rel="stylesheet" type="text/css" href="../css/extra.css">
</head>
<body>
<form method="post">
<div id="tooplate_wrapper">

    <div id="tooplate_header">
        <div id="site_title">
            <img src="../images/tooplate_logo.png" height="50">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="cartbook.php" class="current">Downloads</a></li>
                <li><a href="../login/user.php">Back</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>       
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle"><br>
                <h2><b>Downloads </b><img src="../images/log.jpg" align="center" height="220" width="540"></h2>
            
            
            
        <div class="cleaner"></div>
    </div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
            <table align="center">
                <tr>
                	<th width="200" style="font-size: 20px">Book Cover</th>
                    <th width="200" style="font-size: 20px">Name</th>
                    <th width="200" style="font-size: 20px">Book Author</th>
                    <th width="200" style="font-size: 20px">Service</th>
                    
                </tr>
            </table><hr>
            <?php 
            	while($fet=mysqli_fetch_array($queue))
            	{
            ?>
            <table align="center">
            	<tr>
            		<td align="center" height="150" width="200"><img src="../book/image/<?php echo $fet['0'];?>" height="120px" width="90px" class="default"></td>
            		<td align="center" width="200"><h3><?php echo $fet['1'];?></h3></td>
            		<td align="center" width="200"><h3><?php echo $fet['2'];?></h3></td>
            		<td align="center" width="200"><a href="<?php echo $fet['3']; ?>" target="_blank"><b class="link" style="font-size: 15px">Download</b></a></h4></td>
            	</tr>
            </table><hr>
            <?php
            	}
            ?>
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->

<div id="tooplate_footer_wrapper">
    <div id="tooplate_footer">
        © 2017<a href="#">Online book store</a> 
    </div>
</div>
</form>
</body>
</html>
