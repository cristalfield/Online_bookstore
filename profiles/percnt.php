<?php
include('../database/connection.php');
$percent=mysqli_query($connect,"SELECT `confirmed`,`status`,`full_name`,`date_of_birth`,`gender`,`address`,`city`,`state`,`pin_code` FROM `customer` WHERE `email`='$mail'");
$array_fetch=mysqli_fetch_array($percent);
$point=0;
$maxvalue=100;
if ($percent)
{
    
    
        if($array_fetch['0'] != '')
        {
            $point1  = $point+20;
        }
        elseif($array_fetch['title'] == '')
        {
            $point1 = $point+0;
        }

	        if($array_fetch['1'] != '')
	        {
	            $point2 = $point+10;
	        }
	        elseif($array_fetch['name'] == '')
	        {
	            $point2 = $point+0;
	        }

        if($array_fetch['2'] != '')
        {
            $point3 = $point+10;
        }
        elseif($array_fetch['2'] == '')
        {
            $point3 = $point+0;
        }

	        if($array_fetch['3'] != '')
	        {
	            $point4 = $point+10;
	        }
	        elseif($array_fetch['3'] == '')
	        {
	            $point4 = $point+0;
	        }

        if($array_fetch['4'] != '')
        {
            $point5 = $point+10;
        }
        elseif($array_fetch['4'] == '')
        {
            $point5 = $point+0;
        }

	        if($array_fetch['5'] != '')
	        {
	            $point6 = $point+10;
	        }
	        elseif($array_fetch['5'] == '')
	        {
	            $point6 = $point+0;
	        }

        if($array_fetch['6'] != '')
        {
            $point7 = $point+10;
        }
        elseif($array_fetch['6'] == '')
        {
            $point7 = $point+0;
		}
	        if($array_fetch['7'] != '')
	        {
	            $point8 = $point+10;
	        }
	        elseif($array_fetch['7'] == '')
	        {
	            $point8 = $point+0;
	        }

        if($array_fetch['8'] != '')
        {
            $point9 = $point+10;
        }
        elseif($array_fetch['8'] == '')
        {
            $point9 = $point+0;    
        }
        // otherwise
     
}
else
{
    echo "error completing query";
}
$pint  = $point1+$point2+$point3+$point4+$point5+$point6+$point7+$point8+$point9;
$percentage = ($pint*100)/100;
?>