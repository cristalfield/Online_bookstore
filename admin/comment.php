<?php
include('../database/session.php');
include('../database/connection.php');
if(isset($_SESSION['user'])=="")
{
    header('location:../login/login.php');
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
<link rel="stylesheet" type="text/css" href="../css/hello.css">
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
<style type="text/css">
    .req{
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
        overflow: hidden;
        outline:none;
    }
</style>

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
</head>
<body>
<form method="POST">
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
    	
	  	<br>
            <h3><b>User comments</b><img src="../images/cmntt.jpg" height="220" width="440"></h3>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
            <h3>List of Comments or Requests:</h3><hr>
                <?php
                        $comment="SELECT *FROM `request` ORDER BY `request_id` DESC LIMIT 5";
                        $execute=mysqli_query($connect,$comment) or die(mysqli_error($connect));
                        if(mysqli_num_rows($execute)!=0)
                        {
                            while($array=mysqli_fetch_array($execute))
                            {
                                $mail=$array['1'];
                                $display="SELECT `profile_picture` FROM `customer` WHERE `email`='$mail'";
                                $fetch=mysqli_query($connect,$display) or die(mysqli_error($connect));
                                $rows=mysqli_fetch_array($fetch);
                                $file_name_new=$rows['0'];
                                ?>
                                <table>
                                <tr>
                                        <td><?php echo '<img src="../profiles/uploads/'.$file_name_new.'" height="70px" width="70px" align="left" name="default" class="default">'; ?> </td>
                                </tr>
                                <tr>
                                    
                                    <td><h3>By <?php echo $array['2']; ?></h3></td>
                                    <td><h5>&nbsp;&nbsp;&nbsp;(<u><?php echo $array['1']; ?></u>)</h5></td>
                                </tr>
                                </table>
                                <table>
                                <tr>
                                    <td width="450"><br><h4><b>Ques:</b>&nbsp;&nbsp;<?php echo $array['3']; ?></h4></td>
                                    <td width="350" align="right"><button class="req" name="id" value="<?php echo $array['request_id']; ?>"><img src="../images/dell.png" height="30px" width="30px" style="cursor: pointer;"></button></td>
                                </tr>
                                </table><hr>
                                <?php
                                
                            }
                            if(isset($_POST) && isset($_POST['id']))
                                {
                                   $reqq=$_POST['id'];
                                   $delete="DELETE FROM `request` WHERE `request_id`='$reqq'";
                                   $del=mysqli_query($connect,$delete) or die(mysqli_error($connect));
                                   if($del)
                                   {
                                        echo ('<script> alert("Request deleted successfully!!") </script>');
                                        header('Refresh: 1,url=comment.php');
                                        exit();
                                   }
                                   else
                                   {
                                        echo ('<script> alert("404 Error!!") </script>');
                                   }
                                }
                        }
                        else
                        {
                            ?><br><br><br>
                            <table align="center">
                                <tr>
                                    <td height="60" width="500" align="center"><h3>No comments yet!!</h3></td>
                                </tr>
                            </table><br><br><br><hr>
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