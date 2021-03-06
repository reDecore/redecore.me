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

$uname = cleanit($_REQUEST['uname']);
$bname = cleanit($_REQUEST['bname']);
$bname = str_replace("-", " ", $bname);

if($bname != "")
{
	$query = "select A.BID, A.pincount, A.bname, B.USERID, B.username, B.fname, B.lname, B.profilepicture from boards A, members B where A.bname='".mysql_real_escape_string($bname)."' AND B.username='".mysql_real_escape_string($uname)."' AND A.USERID=B.USERID"; 
	$executequery = $conn->execute($query);
	$BID = intval($executequery->fields['BID']);
	
	if($BID > 0)
	{
		if($config['use_username'] == "1")
		{
			$seo = stripslashes($executequery->fields['username']);
		}
		else
		{
			$seo = stripslashes($executequery->fields['fname'])." ".stripslashes($executequery->fields['lname']);
		}
		STemplate::assign('pagetitle',stripslashes($executequery->fields['bname'])." - ".$seo);
		STemplate::assign('q',$BID);
		STemplate::assign('profilepicture',$executequery->fields['profilepicture']);
		STemplate::assign('username',$executequery->fields['username']);
		STemplate::assign('fname',$executequery->fields['fname']);
		STemplate::assign('lname',$executequery->fields['lname']);
		STemplate::assign('bname',$executequery->fields['bname']);
		STemplate::assign('pincount',$executequery->fields['pincount']);
		STemplate::assign('USERID',$executequery->fields['USERID']);
		$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID AND A.BID='".mysql_real_escape_string($BID)."' order by A.points desc, A.viewcount desc, A.PID desc limit 50"; 
		$results = $conn->execute($query);
		$pins = $results->getrows();
		
		if(count($pins) >= 50)
		{	
			STemplate::assign('more',1);
		}	
		
		$query7 = "select count(*) as total from followb WHERE ISFOLBID='".mysql_real_escape_string($BID)."'";
		$executequery7=$conn->execute($query7);
		$totalfols = intval($executequery7->fields['total']);
		STemplate::assign('totalfols',$totalfols);	
	}
}

//TEMPLATES BEGIN
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display('board.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>