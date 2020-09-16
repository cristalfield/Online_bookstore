<?php
include('../database/session.php');
include('../database/connection.php');
if(isset($_SESSION['user'])==""){
    header('location:../login/login.php');
}
if(isset($_REQUEST) && !empty($_REQUEST['add_cat'])){
    $category=$_POST['name_cat'];
    $into_cat="INSERT INTO `category`(category_name) VALUES('$category')";
    $into=mysqli_query($connect,$into_cat) or die(mysqli_error($connect));
    if(!empty($category))
    {
        if($into)
        {
            echo ('<script type="text/javascript">
                        confirm("Category added successfully!!");
                    </script>');
        }
        else
        {
            echo ('<script type="text/javascript">
                        confirm("404 Error!!");
                    </script>');
        }
    }
    else
    {
        echo ('<script type="text/javascript">
                        confirm("Field can not be empty!!");
                    </script>');   
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
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
<style type="text/css">
    .link{
    display: block;
    background: #4E9CAF;
    padding: 10px 20px;
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
.linkk{
    display: block;
    background: #4E9CAF;
    padding: 10px 20px;
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
.txt{
    padding: 10px 30px;
    border-radius: 12px;
    border:1px solid;

}
.txtt{
    padding: 5px 30px;
    border-radius: 12px;
    border:1px solid;
    cursor: pointer;
}
</style>
</head>
<body>
<form method="post">
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
    
    <div id="tooplate_middle"><br>
    	<h3><b>Add Categories </b><img src="../images/catt.jpg" height="220" width="440"></h3>
	  	
        <div class="cleaner"></div>
	</div> <!-- end of middle -->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
        <h3>
            <table align="right">
                <tr><td>
                    <select class="txtt">
                        <option>-----Available Categories----</option>
                        <?php
                            $query="SELECT `category_name` FROM `category`";
                            $fetch=mysqli_query($connect,$query) or die(mysqli_error($connect));
                            while($in_this=mysqli_fetch_array($fetch))
                            {
                                ?>
                                <option><?php echo $in_this['0']?></option>
                                <?php
                            }
                        ?>
                    </select>
                </td></tr>
            </table>
            <b>Add a category of you books:</b>
        </h3>
        <hr><br><br><br>
    		<table align="center">
                <tr>
                    <td style="font-size: 18px"><h3>Add category:</h3></td>
                </tr>
                <tr>
                    <td style="font-size: 18px"><input type="text" name="name_cat" placeholder="Add a category" required="required" class="txt"></td>
                </tr>      
            </table><br>
            <hr>
            <table align="center">
                <tr>
                    <td width="230" align="left"><input type="submit" name="add_cat" value="Add Category" class="link"></td>
                </tr>
            </table>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>

</div> <!-- wrapper -->
</form>
<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
        © 2017<a href="#">Online book store</a> 
	</div>
</div>

</body>
</html>