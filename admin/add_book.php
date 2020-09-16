<?php
include('../database/session.php');
include('../database/connection.php');
if($_SESSION['user']=="")
{
    header('location:../login/login.php');
}
if(isset($_REQUEST) && isset($_REQUEST['upload']))
{	
	$admin=$_SESSION['user'];
	$name=$_REQUEST['book_name'];
	$auth=$_REQUEST['book_auth'];
	$sum=$_REQUEST['sum'];
	$book=$_REQUEST['book_type'];
	$price=$_REQUEST['book_price'];
	$no_book=(int) $_REQUEST['num_book'];
		
	$book_img=$_FILES['book_img']['name'];
	$img_type=$_FILES['book_img']['type'];

	$s_pdf=$_FILES['s_book_name']['name'];
	$s_type=$_FILES['s_book_name']['type'];

	$f_pdf=$_FILES['f_book_name']['name'];
	$f_type=$_FILES['f_book_name']['type'];

	//checking image type
	$allowed=array('jpg','jpeg','png');
	$check=pathinfo($book_img,PATHINFO_EXTENSION);

	//checking file extension
	$allowed1=array('pdf');
	$check1=pathinfo($s_pdf,PATHINFO_EXTENSION);

	//checking full book extension
	$check2=pathinfo($f_pdf,PATHINFO_EXTENSION);

	if(in_array($check,$allowed) && in_array($check1,$allowed1) && in_array($check2,$allowed1))
	{
		if(!empty($name) && !empty($auth) && !empty($sum) && !empty($book) && !empty($price) && !empty($book_img) && !empty($s_pdf) && !empty($no_book))
		{
			$book_tmp=$_FILES['book_img']['tmp_name'];
			$s_pdf_tmp=$_FILES['s_book_name']['tmp_name'];
			$f_pdf_tmp=$_FILES['f_book_name']['tmp_name'];
			$date=date("Y-m-d");

			$photo_name=$name.".".$check;
			$photo_path='../book/image/'.$photo_name;

			$s_pdf_name=$name.".".$check1;
			$s_pdf_path='../book/sample/'.$s_pdf_name;

			$f_pdf_name=$name.".".$check2;
			$f_pdf_path='../book/full/'.$f_pdf_name;

			$sqli="INSERT INTO `book`(book_name,book_author,summ,category_name,price,cover_pic,s_pdf,f_pdf,num_book,u_date,admin_name) VALUES('$name','$auth','$sum','$book','$price','$photo_name','$s_pdf_name','$f_pdf_name','$no_book','$date','$admin')";	
			$result=mysqli_query($connect,$sqli) or die(mysqli_error($connect));
			if($result)
			{	
				move_uploaded_file($book_tmp, $photo_path);
				move_uploaded_file($s_pdf_tmp, $s_pdf_path);
				move_uploaded_file($f_pdf_tmp, $f_pdf_path);
				echo "<script>
					  confirm('Your book is sucessfully uploaded');
					  </script>";
			}
			else
			{
				echo "404 Error!!!";
			}
			
		}
		else
		{
		echo '<script> alert("Please fill all fields and photo must be jpg,png and jpeg formate. PDF must be .pdf formate") </script> ';
		}
	}
	else
	{
		echo "Document type mismatch!!!!";
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
<link rel="stylesheet" type="text/css" href="css/add_book.css">
<style type="text/css">
	.txt{
    padding: 10px 30px;
    border-radius: 12px;
    border:1px solid;
    }
</style>
</head>
<body>

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
            <h3><b>Add Books</b><img src="../images/ad.jpeg" height="220" width="440"></h3>
	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    	<form method="POST" enctype="multipart/form-data">
    	<h3><b><u>Enter the book details:</u></b></h3>
    		<table border="0" align="center">
		    		<tr>
		    			<td class="td">Enter book name:</td>
		    			<td> <input class="txt" type="text" name="book_name" class="text_1" /> </td>	
		    		</tr>
		    						
		    		<tr>
		    			<td class="td">Enter author name:</td>
		    			<td> <input class="txt" type="text" name="book_auth" class="text_1" /> </td>
		    		</tr>			
		    		<tr>
		    			<td class="td">Write some summary about this book: &nbsp;&nbsp;</td>
		    			<td> <textarea class="txt" name="sum" class="textt"></textarea> </td>
		    		</tr>			
		    		<tr>
		    			<td class="td">Select stream:</td>
		    			<td>
		    				<select class="case" name="book_type">
		    				<option>------Select Category------</option>
			    				<?php

			    					$from="SELECT  `category_name` FROM `category`";
									$get=mysqli_query($connect,$from) or die(mysqli_error($connect));					
									while($array_cat=mysqli_fetch_array($get)){  ?>
										<option value="<?php echo $array_cat['category_name'] ?>"><?php echo $array_cat['category_name']?></option>
			  							<?php	}
								?>
							</select>
		    			</td>
		    		</tr>
		    		<tr>
		    			<td class="td">Enter the price of this book:</td>
		    			<td> <input class="txt" type="text" name="book_price" class="text_1" /> </td>
		    		</tr>
		    		<tr>
		    			<td class="td">Upload book cover page:</td>
		    			<td> <input class="txt" type="file" name="book_img" /> </td>
		    		</tr>
		    		<tr>
		    			<td class="td">Upload sample of this book:</td>
		    			<td> <input type="file" name="s_book_name" /> </td>
		    		</tr>
		    		<tr>
		    			<td class="td">Upload full virsion of this book:</td>
		    			<td> <input type="file" name="f_book_name" /> </td>
		    		</tr>
		    		<tr>
					    <td class="td"> Number of books: </td>
					    <td> <input class="txt" type="text" name="num_book" class="text_1"> </td>
					</tr>
		    </table> <br><hr><br>		
		    		
		    			
		    		<table align="center">
		    			<tr>
		    				<td> <input type="submit" name="upload" value="Book upload" class="bttn" /> </td>
		    			</tr>
		    		</table>
    		</form>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
        © 2017<a href="#">Online book store</a> 
	</div>
</div>

</body>
</html>
