<?php
    include('../database/session.php'); 
    include('../database/connection.php');
    $flag=0;

    if(isset($_REQUEST) && isset($_REQUEST['srch']))
    {   
        $flag=1;
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
    if(isset($_SESSION['user']))
    {
        header('location:../admin/admin.php');
    }
    if(isset($_SESSION['customer']))
    {
        header('location:../profiles/viewbook.php');
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
<title>Books</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="../css/extra.css" rel="stylesheet" type="text/css" />
</script>
</head>
<body>
<form method="POST">
<div id="tooplate_wrapper">

	<div id="tooplate_header">
        <div id="site_title">
        	<h1><a href="#">Brown Field</a></h1>
        </div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="../Home/home.php">Home</a></li>
                
                <li><a href="../books/books.php" class="current">Books</a></li>
                <li><a href="../login/login.php">Login</a></li>
                <li><a href="../contact/contact.php">Contact</a></li>
                <li><a href="../about_us/about.php">About Us</a></li>
                
            </ul> 	
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of forever header -->
    
    <div id="tooplate_middle"><br>
    	<h3><b>Available Books </b><img src="../images/guest.gif" height="220" width="540"></h3>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">

           
    <div class="col_w900 col_w900_last">
      <h2><b>Books In Stock :</b>
            <table align="right">
                <tr>
                    <td><input type="search" name="search" placeholder="Search any book....." class="srch"></td>
                    <td><input type="submit" name="srch" value="Search" class="search"></td>
                </tr>
      </table></h2><hr>
                <div>
                    <table>
                        <tr style="border-bottom: 16px solid green;">
                           <?php
                           if($flag==1)
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
                                    <button type="submit" name="buy" value="<?php echo $fetch['book_id'];?>" class="butt">Buy</button>
                                    </td>
                                <?php 
                                    
                                }
                                 if(isset($_POST) && isset($_POST['cart']))
                                    {  
                                       ?>
                                       <script type="text/javascript">
                                           if(window.confirm("Please Login to continue!!"))
                                           {
                                                window.location='../login/login.php';
                                           }
                                           else
                                           {
                                                window.location='books.php';
                                           }
                                       </script>
                                       <?php
                                       
                                    }
                                    if(isset($_POST) && isset($_POST['sample']))
                                    {
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
                                    }
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
                                    
                                    <td width="300" height="300" align="center">
                                    &nbsp;&nbsp;
                                    <img src="../book/image/<?php echo $array['cover_pic'];?>" height="125px" width="100px" class="default">
                                    <br>
                                    <b style="font-size: 18px">₹ <?php echo $array['price']; ?></b><br>
                                    <b><?php echo $array['book_name'];?></b><br>
                                    <b>By <u><?php echo $array['book_author'];?></u></b><br>
                                    <button type="submit" name="sample" value="<?php echo $array['book_id']; ?>" class="but">Sample</button>
                                    <button type="submit" name="buy" value="<?php echo $array['book_id'];?>" class="butt">Buy</button>
                                    </td>
                                <?php
                                       
                                }
                                if(isset($_POST) && isset($_POST['buy']))
                                    {
                                       ?>
                                       <script type="text/javascript">
                                           if(window.confirm("Please Login to continue!!"))
                                           {
                                                window.location='../login/login.php';
                                           }
                                           else
                                           {
                                                window.location='books.php';
                                           }
                                       </script>
                                       <?php
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
                            }
                            ?>
                        </tr>
                    </table><hr>
                        <?php
                        $sql="SELECT * FROM book";
                                    $out=mysqli_query($connect,$sql) or die(mysqli_error($connect));
                                    $rw=mysqli_fetch_array($out);
                                    $rws=mysqli_num_rows($out);
                                    
                                    $page=ceil($rws/5);?>
                                    <table align="center">
                                        <tr>
                                            <td style="font-size: 30px" width="150" height="20"><?php 
                                            for($count=1;$count<=$page;$count++)
                                            {
                                                ?>
                                                <a class="current" style="text-decoration: none;" href="books.php?page=<?php echo $count; ?>"><b class="bold"><?php echo $count; ?></b></a>
                                                
                                                <?php
                                            }?>
                                            </td>
                                        </tr>
                                    </table><br>
                        <?php
                        ?>


                </div>
      </div>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
        © 2017<a href="#">Online book store || Designed by Creative Artworks</a> 
	</div>
</div>
</form>
</body>
</html>