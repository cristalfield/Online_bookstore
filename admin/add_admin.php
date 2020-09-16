<?php
include('../database/session.php');
include('../database/connection.php');
if(isset($_SESSION['user'])==""){
    header('location:../login/login.php');
}
if(isset($_REQUEST) && !empty($_REQUEST['add_admin'])){
    $admin=$_POST['admin_name'];
    $mail=filter_var($_POST['admin_email'],FILTER_VALIDATE_EMAIL);
    $password=sha1(sha1(md5($_POST['admin_passwd'])));
    $check_pw=sha1(sha1(md5($_POST['repeat_pw'])));
    if($password==$check_pw){
        $insert="INSERT INTO `admin`(admin_mail,admin_name,password) VALUES('$mail','$admin','$check_pw')";
        $execute=mysqli_query($connect,$insert) or die(mysqli_error($connect));
        if($execute){

            ?>
            <script type="text/javascript">
                if(window.confirm("Admin added successfully"))
                    {
                        window.location='../admin/admin.php';
                    }                                       
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
                window.alert("404 Error!!");
            </script>
            <?php
        }
    }else
    {
        ?>
        <script type="text/javascript">
            window.alert("Password did not matched");
        </script>
        <?php
    }
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

		<script type="text/javascript" src="../js/admin.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.xml_file = "photo_list.xml";
			var params = {};
			params.wmode = "transparent";
			var attributes = {};
			attributes.id = "slider";
			swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "440", "220", "9.0.0", false, flashvars, params, attributes);
		</script> 
        <style type="text/css">
            .txt{
                padding: 10px 30px;
                border-radius: 12px;
                border:1px solid;
                }
        </style>   
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
                
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle">
    	<div id="mid_left"><br>
            <h3><b>Add Admin</b><img src="../images/admn.jpg" height="220" width="440"></h3>
        
        <div class="cleaner"></div>
    </div> <
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
        <h3><b><u>Enter the new admin details:</u></b></h3>
    		<table align="center">
                <tr>
                    <td style="font-size: 18px" height="30"><b>Enter admin name: </b></td>
                    <td><input class="txt" type="text" name="admin_name" placeholder="Name"></td>
                </tr>  
                <tr>
                    <td style="font-size: 18px" height="30"><b>Enter E_mail: </b></td>
                    <td><input class="txt" type="text" name="admin_email" placeholder="Email"></td>
                </tr>   
                <tr>
                    <td style="font-size: 18px" height="30"><b>Enter password: </b></td>
                    <td><input class="txt" type="password" name="admin_passwd" placeholder="Password"></td>
                </tr> 
                <tr>
                    <td style="font-size: 18px" height="30"><b>Retype password: </b></td>
                    <td><input class="txt" type="password" name="repeat_pw" placeholder="Retype password"></td>
                </tr>
            </table><br><hr>
            <table align="center">
                <tr>
                    <td><input type="submit" name="add_admin" value="Add Admin" class="bttn"></td>
                </tr>
            </table>
    	
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