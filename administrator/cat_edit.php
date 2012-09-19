<?php
/**************************************************************************************************
| PinMe Script by Scriptolution.com
| http://www.pinmescript.com
| webmaster@pinmescript.com
|
|**************************************************************************************************
|
| By using this software you agree that you have read and acknowledged our End-User License 
| Agreement available at http://www.pinmescript.com/eula.html and to be bound by it.
|
| Copyright (c) PinMeScript.com. All rights reserved.
|**************************************************************************************************/

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

$CATID = intval($_REQUEST['CATID']);
if($CATID > 0)
{
	if($_POST['submitform'] == "1")
	{
		$cname = cleanit($_POST['name']);
		$seo = cleanit($_POST['seo']);
		$cmsg = cleanit($_POST['example']);
		$uploadedimage = $_FILES['cimage']['tmp_name'];
		
		if($seo != "")
		{
			$query="SELECT count(*) as total FROM categories WHERE seo='".mysql_real_escape_string($seo)."' AND CATID!='".mysql_real_escape_string($CATID)."'";
			$executequery=$conn->execute($query);
			$seopre = $executequery->fields['total'];	
		}
		else
		{
			$seopre = 0;
		}
	
		if($cname == "")
		{
			$error = "Error: Please enter a category name.";
			Stemplate::assign('error',$error);
		}
		elseif($seo == "")
		{
			$error = "Error: Please enter a seo name.";	
			Stemplate::assign('error',$error);
		}
		elseif(!preg_match("/^[a-zA-Z0-9\-]*$/i",$seo))
		{
			$error = "Error: Your seo name can only contain the letters A-Z and numbers 0-9.";
			Stemplate::assign('error',$error);
		}
		elseif($seopre > 0)
		{
			$error = "Error: The seo name you chose is already taken.";
			Stemplate::assign('error',$error);
		}
		elseif($cmsg == "")
		{
			$error = "Error: Please enter an example board name.";
			Stemplate::assign('error',$error);
		}
		else
		{
			$sql = "update categories set name='".mysql_real_escape_string($cname)."', seo='".mysql_real_escape_string($seo)."', example='".mysql_real_escape_string($cmsg)."' where CATID='".mysql_real_escape_string($CATID)."'";
			$conn->execute($sql);
			$message = "Category Successfully Edited.";
			Stemplate::assign('message',$message);
			
			if ($uploadedimage != "")
			{
				$theimageinfo = getimagesize($uploadedimage);
						
				if($theimageinfo[2] == 1)
				{
					$extension .= ".gif";
				}
				elseif($theimageinfo[2] == 2)
				{
					$extension .= ".jpg";
				}
				elseif($theimageinfo[2] == 3)
				{
					$extension .= ".png";
				}
				else
				{
					$extension .= ".jpg";
				}
				
				$thepp = $CATID.$extension;
				
				$myvideoimgnew=$config['imagedir']."/cat/o-".$thepp;
				if(file_exists($myvideoimgnew))
				{
					unlink($myvideoimgnew);
				}
				$myconvertimg = $_FILES['cimage']['tmp_name'];
				
				move_uploaded_file($myconvertimg, $myvideoimgnew);
				
				$max_width_thumbs = "100";
				$max_height_thumbs = "100";
				$tothumbdir = $config['imagedir']."/cat/".$thepp;
				if(file_exists($tothumbdir))
				{
					unlink($tothumbdir);
				}
				generatevideothumbs($myvideoimgnew,$tothumbdir,$max_width_thumbs,$max_height_thumbs);
				if(file_exists($myvideoimgnew))
				{
					unlink($myvideoimgnew);
				}
							
				$sql = "UPDATE categories set ext='".mysql_real_escape_string($extension)."' WHERE CATID='".mysql_real_escape_string($CATID)."'";
				$conn->execute($sql);
			}
		}
	}

	$query = $conn->execute("select * from categories where CATID='".mysql_real_escape_string($CATID)."' limit 1");
	$category = $query->getrows();
	Stemplate::assign('category', $category[0]);
}

$mainmenu = "3";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/cat_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>