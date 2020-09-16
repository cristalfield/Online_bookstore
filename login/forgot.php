<?php 
	include('../database/session.php');
	include('../database/connection.php');
	if(isset($_REQUEST) && !empty($_REQUEST['reset']))
	{
		$f_user=filter_var($_REQUEST['f_user'],FILTER_VALIDATE_EMAIL);
		$pass=$_REQUEST['f_pass'];
		$old=$_REQUEST['old_pass'];
		$repeat=$_REQUEST['r_pass'];
		if($pass==$repeat)
		{
			if($f_user)
			{
				$sql="SELECT `email`,`cus_password` FROM `customer` WHERE `email`='$f_user'";
				$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
				$fetch=mysqli_num_rows($result);
				$arry=mysqli_fetch_array($result);
				$arry1=$arry['1'];
				if($fetch==1 && $sql && $result)
				{	
					if($arry1==$old)
						{
					
							$update=mysqli_query($connect,"UPDATE `customer` SET `cus_password`='$repeat' WHERE `email`='$f_user'");
							if($update)
							{
								echo ('<script type="text/javascript">
										alert("Password updated successfully!!");
							 		  </script>');
							 	header('Refresh: 1,url=../login/login.php');
							}
							else
							{
								echo ('<script type="text/javascript">
										alert("Password updation failed!!");
							 		  </script>');
							}
						}
						else
						{
							echo ('<script type="text/javascript">
										alert("Old Password not match!!");
							 		  </script>');
						}
				} 
				else
				{
					echo ('<script type="text/javascript">
								alert("We did not find you!!");
					 		  </script>');
				}
			}
			else
			{
				echo ('<script type="text/javascript">
						alert("Invalid Mail_id!!");
					 	</script>');
			}
		}
	}
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>forgot</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="../fonts/font.css">
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../css/forgot.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1>hello user</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Fillup for password reset</h2>
							<form method="post">
								<div class="form-sub-w3">
									<input type="text" name="f_user" placeholder="User mail_id "/>
								
								</div>

								<div class="form-sub-w3">
									<input type="password" name="old_pass" placeholder="Old Password"/>
								
								</div>

								<div class="form-sub-w3">
									<input type="password" name="f_pass" placeholder="Password"/>
								
								</div>
								<div class="form-sub-w3">
									<input type="password" name="r_pass" placeholder="Repeat Password"/>
								
									

								</div>
								<label class="anim">
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" value="Reset" name="reset">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		
		<!--footer-->
		<div class="footer">
			<p>&copy; 2017 online bookstore. All rights reserved</a></p>
		</div>
		
		<!--//footer-->
</body>
</html>