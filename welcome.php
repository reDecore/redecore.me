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

if ($_SESSION['USERID'] != "" && $_SESSION['USERID'] >= 0 && is_numeric($_SESSION['USERID']))
{
	if(isset($_POST['categories']))
	{
		$categories = $_POST['categories'];
		$cat = urldecode($categories);
		$c = explode(",", $cat);
		$svcount = count($c);
		if($svcount > 0)
		{
			$step = 2;	
		}
	}
	if($_REQUEST['step'] == "3")
	{	
		$query = "select A.CATID, B.example from categories_subscribe A, categories B WHERE A.USERID='".mysql_real_escape_string($_SESSION['USERID'])."' AND A.CATID=B.CATID order by rand()"; 
		$results = $conn->execute($query);
		$c = $results->getrows();
		$d = $c;
		STemplate::assign('c',$c);
		
		if($_POST['bsub'] == "1")
		{
			foreach ($d as &$valoo) 
			{
				$valoo = $valoo[0];
				$ocheck = cleanit($_POST['boards'.$valoo]);
				if(!preg_match("/^[a-zA-Z0-9 ]*$/i",$ocheck))
				{
					$error = $lang['105'];
				}
			}
			if($error == "")
			{
				foreach ($c as &$value) 
				{
					$value = $value[0];
					$bcheck = cleanit($_POST['boards'.$value]);
					if($bcheck != "")
					{
						$query = "INSERT INTO boards SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."', CATID='".mysql_real_escape_string($value)."', bname='".mysql_real_escape_string($bcheck)."'"; 
						$conn->execute($query);
					}
				}
				if(isset($_SESSION['PINREDIRECT']) && $_SESSION['PINREDIRECT'] != "")
				{
					$pindir = $_SESSION['PINREDIRECT'];	
					$pindir = base64_decode($pindir);
					$_SESSION['PINREDIRECT'] = "";
					header("Location:$config[baseurl]".$pindir);exit;
				}
				else
				{
					header("Location:$config[baseurl]/getbutton");exit;
				}
			}
		}
		$theme = "welcome3.tpl";
	}
	elseif($step == "2")
	{
		$users = array();
		for ($i = 0; $i < $svcount; $i++)
		{
			if ($c[$i] != "" && $c[$i] >= 0 && is_numeric($c[$i]))
			{	
				$CATID = cleanit($c[$i]);
				$query = "INSERT INTO categories_subscribe SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."', CATID='".mysql_real_escape_string($CATID)."'"; 
				$conn->execute($query);
				
				$query = "select A.USERID, A.BID, B.username, B.fname, B.lname, B.profilepicture, C.name from boards A, members B, categories C WHERE A.CATID='".mysql_real_escape_string($CATID)."' AND A.USERID=B.USERID AND A.CATID=C.CATID $addme order by A.pincount desc limit 1"; 
				$executequery=$conn->execute($query);
    			$AUSERID = intval($executequery->fields['USERID']);
				$aprofilepicture = $executequery->fields['profilepicture'];
				$ausername = $executequery->fields['username'];
				$fname = $executequery->fields['fname'];
				$lname = $executequery->fields['lname'];
				$aname = $executequery->fields['name'];
				$ABID = $executequery->fields['BID'];
				if($AUSERID > 0)
				{
					$users[$i] = array($AUSERID, $ausername, $fname, $lname, $aprofilepicture, $aname, $ABID);
					$addme .= " AND A.USERID!='".mysql_real_escape_string($AUSERID)."' ";
					
					
					$SID = intval(cleanit($_SESSION['USERID']));
					if($SID > 0)
					{
						$USERID = $AUSERID;
						if($USERID > 0)
						{
							$query="INSERT INTO followm SET USERID='".mysql_real_escape_string($SID)."', ISFOL='".mysql_real_escape_string($USERID)."'";
							$result=$conn->execute($query);	
							
							$query2 = "select BID from boards WHERE USERID='".mysql_real_escape_string($USERID)."'"; 
							$results2 = $conn->execute($query2);
							$bp = $results2->getrows();
							foreach ($bp as &$value) {
								$BID = $value['BID'];
								$query="INSERT INTO followb SET USERID='".mysql_real_escape_string($SID)."', ISFOLBID='".mysql_real_escape_string($BID)."'";
								$result=$conn->execute($query);	
							}
						}
					}
					
					
				}
			}
		}
		STemplate::assign('users',$users);
		$theme = "welcome2.tpl";
	}
	else
	{
		$query = "select CATID, name from categories order by name asc"; 
		$results = $conn->execute($query);
		$c = $results->getrows();
		STemplate::assign('c',$c);
		$theme = "welcome.tpl";
	}
}
else
{
	header("Location:$config[baseurl]/login");exit;
}
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header3.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>