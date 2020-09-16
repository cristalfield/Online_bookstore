<?php
	include('../database/session.php');
	include('../database/connection.php');
	include('../login/picture.php');
	include('percnt.php');
	if($_SESSION['customer']=="" && $_SESSION['mail']=="")
        {
           header('location:../login/login.php');
        }
        $total=0;
        $users=$_SESSION['mail'];
        $data_cart="SELECT `cover`,`book_name`,`book_author`,`summary`,`price`,`cart_id` FROM `cart` WHERE `user_mail`='$users'";
        $get=mysqli_query($connect,$data_cart) or die(mysqli_error($connect));
        $rows=mysqli_num_rows($get);
        
?>
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
<style type="text/css">
    .linkkk{
    display: block;
    background: red;
    padding: 15px 24px;
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
<form method="post">
<div id="tooplate_wrapper">

    <div id="tooplate_header">
        <div id="site_title">
            <img src="../images/tooplate_logo.png" height="50">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../login/cart.php" class="current">Cart</a></li>
                <li><a href="../login/user.php">Back</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>       
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle"><br>
              <h2><b>Cart Items </b> <img src="../images/cate.png" align="center" height="180" width="200"></h2>
            
                
            
            
        <div class="cleaner"></div>
    </div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
            <table align="center">
                <tr>
                    <th width="200" style="font-size: 20px">Cover picture</th>
                    <th width="200" style="font-size: 20px">Name</th>
                    <th width="200" style="font-size: 20px">Book Author</th>
                    <th width="200" style="font-size: 20px">Book Summary</th>
                    <th width="200" style="font-size: 20px">Book Price</th>
                    <th width="200" style="font-size: 20px">Service</th>
                </tr>
            </table><hr>
            
                <?php
            if($rows!=0)
            {
            while($exe=mysqli_fetch_array($get))
                {   ?>
            <table align="center">
                <tr>
                    <td align="center" height="150" width="200"><img src="../book/image/<?php echo $exe['0'];?>" height="120px" width="90px" class="default"></td>
                    <td align="center" width="200"><h3><?php echo $exe['1'];?></h3></td>
                    <td align="center" width="200"><h3><?php echo $exe['2'];?></h3></td>
                    <td align="center" width="200"><h4><?php echo $exe['3'];?></h4></td>
                    <td align="center" width="200"><h3>₹ <?php echo $exe['4'];?></h3></td>
                    <td align="center" width="200"><button class="linkkk" name="remove" value="<?php echo $exe['5']; ?>">Remove</button></td>
                </tr>
            </table><hr>
                <?php 
                $total=$total+$exe['4'];
                }
                if(isset($_POST) && isset($_POST['remove']))
                {
                    $remove=$_POST['remove'];
                    $query="DELETE FROM `cart` WHERE `cart_id`='$remove'";
                    $exe=mysqli_query($connect,$query) or die(mysqli_error($connect));
                    if($exe)
                    {
                                      ?>
                                       <script type="text/javascript">
                                           if(window.confirm("1 Item deleted from cart!!"))
                                           {
                                                window.location='cart.php';
                                           }
                                           else
                                           {
                                                window.confirm=("404 Error!! try agin");
                                           }
                                       </script>
                                       <?php
                    }
                    else
                    {
                        echo ('<script>confirm("404 Error!!");document.reload();</script>');
                    }
                }
            }
            else
            {
            ?>  
                <br>
                <table align="center">
                    <tr>
                        <td align="center" width="600"><h3>------ No Items yet!! ------</h3></td>
                    </tr>
                </table>
            <?php  
            }
            ?>
            <table align="right">
                <tr>
                    <th align="center" width="160" height="60"><h3><b>Total Amount </b></h3></th>
                    <th align="center" width="160" height="60"><h2>₹ <?php echo $total; ?></h2></th>
                </tr>
            </table><br><br><br><br>
            <table align="center">
                <tr>
                    <td><input class="tot" type="submit" name="payment" value="Payment"></td>
                </tr>
            </table>
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
<?php
    if(isset($_REQUEST) && isset($_REQUEST['payment']))
    {
        header('location:../payment/payment.php');
        exit();
        echo 
        ('<script>
            confirm("Redirecting to download....");
        </script>');
    }
?>