<?php 
    include('../database/session.php');
    include('../database/connection.php');
    include_once('../login/picture.php');
    include('percnt.php');
    if($_SESSION['mail']=="" && $_SESSION['customer']=="")
    {
        header('location:../login/login.php');
    }
    $mail=$_SESSION['mail'];
    $status=mysqli_fetch_array(mysqli_query($connect,"SELECT `status` from `customer` where `email`='$mail'"));
    $array1=$status['status'];
    if(isset($_REQUEST) && !empty($_POST['update_profile']))
    {   
        //upload images
        if(isset($_POST['update_profile']))
            {
                if($array1==0)
                {
                    $file=$_FILES['file'];
                    $file_name=$_FILES['file']['name'];
                    $file_tmp=$_FILES['file']['tmp_name'];
                    $file_size=$_FILES['file']['size'];
                    $file_type=$_FILES['file']['type'];
                    $file_error=$_FILES['file']['error'];
                    $file_ext=explode('.',$file_name);
                    $actual_ext=strtolower(end($file_ext));
                    $allowed=array('jpg','png','jpeg');
                    if(in_array($actual_ext,$allowed))
                    {
                        if($file_error==0)
                        {
                            if($file_size< 1000000)
                            {
                                $file_name_new= uniqid('',true).".". $actual_ext;
                                $file_dest='uploads/'.$file_name_new;
                                move_uploaded_file($file_tmp,$file_dest);
                                $insert="UPDATE `customer` SET `profile_picture`='$file_name_new',`status`='1' WHERE `email`='$mail'";
                                $query=mysqli_query($connect,$insert) or die(mysqli_error($connect)); 
                            }
                            else
                            {
                                echo "The file size is too large to upload";
                            }
                        }
                        else
                        {
                            echo "There some problem in your file uploading";
                        }
                    }
                    else
                    {
                        echo "your cannot upload this type of file";
                    }
                }
                
                
            }
            else
                {
                    $display="SELECT `profile_picture` FROM `customer` WHERE `email`='$mail'";
                    $fetch=mysqli_query($connect,$display) or die(mysqli_error($connect));
                    $rows=mysqli_fetch_array($fetch);
                    $file_name_new=$rows['0'];
                }
               
        //requesting data from user

        $fullname=$_POST['fullname'];
        $birth=$_POST['dob'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $pin=$_POST['pincode'];
        $state=$_POST['state'];
 
        //inserting data into database update

        $sql="UPDATE `customer` SET `full_name`='$fullname',`date_of_birth`='$birth',`gender`='$gender',`address`='$address',`city`='$city',`pin_code`='$pin',`state`='$state' WHERE `email`='$mail'";
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
        if($result)
        {
            echo ('<script type="text/javascript">
                    alert("Profile updation complete....");
                  </script>');
            header('refresh: 3,url=../login/user.php');
        }
        else
        {
            echo "failed";
        }
            
            
    
    }
    else
                {   
                    $display="SELECT `profile_picture` FROM `customer` WHERE `email`='$mail'";
                    $fetch=mysqli_query($connect,$display) or die(mysqli_error($connect));
                    $rows=mysqli_fetch_array($fetch);
                    $file_name_new=$rows['0'];
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
		<script type="text/javascript" src="../js/admin.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.xml_file = "../slider/photo_list.xml";
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
<form method="post" enctype="multipart/form-data">
<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<img src="../images/tooplate_logo.png">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="user_pro.php" class="current">Update</a></li>
                <li><a href="../login/user.php">Back</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle">
    	
        <div id="mid_left">
            <div id="mid_title">
                <?php echo "Update your profile "."&nbsp;".$_SESSION['customer']; ?>	<br>
                
               <?php echo '<img src="uploads/'.$file_name_new.'" height="150px" width="150px" align="left" name="default" class="default" style="border-radius:50%">'; ?> 
            </div>
        <h1>profile
    <?php 
    echo $percentage;
    ?>% complete</h1>

	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    <?php
    $select="SELECT `full_name`,`date_of_birth`,`address`,`city`,`pin_code`,`state` FROM `customer` WHERE `email`='$mail'";
    $query1=mysqli_query($connect,$select) or die(mysqli_error($connect));
    ?>
    		<div class="col_w900 col_w900_last">
                <div class="con_tit_02"><u>Update your profile with basic informations:</u></div><br><br>
            	<table align="center" style="font-family: verdana;font-size: 16px">
                <?php 
                    while($fetch1=mysqli_fetch_array($query1))
                    {
                
                ?><tr>
                     <td><b>Full name :</b></td>
                     <td><input class="txt" type="text" name="fullname" placeholder="Enter your full name" value="<?php echo $fetch1['0']; ?>"></td>
                 </tr>
                 <tr>
                     <td><b>Date of birth :</b></td>
                     <td><input class="txt" type="Date" name="dob" value="<?php echo $fetch1['1']; ?>"></td>
                 </tr>  
                 <tr>
                     <td><b>Gender :</b></td>
                     <td><input class="txt" type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female</td>
                 </tr>
                 <tr>
                     <td><b>Address :</b></td>
                     <td><input type="text" class="txt" name="address" placeholder="Enter your address" value="<?php echo $fetch1['2']; ?>"></td>
                 </tr> 
                 <tr>
                     <td><b>City :</b></td>
                     <td><input type="text" class="txt" name="city" placeholder="Enter your city" value="<?php echo $fetch1['3']; ?>"></td>
                 </tr>  
                 <tr>
                     <td><b>Pin code :</b></td>
                     <td><input type="number" class="txt" name="pincode" placeholder="Enter pin code number" value="<?php echo $fetch1['4']; ?>"></td>
                 </tr>
                 <tr>
                     <td><b>State :</b></td>
                     <td>
                        <select value="<?php echo $fetch1['5']; ?>" name="state" class="txt">
                            <option>select state</option>
                            <option>West Bengal</option> 
                        </select>
                     </td>
                 </tr>
                 <?php
                 }
                 ?> 
                 <tr>
                     <td><b>Upload profile picture :</b></td>
                     <td><input class="txt" type="file" name="file"></td>
                 </tr>
                </table><br>
                <hr>
                <table align="center">
                    <tr>
                        <td width="100"><input type="submit" align="center" name="update_profile" value="update profile" class="link"></td>
                    </tr>
                </table><br>

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