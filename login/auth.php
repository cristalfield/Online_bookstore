<?php  
	include('../database/session.php');
	include('../database/connection.php');				
	if(isset($_REQUEST) && !empty($_REQUEST['enter']))
	{	
		$user=$_SESSION['username'];
		$confirmed=$_SESSION['value'];
		$auth_code=$_REQUEST['code'];
		
		$sql="SELECT `confirmed` FROM `customer` WHERE `cutomer_id`=(SELECT `cutomer_id` from customer WHERE `customer_name`='$user')";
		$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
		$count=mysqli_num_rows($result);
		if($count==1 && $auth_code==$confirmed)
		{
			$result=mysqli_query($connect,"UPDATE `customer` SET `confirmed`='verified' WHERE `customer_name`='$user'");
			$result2=mysqli_query($connect,"UPDATE `customer` SET `confirm_code`='0' WHERE `customer_name`='$user'");
			if($result && $result2)
			{
				echo  	'<table align="center">
  							<tr height="240">
  							<td>
  								<div class="success" class="login" id="plsme"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Authentication successful</h2>
  								</div>
  							</td>
  							</tr>
  						</table>';
				header('Refresh: 3,url=login.php');
			}
			else
			{
				echo "<br>"."Authentication failed!!!";
			}

		}
		else
		{
			echo  	'<table align="center">
  							<tr height="240">
  							<td>
  								<div class="error" class="login" id="plsme"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authentication code mismatch</h2>
  								</div>
  							</td>
  							</tr>
  					</table>';
		}
	}
	else
	{
		echo  	'<table align="center">
  							<tr height="240">
  							<td>
  								<div class="info" class="login" id="plsme"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Please type the url code to authenticate</h2>
  								</div>
  							</td>
  							</tr>
  						</table>';
	}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/auth.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
 	$(document).ready(function() {
  $('#plsme').fadeOut(5000);
});
 </script> 
</head>
<body background="../images/2.jpg">
  <div class="login">
	<h1><?php echo "Hello"."&nbsp;".$_SESSION['username']; ?></h1>
    <form method="post">
        <input type="password" name="code" placeholder="Authentication code" required="required" />
        <input type="submit" class="btn btn-primary btn-block btn-large" name="enter" value="Authenticate">
    </form>
</div>
  
    <script src="../js/index.js"></script>

</body>
</html>
