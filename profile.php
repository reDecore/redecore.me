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
if($uname != "")
{
	$query = "select USERID, username, fname, lname, profilepicture, description, gender, website, location from members where username='".mysql_real_escape_string($uname)."' AND status='1'"; 
	$executequery = $conn->execute($query);
	$u = $executequery->getrows();
	STemplate::assign('u',$u[0]);
	$USERID = intval($u[0]['USERID']);
	
	if($USERID > 0)
	{
		if($config['use_username'] == "1")
		{
			$seo = stripslashes($u[0]['username']);
		}
		else
		{
			$seo = stripslashes($u[0]['fname'])." ".stripslashes($u[0]['lname']);
		}
		STemplate::assign('pagetitle', $seo);
		$query = "select A.USERID, A.username, B.bname, B.BID, B.pincount from members A, boards B WHERE A.USERID=B.USERID AND A.status='1' AND B.USERID='".mysql_real_escape_string($USERID)."' order by pincount desc limit 100"; 
		$results = $conn->execute($query);
		$pins = $results->getrows();
		
		$query = "select count(*) as total from posts WHERE active='1' AND USERID='".mysql_real_escape_string($USERID)."'"; 
		$executequery = $conn->execute($query);
		$ptotal = intval($executequery->fields['total']);
		STemplate::assign('ptotal',$ptotal);
		
		$query = "select count(*) as total from boards WHERE USERID='".mysql_real_escape_string($USERID)."'"; 
		$executequery = $conn->execute($query);
		$btotal = intval($executequery->fields['total']);
		STemplate::assign('btotal',$btotal);
		
		$query = "select count(*) as total from posts_fav WHERE USERID='".mysql_real_escape_string($USERID)."'"; 
		$executequery = $conn->execute($query);
		$ltotal = intval($executequery->fields['total']);
		STemplate::assign('ltotal',$ltotal);
		
		$query7 = "select count(*) as total from followm WHERE ISFOL='".mysql_real_escape_string($USERID)."'";
		$executequery7=$conn->execute($query7);
		$fola = intval($executequery7->fields['total']);
		STemplate::assign('fola',$fola);	
		
		$query7 = "select count(*) as total from followm WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$executequery7=$conn->execute($query7);
		$folb = intval($executequery7->fields['total']);
		STemplate::assign('folb',$folb);
		
		$query = "select * from activity WHERE USERID='".mysql_real_escape_string($USERID)."' order by AID desc limit 10"; 
		$results = $conn->execute($query);
		$act = $results->getrows();
		STemplate::assign('act',$act);
		
		$theme = "profile.tpl";
	}
	else
	{
		$theme = "404.tpl";
	}
}

//TEMPLATES BEGIN
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>