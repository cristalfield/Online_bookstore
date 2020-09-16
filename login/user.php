<?php   
    include('../database/session.php');
    include('../database/connection.php');
    include('picture.php');
    if($_SESSION['customer']=="" && $_SESSION['mail']=="")
        {
           header('location:login.php');
        }
    if(isset($_REQUEST) && !empty($_REQUEST['update']))
        {
           header('location:../profiles/user_pro.php');
        }
    if(isset($_REQUEST) && !empty($_REQUEST['command']))
    {
           header('location:../profiles/request.php');
    }
    if(isset($_REQUEST) && !empty($_REQUEST['view_book']))
    {
           header('location:../profiles/viewbook.php');
    }
    if(isset($_REQUEST) && !empty($_REQUEST['cart']))
    {
           header('location:../profiles/cart.php');   
    }
    if(isset($_REQUEST) && !empty($_REQUEST['list']))
    {
           header('location:../payment/cartbook.php');
    }
       
        $mail=$_SESSION['mail'];
        $display="SELECT `profile_picture` FROM `customer` WHERE `email`='$mail'";
        $fetch=mysqli_query($connect,$display) or die(mysqli_error($connect));
        $rows=mysqli_fetch_array($fetch);
        $file_name_new=$rows['0'];
     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
    
--> 
<title>User</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href="../css/user.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
</head>
<body>
<form>
<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<img src="../images/tooplate_logo.png" height="50">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../login/user.php" class="current">Profile</a></li>
                <li><a href="../Home/home.php">Home</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle">
    	
        <div id="mid_left">
            <div id="mid_title">
                <?php echo "Welcome"."&nbsp;".$_SESSION['customer']; ?>	<br>
                <?php echo '<img src="../profiles/uploads/'.$file_name_new.'" height="150px" width="150px" align="left" name="default" class="default" style="border-radius:50%">'; ?> 
            </div>
            <p style="font-size: 16px">
                A user is a person who uses a computer or network service. Users generally use a system or a software product without the technical expertise required to fully understand it.


            </p>
            <div id="learn_more"><a href="">learn more..</a></div>
	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
        <hr><br>
    		<div class="col_w900 col_w900_last">
            	<div class="col_allw280 fp_service_box">
                	<div class="con_tit_02">New books</div>
                    <img src="../images/new.png" alt="Add new book" height="70px" width="65px" />
                    <p>Click to view the latest books update<br/><br/><br></p>
					<!--<a class="more" href="#">Detail</a>-->
                    <input type="submit" name="view_book" value="View books" class="bttn">
                </div>
          		<div class="col_allw280 fp_service_box col_last">
                    <div class="con_tit_02">&nbsp;&nbsp;Cart</div>
                    <img src="../images/crt.png" alt="image 19" height="70px" width="65px" />
                    <p>View you added items from cart, place order <br /><br /><br /></p>
                    <input type="submit" name="cart" value="Cart" class="bttn"/>
                </div>
                <div class="col_allw280 fp_service_box col_last">
                	<div class="con_tit_02">Request</div>
                    <img src="../images/com.png" alt="delete commands" height="70px" width="65px" />
                    <p>Send the request for new books as per your requirements<br /><br /><br /></p>
                    <input type="submit" name="command" value="Request" class="bttn">
                </div>
                <div class="cleaner h60"></div>
          		<div class="col_allw280 fp_service_box">
                	<div class="con_tit_02">Download list</div>
                    <img src="../images/download.png" alt="invoice copy" height="70px" width="65px" />
                    <p>Get the list of your downloaded books <br /><br /><br /></p>
                    <input type="submit" name="list" value="Lists" class="bttn">
                </div>
          		<div class="col_allw280 fp_service_box col_last">
                	<div class="con_tit_02">Update profile</div>
                    <img src="../images/add_admin.png" alt="image 19" height="70px" width="65px" />
                    <p>Update your profile as per as &nbsp; your requirements <br /><br /><br /></p>
                    <input type="submit" name="update" value="Update" class="bttn"/>
                </div>
                <div class="cleaner h30"></div>
                <div class="cleaner"></div><hr>
            </div>
    
    	
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