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

if ($_SESSION['USERID'] != "" && $_SESSION['USERID'] >= 0 && is_numeric($_SESSION['USERID']))
{
	$name = cleanit($_REQUEST['name']);
	$cat = intval(cleanit($_REQUEST['cat']));
	if($name == "")
	{
		$error = $lang['80'];
	}
	elseif(!preg_match("/^[a-zA-Z0-9 ]*$/i",$name))
	{
		$error = $lang['105'];
	}
	elseif($name == $lang['82'])
	{
		$error = $lang['80'];
	}
	elseif(strlen($name) > 100)
	{
		$error = $lang['238'];
	}
	elseif($cat == "0")
	{
		$error = $lang['81'];
	}
	
	if($error == "")
	{
		$query7 = "select count(*) as total from boards WHERE USERID='".mysql_real_escape_string($_SESSION['USERID'])."' AND bname='".mysql_real_escape_string($name)."'";
		$executequery7=$conn->execute($query7);
		$ec = intval($executequery7->fields['total']);
		if($ec > 0)
		{
			$error = $lang['181'];
		}
		else
		{
			$query="INSERT INTO boards SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."',CATID='".mysql_real_escape_string($cat)."',bname='".mysql_real_escape_string($name)."'";
			$result=$conn->execute($query);
			$BID = mysql_insert_id();
			echo $BID;
		}
	}
}
else
{
	$error = $lang['79'];	
}

if($error != "")
{
	echo "<div class=\"error\">".$error."</div>"; 	
}
?>