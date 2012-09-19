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

$seo = cleanit($_REQUEST['category']);
if($seo != "")
{
	$query1 = "select name, CATID from categories WHERE seo='".mysql_real_escape_string($seo)."' limit 1"; 
	$executequery1=$conn->execute($query1);
	$CATID = intval($executequery1->fields['CATID']);	
	$showcatname = $executequery1->fields['name'];
	STemplate::assign('showcatname',$showcatname);
	if($CATID > 0)
	{
		$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID AND C.CATID='".mysql_real_escape_string($CATID)."' order by A.PID desc limit 50"; 
		$results = $conn->execute($query);
		$pins = $results->getrows();
		
		if(count($pins) >= 50)
		{	
			STemplate::assign('more',1);
			STemplate::assign('CATID',$CATID);
		}
	}
	STemplate::assign('pagetitle',$showcatname);
}
else
{
	$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID order by A.PID desc limit 50"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
		
	if(count($pins) >= 50)
	{	
		STemplate::assign('more',1);
	}
	STemplate::assign('pagetitle',$lang['155']);
}
STemplate::assign('menu',1);
//TEMPLATES BEGIN
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display('all.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>