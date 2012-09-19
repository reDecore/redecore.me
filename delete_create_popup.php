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

$SID = intval($_SESSION['USERID']);	
if($SID > 0)
{
	$PID = intval(cleanit($_REQUEST['id']));
	if($PID > 0)
	{
		STemplate::assign('PID',$PID);
		STemplate::display('delete_create_popup.tpl');
	}
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}
?>