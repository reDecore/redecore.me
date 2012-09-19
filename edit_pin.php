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

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$SID = intval($_SESSION['USERID']);	
if($SID > 0)
{
	$ido = intval(cleanit($_REQUEST['id']));
	if($ido > 0)
	{
		$query = "select PID from posts WHERE PID='".mysql_real_escape_string($ido)."' AND USERID='".mysql_real_escape_string($SID)."'"; 
		$executequery=$conn->execute($query);
    	$id = $executequery->fields['PID'];
		if($id > 0)
		{
			if($_REQUEST['esub'] == "1")
			{
				$BID = intval(cleanit($_REQUEST['BID']));
				$OBID = intval(cleanit($_REQUEST['OBID']));
				$ptitle = cleanit($_REQUEST['ptitle']);
				$source = cleanit($_REQUEST['source']);
				$ustr = substr($_REQUEST['source'], 0, 7);
				
				if($ptitle == "")
				{
					$error = $lang['232'];
				}
				elseif(strlen($ptitle) > 500)
				{
					$error = $lang['237'];
				}
				elseif($ustr != "http://" && $ustr != "")
				{
					$error = $lang['239'];
				}
				elseif($BID == "0")
				{
					$error = $lang['233'];
				}
				else
				{
					if($BID != $OBID)
					{
						$addme = ", BID='".mysql_real_escape_string($BID)."'";	
						$query = "UPDATE boards SET pincount=pincount-1 WHERE USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($OBID)."'"; 
						$conn->execute($query);
						$query = "UPDATE boards SET pincount=pincount+1 WHERE USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($BID)."'"; 
						$conn->execute($query);
					}
					$price = get_price($ptitle);
					$query = "UPDATE posts SET ptitle='".mysql_real_escape_string($ptitle)."', source='".mysql_real_escape_string($source)."', price='".mysql_real_escape_string($price)."' $addme WHERE USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($id)."' limit 1"; 
					$conn->execute($query);
					$msg = $lang['236'];
				}
			}
	
			$query = "select PID, ptitle, source, BID, pic FROM posts WHERE USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($id)."' limit 1"; 
			$results = $conn->execute($query);
			$pins = $results->getrows();
			STemplate::assign('pins',$pins[0]);
		}
		else
		{
			header("Location:".$thebaseurl."/mypins");exit;
		}
	}
	else
	{
		header("Location:".$thebaseurl."/mypins");exit;
	}
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}



STemplate::assign('pagetitle',stripslashes($lang['223']));
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header.tpl');
STemplate::display('edit_pin.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>