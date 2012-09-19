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
	$query = "select USERID, username, fname, lname, profilepicture from members where username='".mysql_real_escape_string($uname)."' AND status='1'"; 
	$executequery = $conn->execute($query);
	$u = $executequery->getrows();
	STemplate::assign('u',$u[0]);
	$USERID = intval($u[0]['USERID']);
	
	if($USERID > 0)
	{
		STemplate::assign('pagetitle',stripslashes($u[0]['username'])." ".stripslashes($lang['185']));
		
		$query = "select B.USERID, B.username, B.fname, B.lname, B.profilepicture from followm A, members B WHERE B.status='1' AND A.ISFOL=B.USERID AND A.USERID='".mysql_real_escape_string($USERID)."' order by rand() limit 50"; 
		$results = $conn->execute($query);
		$pins = $results->getrows();
		
		$query7 = "select count(*) as total from posts WHERE USERID='".mysql_real_escape_string($USERID)."' AND active='1'";
		$executequery7=$conn->execute($query7);
		$tp = intval($executequery7->fields['total']);
		STemplate::assign('tp',$tp);	
		
		$query7 = "select count(*) as total from boards WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$executequery7=$conn->execute($query7);
		$tb = intval($executequery7->fields['total']);
		STemplate::assign('tb',$tb);	

	}
}

//TEMPLATES BEGIN
STemplate::assign('pins',$pins);
STemplate::display('header.tpl');
STemplate::display('followingprofile.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>