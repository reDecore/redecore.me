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
$subpin = intval(cleanit($_REQUEST['subpin']));
$name = cleanit($_REQUEST['thebname']);
$cat = intval(cleanit($_REQUEST['cat']));
if($SID > 0)
{
	if($subpin > 0)
	{
		if($name == "")
		{
			$arr = array('error' => true, 'msg' => $lang['80']);
		}
		elseif(!preg_match("/^[a-zA-Z0-9 ]*$/i",$name))
		{
			$arr = array('error' => true, 'msg' => $lang['105']);
		}
		elseif(strlen($name) > 100)
		{
			$arr = array('error' => true, 'msg' => $lang['238']);
		}
		elseif($cat == "0")
		{
			$arr = array('error' => true, 'msg' => $lang['81']);
		}
		else
		{
			$query7 = "select count(*) as total from boards WHERE USERID='".mysql_real_escape_string($_SESSION['USERID'])."' AND bname='".mysql_real_escape_string($name)."'";
			$executequery7=$conn->execute($query7);
			$ec = intval($executequery7->fields['total']);
			if($ec > 0)
			{
				$arr = array('error' => true, 'msg' => $lang['181']);
			}
			else
			{
				$query="INSERT INTO boards SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."',CATID='".mysql_real_escape_string($cat)."',bname='".mysql_real_escape_string($name)."'";
				$result=$conn->execute($query);
				$BID = mysql_insert_id();
				
				$seobname = seo_bname($name);
				$boardurl = $thebaseurl."/".stripslashes($_SESSION['USERNAME'])."/".$seobname;
				$arr = array('success' => true, 'msg' => 'success', 'm1' => $boardurl);
			}
		}
	}
}
else
{
	$arr = array('error' => true, 'msg' => $lang['108']);
}
echo json_encode($arr);	
?>