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

if($_REQUEST['fpsub'] == "1")
{
	$user_email = cleanit($_REQUEST['identity']);
	if($user_email == "")
	{
		$error = $lang['35'];
	}
	elseif(!verify_valid_email($user_email))
	{
		$error = $lang['46'];
	}
	elseif (!verify_email_unique($user_email))
	{
		$error = $lang['45'];
	}
	
	if($error == "")
	{
		$query="INSERT INTO invites SET email='".mysql_real_escape_string($user_email)."'";
		$result=$conn->execute($query);
		$msg = $lang['44'];

	}
}
STemplate::assign('pagetitle',$lang['4']);
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header2.tpl');
STemplate::display('invite.tpl');
STemplate::display('footer.tpl');
?>