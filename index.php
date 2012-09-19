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

$SID = intval(cleanit($_SESSION['USERID']));
if($SID > 0)
{			
	$query7 = "select ISFOL from followm WHERE USERID='".mysql_real_escape_string($SID)."'";
	$results7 = $conn->execute($query7);
	$peeps = $results7->getrows();
	if(count($peeps) > 0)
	{
		foreach ($peeps as &$value) 
		{
			$addpeeps .= " OR A.USERID='".mysql_real_escape_string($value['ISFOL'])."'";
			$addfeeds .= " OR A.USERID='".mysql_real_escape_string($value['ISFOL'])."'";
		}
	}
	$query7 = "select ISFOLBID from followb WHERE USERID='".mysql_real_escape_string($SID)."'";
	$results7 = $conn->execute($query7);
	$peeps = $results7->getrows();
	if(count($peeps) > 0)
	{
		foreach ($peeps as &$value) 
		{
			$addfeeds .= " OR A.BID='".mysql_real_escape_string($value['ISFOLBID'])."'";
		}
	}
	
	$query = "select A.*, B.profilepicture, B.username as uname, B.fname as f, B.lname as l from activity A, members B WHERE (A.USERID='".mysql_real_escape_string($SID)."' $addpeeps) AND A.USERID=B.USERID order by A.AID desc limit 10"; 
	$results = $conn->execute($query);
	$act = $results->getrows();
	STemplate::assign('act',$act);
	STemplate::assign('showfeed',1);

	
	$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE (A.USERID='".mysql_real_escape_string($SID)."' $addfeeds) AND A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID order by A.PID desc limit 50"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
		
	if(count($pins) >= 50)
	{	
		STemplate::assign('more',1);
		STemplate::assign('q',$SID);
	}
	
}
else
{
	$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID order by A.points desc, A.viewcount desc, A.PID desc limit 50"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
		
	if(count($pins) >= 50)
	{	
		STemplate::assign('more',1);
	}
		
	STemplate::assign('menu',2);
}
		
//TEMPLATES BEGIN
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display('index.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>