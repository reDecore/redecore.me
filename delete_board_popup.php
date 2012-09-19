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
	$BID = intval(cleanit($_REQUEST['id']));
	if($BID > 0)
	{
		STemplate::assign('BID',$BID);
		STemplate::display('delete_board_popup.tpl');
	}
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}
?>