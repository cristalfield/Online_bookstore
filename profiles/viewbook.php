<?php
	include('../database/session.php');
	include('../database/connection.php');
	include('../login/picture.php');
    $flag=0;
    $flag1=0;
	if(isset($_SESSION['customer'])=="" && isset($_SESSION['mail'])=="")
	{
		header('location:../login/login.php');
	}
    if(isset($_REQUEST) && isset($_REQUEST['srch']))
    {   
        $flag=1;
        $cat_search=NULL;
        $search=$_POST['search'];
        if(empty($search))
        {
            echo "Please enter bookname to search";
        }
        else
        {
            $query1="SELECT *FROM `book` WHERE `book_name` LIKE '%$search%'";
            $take=mysqli_query($connect,$query1) or die(mysqli_error($connect));

        }   
    }
    elseif(isset($_REQUEST) && isset($_REQUEST['cat']))
    {
        $flag1=1;
        $search=NULL;
        $paging=isset($_GET["page"]) ? $_GET["page"]:'';
                                    if($paging=="" || $paging=="1")
                                        {
                                            $page_no=0;
                                        }
                                        else
                                        {
                                            $page_no=($paging*5)-5;
                                        }
        $cat_search=$_POST['cat_type'];
        $query1="SELECT *FROM `book` WHERE `category_name`='$cat_search' ORDER BY `book_name` DESC LIMIT $page_no,5";
        $take=mysqli_query($connect,$query1) or die(mysqli_error($connect));
        
    }
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
<link href="../css/extra.css" rel="stylesheet" type="text/css" />
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
        

</head>
<body>
<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<img src="../images/tooplate_logo.png">
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../login/user.php" class="current">Profile</a></li>
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
    <form method="post" action="">
            <div class="col_w900 col_w900_last">
            <h2><b>Recent books :</b>
            <table align="right">
                <tr>
                    <td>
                        <select class="srch" name="cat_type">
                            <option>---Browse Categories---</option>
                            <?php 
                                $cat="SELECT `category_name` FROM `category`";
                                $queue1=mysqli_query($connect,$cat) or die(mysqli_error($connect));
                                while($array1=mysqli_fetch_array($queue1))
                                {
                                    echo '<option>'.$array1['0'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td><input type="submit" name="cat" value="Categories" class="search"></td>
                    <td><input type="search" name="search" placeholder="Search any book....." class="srch"></td>
                    <td><input type="submit" name="srch" value="Search" class="search"></td>
                </tr>
            </table></h2><hr>
                <div>
                    <table>
                        <tr style="border-bottom: 16px solid green;">
                           <?php
                           if($flag==1 || $flag1==1)
                           {
                            while($fetch=mysqli_fetch_array($take))
                                {
                                   
                                ?>
                                    <td width="200" height="300" align="center">
                                    &nbsp;&nbsp;&nbsp;
                                    <img src="../book/image/<?php echo $fetch['cover_pic'];?>" height="120px" width="90px" class="default">
                                    <br><b><?php echo $fetch['book_name'];?></b><br>
                                    <b>By <u><?php echo $fetch['book_author'];?></u></b><br>
                                    <button type="submit" name="sample" value="<?php echo $fetch['book_id'];?>" class="but">Read</button>
                                    <button type="submit" name="cart" value="<?php echo $fetch['book_id'];?>" class="butt">Cart</button>
                                    </td>
                                <?php 
                                    
                                }
                                 if(isset($_POST) && isset($_POST['cart']))
                                    {  
                                       $id=$_POST['cart'];
                                       $book_fetch="SELECT `book_name`,`book_author`,`summ`,`price`,`cover_pic` FROM `book` WHERE `book_id`='$id'";

                                       //multiple data abort

                                       $queue=mysqli_query($connect,$mult) or die(mysqli_error($connect));
                                       $row=mysqli_num_rows($queue);
                                       if($row==0)
                                       { 
                                           $execute=mysqli_query($connect,$book_fetch) or die(mysqli_error($connect));
                                           while($in_array=mysqli_fetch_array($execute))
                                           {
                                                $name_cart=$in_array['0'];
                                                $name_author=$in_array['1'];
                                                $name_summ=$in_array['2'];
                                                $price=$in_array['3'];
                                                $cover=$in_array['cover_pic'];
                                                $user=$_SESSION['mail'];
                                                $insert="INSERT INTO `cart`(`original_id`,book_name,book_author,summary,price,cover,user_mail) VALUES('$name_cart','$name_author','$name_summ','$price','$cover','$user')";
                                                $cart_insert=mysqli_query($connect,$insert) or die(mysqli_error($connect));
                                                if($cart_insert)
                                                    echo ('<script>
                                                            confirm("1 Item added into cart");
                                                            </script>');
                                                else
                                                    echo ('<script>
                                                            alert("404 Eroor!!!");
                                                            </script>');
                                           }
                                        }
                                        else
                                        {
                                            ?>
                                           <script type="text/javascript">
                                               if(window.confirm("This Item already included in your Cart!!"))
                                               {
                                                    window.location='viewbook.php';
                                               }
                                           </script>
                                           <?php
                                        }
                                    }
                                    if(isset($_POST) && isset($_POST['sample']))
                                    {
                                        $read=$_POST['sample'];
                                        $book_data="SELECT `s_pdf` FROM `book` WHERE `book_id`='$read'";
                                        $result=mysqli_query($connect,$book_data) or die(mysqli_error($connect));
                                        while($code=mysqli_fetch_array($result))
                                        {
                                            $in_read=$code['0'];
                                            header('location:../book/sample/'.$in_read);
                                            exit(0);
                                        }
                                    }
                                    $sql="SELECT * FROM `book` WHERE `category_name` LIKE '$cat_search' OR `book_name` LIKE '%$search%'";
                                    $out=mysqli_query($connect,$sql) or die(mysqli_error($connect));
                                    $rw=mysqli_fetch_array($out);
                                    $rws=mysqli_num_rows($out);
                                    $page=ceil($rws/5);
                                    ?>
                                    <table align="center">
                                        <tr>
                                            <td style="font-size: 30px;margin-bottom: 1px solid" width="150" height="20">
                                    <?php 
                                            for($count=1;$count<=$page;$count++)
                                            {
                                                ?>
                                                <a class="current" style="text-decoration: none;" href="viewbook.php?page=<?php echo $count; ?>"><b class="bold"><?php echo $count; ?></b></a>
                                                <?php 
                                            }?>
                                    </td>
                                        </tr>
                                    </table>
                            <?php
                            }
                            else
                            {
                                $paging=isset($_GET["page"]) ? $_GET["page"]:'';
                                    if($paging=="" || $paging=="1")
                                        {
                                            $page_no=0;
                                        }
                                        else
                                        {
                                            $page_no=($paging*5)-5;
                                        }

                                $query2="SELECT `book_id`,`book_name`,`book_author`,`cover_pic`,`price` from `book` ORDER BY `book_id` DESC LIMIT $page_no,5";
                                $data=mysqli_query($connect,$query2) or die(mysql_error($connect));
                                
                                
                                while($array=mysqli_fetch_array($data))
                                {
                                ?>
                                    
                                    <td width="200" height="300" align="center">
                                    &nbsp;&nbsp;
                                    <img src="../book/image/<?php echo $array['cover_pic'];?>" height="125px" width="100px" class="default">
                                    <br>
                                    <b style="font-size: 18px">₹ <?php echo $array['price']; ?></b><br>
                                    <b><?php echo $array['book_name'];?></b><br>
                                    <b>By <u><?php echo $array['book_author'];?></u></b><br>
                                    <button type="submit" name="sample" value="<?php echo $array['book_id']; ?>" class="but">Read</button>
                                    <button type="submit" name="cart" value="<?php echo $array['book_id'];?>" class="butt">Cart</button>
                                    </td>
                                <?php
                                       
                                }
                                if(isset($_POST) && isset($_POST['cart']))
                                    {
                                       $id=$_POST['cart'];
                                       $user=$_SESSION['mail'];
                                       $book_fetch="SELECT `book_name`,`book_author`,`summ`,`price`,`cover_pic`,`f_pdf` FROM `book` WHERE `book_id`='$id'";

                                       //multiple data abortion
                                       $mult="SELECT *FROM `cart` WHERE `original_id`='$id' AND `user_mail`='$user'";
                                       $queue=mysqli_query($connect,$mult) or die(mysqli_error($connect));
                                       $row=mysqli_num_rows($queue);
                                       if($row==0)
                                       {

                                           $execute=mysqli_query($connect,$book_fetch) or die(mysqli_error($connect));
                                           while($in_array=mysqli_fetch_array($execute))
                                           {
                                                $name_cart=$in_array['0'];
                                                $name_author=$in_array['1'];
                                                $name_summ=$in_array['2'];
                                                $price=$in_array['3'];
                                                $cover=$in_array['cover_pic'];
                                                $pathh="../book/full/".$in_array['5'];
                                                $insert="INSERT INTO `cart`(original_id,book_name,book_author,summary,price,cover,pathh,user_mail) VALUES('$id','$name_cart','$name_author','$name_summ','$price','$cover','$pathh','$user')";
                                                $cart_insert=mysqli_query($connect,$insert) or die(mysqli_error($connect));
                                                if($cart_insert)
                                                    echo ('<script>
                                                            confirm("1 Item added into cart");
                                                            </script>');
                                                else
                                                    echo ('<script>
                                                            alert("404 Error!!!");
                                                            </script>');
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                           <script type="text/javascript">
                                               if(window.confirm("This Item already included in your Cart!!"))
                                               {
                                                    window.location='viewbook.php';
                                               }
                                           </script>
                                           <?php
                                        }
                                       
                                    }
                                    if(isset($_POST) && isset($_POST['sample']))
                                    {
                                        $read=$_POST['sample'];
                                        $book_data="SELECT `s_pdf` FROM `book` WHERE `book_id`='$read'";
                                        $result=mysqli_query($connect,$book_data) or die(mysqli_error($connect));
                                        while($code=mysqli_fetch_array($result))
                                        {
                                            $in_read=$code['0'];
                                            header('location:../book/sample/'.$in_read);
                                            exit(0);
                                        }
                                    }

                                    $sql="SELECT * FROM book";
                                    $out=mysqli_query($connect,$sql) or die(mysqli_error($connect));
                                    $rw=mysqli_fetch_array($out);
                                    $rws=mysqli_num_rows($out);
                                    $page=ceil($rws/5);
                                    ?>
                                    <table align="center">
                                        <tr>
                                            <td style="font-size: 30px;margin-bottom: 1px solid" width="150" height="20">
                                    <?php 
                                            for($count=1;$count<=$page;$count++)
                                            {
                                                ?>
                                                <a class="current" style="text-decoration: none;" href="viewbook.php?page=<?php echo $count; ?>"><b class="bold"><?php echo $count; ?></b></a>
                                                <?php 
                                            }?>
                                    </td>
                                        </tr>
                                    </table>
                            <?php
                            }
                            ?>
                        </tr>
                    </table><hr>
                </div>
    	    </div>
    	<div class="cleaner"></div>
        </form>
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