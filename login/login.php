<?php   
	include_once('../database/session.php');
	include('../database/connection.php');
	if(isset($_REQUEST) && !empty($_REQUEST['signin']))
	{	
		$request=$_POST['user'];
		$pass=sha1(sha1(md5($_POST['pass'])));
		if(isset($_REQUEST) && !empty($_REQUEST['user']) && !empty($_REQUEST['pass']))
		{	
			//user login...........................
			$sql1="SELECT `email`,`cus_password` FROM `customer` WHERE `email`='$request' AND `cus_password`='$pass'";
			$result1=mysqli_query($connect,$sql1) or die(mysqli_error($connect));
			$count1=mysqli_num_rows($result1);

			$sql="SELECT `admin_mail`,`password` FROM `admin` WHERE `admin_mail`='$request' AND `password`='$pass'";
			$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
			$count=mysqli_num_rows($result);
			if($count1==1)
			{
				$sql2="SELECT `customer_name`,`email`,`cus_password` from `customer` WHERE `email`='$request'";
				$result2=mysqli_query($connect,$sql2) or die(mysqli_error($connect));
				$count2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
				$_SESSION['customer']=$count2["customer_name"];
				$_SESSION['mail']=$count2["email"];
				$_SESSION['pass']=$count2["cus_password"];
				if(isset($_REQUEST['remember'])==1 || isset($_REQUEST['remember'])=='on')
				{
					$hour=time() + 3600 * 24;
					$cust=$_SESSION['customer'];
					$cusp=$_SESSION['pass'];
					setcookie('customer','$cust',$hour);
						setcookie('pass','$cusp',$hour);		
				}
				header('location:user.php');
			}
			elseif($count==1)
			{
				$sql4="SELECT `admin_name`,`password` FROM `admin` WHERE `admin_mail`='$request' AND `password`='$pass'";
				$fetch=mysqli_query($connect,$sql4) or die(mysqli_error($connect));
				$arry=mysqli_fetch_array($fetch);
				$_SESSION['user']=$arry['0'];
				$_SESSION['pass']=$arry['1'];
				if(isset($_REQUEST['remember'])==1 || isset($_REQUEST['remember'])=='on')
				{
					$hour=time() + 3600 * 24;
					$valid=$_SESSION['user'];
					$pass1=$_SESSION['pass'];
					setcookie('user','$valid',$hour);
						setcookie('pass','$pass1',$hour);
				}
				header('location:../admin/admin.php');
				exit();
			}
			else
			{
				echo ('<script type="text/javascript">
					confirm("Username/Password did not match!!");
				 </script>');
			}	
		}
		else
		{
			echo ('<script type="text/javascript">
					confirm("Password can not be empty!!");
				 </script>');
		}	
	}
	elseif(isset($_REQUEST) && !empty($_REQUEST['signup']))
	{
		$customer=mysqli_real_escape_string($connect,$_REQUEST['username']);
		$passwd=sha1(sha1(md5($_REQUEST['pwd'])));
		$pwd_match=sha1(sha1(md5($_REQUEST['pwd_match'])));
		$email=filter_var($_REQUEST['gmail'],FILTER_VALIDATE_EMAIL);
		$pic="user.png";
		$confirm=rand(0,9999);
		
		if(isset($_REQUEST) && !empty($_REQUEST['username']) && !empty($_REQUEST['pwd']) && !empty($_REQUEST['pwd_match']) && !empty($_REQUEST['gmail']))
			{	
				if($passwd==$pwd_match)
				{	
					//multiple data insert abortion

					$sql3="SELECT `email` from `customer` WHERE `email`='$email'";
					$result3=mysqli_query($connect,$sql3);
					$count3=mysqli_num_rows($result3);
					if($count3==0)
					{
						if($email)
						{
							$sql="INSERT INTO `customer`(customer_name,cus_password,email,confirmed,confirm_code,profile_picture,status)  VALUES('$customer','$passwd','$email','0','$confirm','$pic','0')";
							$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
							$_SESSION['username']=$customer;
							$_SESSION['value']=$confirm;
							header('location: auth.php?code='.$confirm.'');
							exit();
						}
						else
						{
							echo ('<script type="text/javascript">
							alert("Invalid Mail_id!!");
						 	</script>');
						}
					}
					else
					{
						echo ('<script type="text/javascript">
							alert("User already exists!!");
						 	</script>');
					}
				}
				else
				{
					echo ('<script type="text/javascript">
						alert("Password did not matched!!");
					 </script>');
				}
			}
			else
			{
				echo ('<script type="text/javascript">
						alert("Password required!!");
					 </script>');
			}	
	}
	
	if(isset($_SESSION['user']))
	{
		header('location:../admin/admin.php');
	}
	if(isset($_SESSION['customer']))
	{
		header('location:user.php');
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>login</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="../css/stylel.css">
      <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>

  
</head>

<body background="../images/2.jpg" style="background-size: 100%">
<form method="post"><br><br>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">EMAIL</label>
					<input id="user" type="text" class="input" name="user" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass" required="required">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" name="remember">
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="signin">&nbsp;
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="forgot.php">Change Password</a>
				</div>
			</div>
</form>
<form method="get">

			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pwd" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pwd_match" required="required">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" name="gmail" required="required">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="signup">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a></label>
				</div>
			</div>
		</div>
	</div>
</div>
 
</form> 
</body>
</html>
