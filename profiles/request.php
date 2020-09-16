<?php
include('../database/session.php');
include('../database/connection.php');
include('../login/picture.php');
if(isset($_REQUEST) && !empty($_REQUEST['send']))
{
    $match=$_POST['match'];
    $message=$_POST['message_to_admin'];
    $namee=$_SESSION['customer'];
    if($mail==$match)
    {
        $request=mysqli_query($connect,"INSERT INTO `request` (requested_user,requested_name,user_message) VALUES('$match','$namee','$message')") or die(mysqli_error($connect));
        if($request)
        {
            echo ('<script type="text/javascript">
                    confirm("Request sent successfully!!");
                 </script>');
            header('refresh: 3,url=../login/user.php');
            exit();
        }
        else
        {
            echo "not ok";
        }
    }
    else
    {
        echo "not ok";
    }
}
elseif (isset($_REQUEST) && !empty($_REQUEST['reset'])) 
{
    $_POST['match']="";
    $_POST['message_to_admin']="";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
    
-->
<title>User profile</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href="../css/user.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
<style type="text/css">
    .txt{
    padding: 10px 30px;
    border-radius: 12px;
    border:1px solid;

}
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<img src="../images/tooplate_logo.png">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="request.php" class="current">Request</a></li>
                <li><a href="../login/user.php">Back</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle"><br>
    	<h2><b>Send Request</b><img src="../images/giphy.gif" height="220" width="540"></h2>
        
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    
    		<div class="col_w900 col_w900_last">
                <div class="con_tit_02"><u>Request a book as per your requirement:</u></div><br><br>
            	<table align="center">
                 <tr> 
                     <td><b>Name : </b></td>
                     <td><input class="txt" type="text" name="" value="<?php echo $_SESSION['customer']?>" class="r_name"></td>
                 </tr>  
                 <tr>
                     <td><b>Email_Id : </b></td>
                     <td><input class="txt" type="text" name="match" class="r_id" required="required" placeholder="Enter your mail"></td>
                 </tr> 
                 <tr>
                     <td><b>Message : </b></td>
                     <td><textarea class="txt" rows="10" cols="50" name="message_to_admin" placeholder="Your message"></textarea></td>
                 </tr>
                 <tr>
                     <td><input type="submit" name="send" value="Send" class="bttn"/></td>
                     <td align="right"><input type="submit" name="reset" value="Reset" class="bttn"/></td>
                 </tr>
                </table><br><br>
            </div>
    	
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