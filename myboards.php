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
	$d = intval($_REQUEST['d']);	
	$did = intval($_REQUEST['did']);
	if($d == "1")
	{
		if($did> 0)
		{
			$queryd = "select BID from boards where USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($did)."'"; 
			$executequeryd = $conn->execute($queryd);
			$DBID = intval($executequeryd->fields['BID']);	
			if($DBID > 0)
			{
				delete_board($DBID);
				$msg .= $lang['245'];
			}
		}
	}
	
	$query = "select USERID, bname, BID, pincount from boards WHERE USERID='".mysql_real_escape_string($SID)."' order by pincount desc limit 100"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}



STemplate::assign('pagetitle',stripslashes($lang['217']));
//TEMPLATES BEGIN
STemplate::assign('msg',$msg);
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display('myboards.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>