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

if ($_REQUEST['c'] != "")
{
	$code = cleanit($_REQUEST['c']);
	$query="SELECT * from members_verifycode WHERE code='".mysql_real_escape_string($code)."'";
	$result=$conn->execute($query);
	
	if($result->recordcount()>=1)
	{
		$userid = $result->fields['USERID'];
		
		$query="SELECT verified from members WHERE USERID='".mysql_real_escape_string($userid)."'";
		$result=$conn->execute($query);
		$verified = $result->fields['verified'];
		
		if ($verified == "1")
		{
			$error = $lang['73'];
		}
		else
		{
			$query="UPDATE members SET verified='1' WHERE USERID='".mysql_real_escape_string($userid)."'";
			$result=$conn->execute($query);
			$msg = $lang['74'];
			if ($_SESSION['USERID'] == $userid)
			{
				$_SESSION['VERIFIED'] = "1";
			}
		}
	}
	else
	{
		$error = $lang['72'];;
	}
}

$pagetitle = $lang['75'];
STemplate::assign('pagetitle',$pagetitle);
STemplate::assign('msg',$msg);
STemplate::assign('error',$error);

//TEMPLATES BEGIN
STemplate::display('header2.tpl');
STemplate::display('confirmemail.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>