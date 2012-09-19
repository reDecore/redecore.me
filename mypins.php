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
STemplate::assign('SID',$SID);
if($SID > 0)
{
	$d = intval($_REQUEST['d']);	
	$did = intval($_REQUEST['did']);
	if($d == "1")
	{
		if($did> 0)
		{
			$queryd = "select PID from posts where USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($did)."'"; 
			$executequeryd = $conn->execute($queryd);
			$DPID = intval($executequeryd->fields['PID']);	
			if($DPID > 0)
			{
				delete_pic($DPID);
				$msg = $lang['226'];
			}
		}
	}

	$query = "select A.USERID, A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, C.bname from posts A, boards C WHERE A.active='1' AND A.BID=C.BID AND A.USERID='".mysql_real_escape_string($SID)."' order by A.points desc, A.viewcount desc, A.PID desc limit 50"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
	
	if(count($pins) >= 50)
	{	
		STemplate::assign('more',1);
	}
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}



STemplate::assign('pagetitle',stripslashes($lang['218']));
//TEMPLATES BEGIN
STemplate::assign('msg',$msg);
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display('mypins.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>