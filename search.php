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

$q = cleanit($_REQUEST['q']);
STemplate::assign('q',$q);
$type = cleanit($_REQUEST['type']);
if($type == "boards")
{
	$query = "select A.username, B.bname, B.BID, B.pincount from members A, boards B WHERE A.USERID=B.USERID AND A.status='1' AND B.bname like'%".mysql_real_escape_string($q)."%' order by pincount desc limit 100"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
	STemplate::assign('type',$type);
	$theme = "search2.tpl";
}
else
{
	$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID AND A.ptitle like'%".mysql_real_escape_string($q)."%' order by A.points desc, A.viewcount desc, A.PID desc limit 50"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
	
	if(count($pins) >= 50)
	{	
		STemplate::assign('more',1);
	}
	$theme = "search.tpl";
}

$query = "select count(*) as total from posts WHERE active='1' AND ptitle like'%".mysql_real_escape_string($q)."%'"; 
$executequery = $conn->execute($query);
$ptotal = intval($executequery->fields['total']);
STemplate::assign('ptotal',$ptotal);

$query = "select count(*) as total from boards WHERE bname like'%".mysql_real_escape_string($q)."%'"; 
$executequery = $conn->execute($query);
$btotal = intval($executequery->fields['total']);
STemplate::assign('btotal',$btotal);

STemplate::assign('pagetitle',stripslashes($q));
//TEMPLATES BEGIN
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>